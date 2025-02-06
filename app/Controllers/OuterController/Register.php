<?php

namespace App\Controllers\OuterController;
use App\Controllers\BaseController;
use \App\Models\OuterModel\RegisterModel;

class Register extends BaseController
{

    public $registermodel;
    public $session;
    public $email;
    public function __construct(){
      helper('form');
      helper('Form_helper');
      helper('date');
      $this->registermodel = new RegisterModel();
      $this->session = \Config\Services::session();
      $this->email = \Config\Services::email();
    }

    public function index(): string
    {
        $data = [];
        $data['validation'] = null;
        return view('register_view', $data);
    }

    public function insertdata()
    {
      $data = [];
      if($this->request->getMethod() == 'POST')
      {
        $rules = [
          "username" => "required|min_length[3]|max_length[20]",
          "email" => "required|valid_email|is_unique[users.email]",
          "password" => "required|min_length[6]|max_length[16]",
          "confirm_password" => "required|matches[password]",  
        ];
      

        if($this->validate($rules))
        {
            $uniid = md5(str_shuffle("abcdefghijklmnopqrstuvwxyz".time()));
            $userdata = [
              "email" => $this->request->getVar("email"),
              "username" => $this->request->getVar("username", FILTER_SANITIZE_STRING),
              "password" => password_hash($this->request->getVar("password"),PASSWORD_DEFAULT),
              "uniid" => $uniid,
              "created_at" => date("Y-m-d h:i:s"),
              "activation_date" => date("Y-m-d h:i:s"),
            ];

            if($this->registermodel->createuser($userdata))
            {

                  $to = $this->request->getVar("email");
                  $subject = "Account Activation Link";
                  $message = '
                  <!DOCTYPE html>
                  <html>
                  <head>
                      <meta charset="UTF-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1">
                      <title>Account Activation</title>
                      <style>
                          body {
                              font-family: Arial, sans-serif;
                              background-color: #f8f9fa;
                              color: #212529;
                              margin: 0;
                              padding: 0;
                          }
                          .container {
                              max-width: 500px;
                              margin: 20px auto;
                              background: #ffffff;
                              padding: 20px;
                              border-radius: 8px;
                              box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                              text-align: center;
                          }
                          .btn {
                              display: inline-block;
                              padding: 12px 20px;
                              margin-top: 10px;
                              font-size: 16px;
                              color: #fff;
                              background: #198754; /* Bootstrap btn-success */
                              text-decoration: none;
                              border-radius: 5px;
                          }
                          .btn:hover {
                              background: #146c43;
                          }
                          .footer {
                              margin-top: 20px;
                              font-size: 14px;
                              text-align: center;
                          }
                          img {
                              max-width: 150px;
                              display: block;
                              margin: 10px auto;
                          }
                  
                      
                          @media (prefers-color-scheme: dark) {
                              body { background-color: #121212; color: #ffffff; }
                              .container { background: #1e1e1e; box-shadow: 0 2px 4px rgba(255,255,255,0.1); }
                              .footer { color: #b0b0b0; }
                          }
                      </style>
                  </head>
                  <body>
                  
                  <div class="container">
                      <img src="' . base_url() . '/uploads/codebro.jpeg" alt="Logo">
                      <h2>Activate Your Account</h2>
                      <p>Hi <strong>' . htmlspecialchars($this->request->getVar("username", FILTER_SANITIZE_STRING)) . '</strong>,</p>
                      <p>Thank you for creating an account with us!</p>
                      <p>To complete your registration, please activate your account by clicking the button below:</p>
                      <p>
                          <a href="' . base_url() . 'activate/' . $uniid . '" class="btn"  style="color:white !important"  target="_blank">Activate My Account</a>
                      </p>
                      <p>If you didn\'t request this, please ignore this email.</p>
                      <p>Best regards,<br><strong>CODE CANVAS</strong></p>
                  </div>
                  
                  <div class="footer">
                      &copy; ' . date("Y") . ' CODE CANVAS. All rights reserved.
                  </div>
                  
                  </body>
                  </html>';
                  
                  $this->email->setTo($to);
                  $this->email->setFrom("johncarlovictoriadizon@gmail.com", "CODE BROS");
                  $this->email->setSubject($subject);
                  $this->email->setMessage($message);
                

                  if(  $this->email->send())
                  {
              
                    $this->session->setTempdata('error', 'Account Created Successfully, Please Check Your Email');
                    return redirect()->to("/sign_up");
                  }
                  else
                  {
                    $del = $this->registermodel->undoInsert($this->request->getVar("email"));
                    if($del){
                      $this->session->setTempdata('error', 'Sorry unable to register your account, Check your Internet');
                      return redirect()->to("/sign_up");
                    }
                  
                  
                  }




            }
            else
            {
              $this->session->setTempdata('error', 'Failed to create your account. Try Again');
              return redirect()->to("/");
            }

        }
        else
        {
          $data['validation'] = $this->validator;
        }
      }
 
        return view('register_view', $data);
    }







    public function activate($uniid = null)
    {
      $data = [];

      if(!empty($uniid))
      {
          $userdata = $this->registermodel->verifyUni($uniid);

          if($userdata)
          {
              
              if($this->verifyExpiryTime($userdata->activation_date))
              {
                    if($userdata->status == "inactive")
                    {
                        $stat = $this->registermodel->updatestatus($uniid);
                        if($stat == true)
                        {
                          $data['success'] = "Account activated successfully";
                        }
                    }
                    else
                    {
                      $data['success'] = "Your account is already activated"; 
                    }
              } 
              else
              {
                $data['error'] = "Sorry activation link was expired";
              }
          }
          else
          {
              $data['error'] = "Sorry we're unable to find your account";
          }
      }
      else
      {
        $data['error'] = "Sorry unable to process your request";
      }


      return view("activateacc_view", $data);
    }

    public function verifyExpiryTime($regtime)
    {
      $curtime = time(); 
      $regtime = strtotime($regtime);
      $diftime = $curtime - $regtime;
        if(3600 > $diftime)
        {
          return true;
        }
        else
        {
          return false;
        }
    }



}
