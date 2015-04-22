<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ReportModel.php';

class ReportController implements iAction
{
    
    public $model;
      
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('/project/itool/AdminReport', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formValues(){
        
        $this-> model = new Report();
        $this-> model->setProductId($_POST['Product Id']);
     }    
     
      public function display(){
        $modelAction = new reportFunctionality();
        
        $result=$modelAction->DisplayReport($this->model);
            
    }
   
}
$controllerObject = new ReportController();