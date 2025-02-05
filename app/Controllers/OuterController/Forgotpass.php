<?php

namespace App\Controllers\OuterController;
use App\Controllers\BaseController;
use App\Models\OuterModel\ForgotpassModel;


class Forgotpass extends BaseController
{


    public $email;
    public $session;

    public $forgotpassmodel;

    public function __construct(){
        helper('form');
        helper('Form_helper');
        helper('date');
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
        $this->forgotpassmodel = new ForgotpassModel();
    }

    public function index(): string
    {
        $data ['validation'] = null;
        return view('forgotpass_view', $data);
    }

    public function verify(){
        if($this->request->getMethod() == 'POST')
        {
          $rules = [
            "email" => "required|valid_email",
          ];
        
  
          if($this->validate($rules))
          {
                $uniid = md5(str_shuffle("abcdefghijklmnopqrstuvwxyzxmvmxsd".time()));
              
                $email = $this->request->getVar("email");
            
                if($userdata = $this->forgotpassmodel->findUser($email))
                {
                   
                    $reset_passTime = date("Y-m-d h:i:s");
                    $updateuniid = $this->forgotpassmodel->updateUniid($uniid, $email, $reset_passTime);
                    if($updateuniid){

                        $to = $email;
                        $subject = "Password Reset Request";
                        $message = '
                      <!DOCTYPE html>
                      <html>
                      <head>
                          <meta charset="UTF-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1">
                          <title>Password Reset</title>
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
                          <h2 style="text-align: center;">Password Reset Request</h2>
                          <p>Hi <strong>' . htmlspecialchars($this->request->getVar("username", FILTER_SANITIZE_STRING)) . '</strong>,</p>
                          <p>We received a request to reset your password. If you made this request, please click the button below:</p>
                          <p style="text-align: center;">
                              <a href="' . base_url() . 'resetpassword/' . $uniid . '" class="btn" style="color:white !important" target="_blank">Reset My Password</a>
                          </p>
                          <p>If you didn\'t request this, please ignore this email.</p>
                          <p>Best regards,<br><strong>CODE CANVAS</strong></p>
                          <img src="' . base_url() . '/uploads/codebro.jpeg" alt="Logo">
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
                        
                        if ($this->email->send()) {
                            $this->session->setTempdata('errorchange', 'Password reset link has been sent. Please check your email.',3);
                            return redirect()->to(base_url()."forgot_password");
                        } else {
                            $this->session->setTempdata('errorchange', 'Unable to send the reset link. Please try again later.',3 );
                            return redirect()->to(base_url()."forgot_password");
                        }
                        
                    }
                    else
                    {
                        $this->session->setTempdata('errorchange', 'Unable to process your request. Please try again later.',3);
                        return redirect()->to(base_url()."forgot_password");
                    }
                }
                else
                {
                    $this->session->setTempdata('errorchange', 'The email address does not registered yet',3);
                    return redirect()->to(base_url()."forgot_password");
                }
  
          }
          else
          {
            $data['validation'] = $this->validator;
          }
        }

        return view('forgotpass_view', $data);
    }



    
    public function resetpassword($param = null)
    {
      $data = [];

      if(!empty($param))
      {
          $userdata = $this->forgotpassmodel->verifyUni($param);

          if($userdata)
          {
              
            if ($this->verifyExpiryTime($userdata->reset_passTime)) {
                $data['userdata'] = $userdata;
                $data ['validation'] = null;
                return view('changepassword_view', $data);
            } else {
                $data['error'] = "Sorry, the reset password link has expired.";
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
        if(3600 < $diftime)
        {
          return true;
        }
        else
        {
          return false;
        }
    }


    public function changepassdone()
    {
        $data = [];
        $data['validation'] = null;
        if($this->request->getMethod() == 'POST')
        {
          $rules = [
            "password" => "required|min_length[6]|max_length[16]",
            "confirm_password" => "required|matches[password]",  
          ];
        
  
          if($this->validate($rules))
          {
            $uniid =  $this->request->getVar("uniid");
            $password = password_hash($this->request->getVar("password"),PASSWORD_DEFAULT);
            $userpass = $this->forgotpassmodel->updatepassword($uniid , $password);

            if($userpass)
            {
                

                $this->session->setTempdata("logerror", "Account password updated successfully",3);
                return redirect()->to("/");
         
            }
            else
            {
                $data['error'] = "Sorry we're unable to update your password";
            }

          }
          else
          {
            $data['validation'] = $this->validator;
          }
        }
   
          return view('changepassword_view', $data);
    }
}
