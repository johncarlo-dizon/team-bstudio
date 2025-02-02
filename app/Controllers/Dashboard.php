<?php 
namespace App\Controllers;
use App\Models\DashboardModel;
use App\Models\CodeModel;



class Dashboard extends BaseController
{
  public $dashboardmodel;
 
  public $session;


  public function __construct()
  {
      helper("form");
      $this->dashboardmodel = new DashboardModel();
      $this->codeModel = new CodeModel();
      $this->session = session();
  }



  public function dashboard()
  {

      if (!session()->has('logged_user')) {
          return redirect()->to("/");
      }
  
      $uniid = session()->get('logged_user');
      $userdata = $this->dashboardmodel->getLogUserdata($uniid);

      $data['userdata'] = $userdata;
      $data['email'] = $userdata->email; 
      $data['navbarClasses'] = $this->session->get("navbar");
      $data['code'] = $this->codeModel->where('tempemail', $data['email'])->findAll();

      return view("dashboard_view", $data);
  }


  public function selectTemp($tempname)
  {
      
      $codeData = $this->codeModel->where('tempname', $tempname)->first();

      if (!$codeData) {
          return redirect()->to('/dashboard')->with('error', 'Template not found.');
      }

      
      session()->set('selected_tempname', $codeData['tempname']);
      session()->set('selected_code_content', $codeData['code_content']);

      return redirect()->to('/dashboard'); 
  }


  

 


  public function assignToNextContainer($data)
    {

    $rows = $this->session->get("rows") ?? [];


    $assigned = false;

    foreach ($rows as $rowIndex => $rowColumns) {
        foreach ($rowColumns as $colIndex => $colData) {
            if ($colData === null) {

                $rows[$rowIndex][$colIndex] = $data;

                $this->session->set('lastAssigned', [
                    'row' => $rowIndex + 1,
                    'column' => $colIndex + 1
                ]);
                $assigned = true;
                break 2; 
            }
        }
    }

    if (!$assigned) {

        $newRow = [ $data ];
        $rows[] = $newRow;
    }
    $this->session->set("rows", $rows);
}


public function generateColumns()
{

    $columnCount = (int) $this->request->getPost("columnCount");
    $newRow = array_fill(0, $columnCount, null);
    $rows = $this->session->get("rows") ?? [];

    $rows[] = $newRow;
    $this->session->set("rows", $rows);

    return redirect()->to(base_url("dashboard"));
}

public function undoLastRow()
{
    $rows = $this->session->get("rows") ?? [];

 
    if (!empty($rows)) {
        array_pop($rows);  
        $this->session->set("rows", $rows);
    }

    return redirect()->to(base_url("dashboard"));
}



  
public function undo()
{

    $rows = $this->session->get("rows");

    if ($rows) {

        for ($rowIndex = count($rows) - 1; $rowIndex >= 0; $rowIndex--) {

            $rowColumns = $rows[$rowIndex];
            

            for ($colIndex = count($rowColumns) - 1; $colIndex >= 0; $colIndex--) {
                if ($rowColumns[$colIndex] !== null) {
                    $rows[$rowIndex][$colIndex] = null;
                    break 2; 
                }
            }
        }

        $this->session->set("rows", $rows);
    }

    return redirect()->to(base_url('dashboard'));
}

  

  


  public function logout()
  {
      session()->remove('logged_user');
      session()->destroy();
      return redirect()->to("/");
  }




 
}