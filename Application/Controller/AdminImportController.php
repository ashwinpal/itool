<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ImportProductModel.php';

class AdminImportController implements iAction{
    
    public $model;
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('/project/itool/AdminImport', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formvalues(){
        $this->model =  new importProduct();
        $this->model->setorderNumber($_POST['order_number']);
    }
     
    public function insert(){
        $modelAction=new ImportFunctionality();
        $result=$modelAction->PlaceOrder($this->model);
        GeneralClass::redirect('/project/itool/AdminCategory/Index.php?'.$result, false);
    }
    
    public function display(){
        $modelAction=new ImportFunctionality();
        $result=$modelAction->DisplayOrders($this->model);
    }
    
    public function update($qty,$rd,$ed,$on){
        
        $this->model = new importProduct();
        $this->model->setQuantity($qty);
        $this->model->setreceivedDate($rd);
        $this->model->setexpiryDate($ed);
        $this->model->setorderNumber($on);
        $modelAction=new ImportFunctionality();
        $result=$modelAction->recieved_orders($this->model);  
                      
               

        if($result){
            GeneralClass::redirect('/project/itool/AdminImport/Index.php?r='.$result,false);
        }
    }
}

//echo '<script>alert("entered controller")</script>';

$controllerObj = new AdminImportController();

//$view = $_GET['action'];
//
//$adminObj = new AdminCategoryController();
//$adminObj->Action($view);