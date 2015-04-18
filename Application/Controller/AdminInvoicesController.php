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
            
            GeneralClass::redirect('/project/itool/invoicesAdmin/Insert.php?'.$result, false);
    }
       
      public function delete(){
        
            $modelAction = new invoicesFunctionality();
        
            $result=$modelAction->DeleteValues($this->model);
            
            GeneralClass::redirect('/project/itool/invoicesAdmin/deleteInvoices.php?'.$result, false);
    }    
    
    
    public function update($in,$qty,$id,$sp,$pi){
        
        $this->model = new addInvoices();
        $this->model->setInvoiceNumber($in);
        $this->model->setQuantity($qty);
        $this->model->setInvoiceDate($id);
        $this->model->setSellingPrice($sp);
        $this->model->setProductId($pi);
        $modelAction=new invoiceFunctionality();
        $result=$modelAction->update($this->model);  
                      
               

        if($result){
            GeneralClass::redirect('/project/itool/invoicesAdmin/Index.php?r='.$result,false);
        }
    }
    
    public function display(){
        $modelAction = new invoicesFunctionality();
        
        $result=$modelAction->DisplayInvoices($this->model);       
    }
    
    public function displayDetail(){
        $modelAction = new invoicesFunctionality();
        
        $result=$modelAction->DetailInvoices($this->model);       
    }
    
}


echo '<script>alert("entered controller")</script>';

$controllerObject = new AdminInvoicesController();

//if(isset($_GET['action']))
//    {
//    $view = $_GET['action'];
//    
//    $controllerObj->Action($view);
//   }
