<?php

namespace App\Controllers\Components;
use App\Controllers\BaseController;
use App\Controllers\Dashboard;
use App\Models\Components\ScrollspyModel;

class ScrollspyCtrl  extends BaseController
{
    public $dashboard;
    public $session;
    public $model;

    public function __construct(){
      $this->dashboard = new Dashboard();
      $this->session = session();
      $this->model = new ScrollspyModel();
    }

    public function display($param1 = null)
    {
   
        $param = $param1;
  
    
        if ($param) {
            $this->session->set("param", $param);
            $paramdata = $this->model->getdata($param);
            $this->session->set("paramdata", $paramdata);
    
          
            $this->dashboard ->assignToNextContainer($paramdata);
        }
    
        return redirect()->to(base_url() . "dashboard");
    }
}