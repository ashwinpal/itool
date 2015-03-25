<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/InvoicesModel.php';



class AdminInvoicesController implements iAction{
    
    public $model;
    
    
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('/project/itool/AdminInvoices', false);
                break;
            case 'delete':  GeneralClass::redirect("deleteInvoices.php", false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formValues(){
        
        $this-> model = new invoices();
        
        $this-> model->setproductId($_POST['name']);
        $this-> model->setQuantity($_POST['quantity']);
        $this->model->setinvoiceDate($_POST['date']);
        $this->model->setsellingPrice($_POST['price']);
        $this->model->setuserId($_POST['userid']);
     
        
    }
    
    public function insert(){
        
            $modelAction = new invoicesFunctionality();
        
            $result=$modelAction->insertValues($this->model);
            
            GeneralClass::redirect('/project/itool/invoicesAdmin/Index.php?'.$result, false);
    }
       
      public function delete(){
        
            $modelAction = new invoicesFunctionality();
        
            $result=$modelAction->DeleteValues($this->model);
            
            GeneralClass::redirect('/project/itool/invoicesAdmin/DeleteInvoices.php?'.$result, false);
    }    
    
    
    public function update($value){
        
            $modelAction = new invoicesFunctionality();
        
            $result=$modelAction->UpdateValues($value);
            
            GeneralClass::redirect('/project/itool/invoicesAdmin/UpdateInvoices.php?'.$result, false);        
        
    }
}


echo '<script>alert("entered controller")</script>';

$controllerObj = new AdminInvoicesController();

//if(isset($_GET['action']))
//    {
//    $view = $_GET['action'];
//    
//    $controllerObj->Action($view);
//   }
