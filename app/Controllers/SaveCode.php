<?php
namespace App\Controllers;
use App\Models\CodeModel;
class SaveCode extends BaseController
{
  public function save(){
    $tempemail = $this->request->getVar('tempemail');
    $codeContent = $this->request->getVar('codeContent');
    $tempname = $this->request->getVar('tempname');
    $codeContent = html_entity_decode($codeContent, ENT_QUOTES, 'UTF-8');

    $codeModel = new CodeModel();

    $codeModel->save([
      'tempemail' => $tempemail,
      'tempname' => $tempname,
      'code_content' => $codeContent
  ]);

  return redirect()->to('/dashboard');
  }
}

