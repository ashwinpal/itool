<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ProductsModel.php';

class AdminProductController implements iAction{
    
    public $model;
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('../../AdminProduct', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formValues(){
        $this->model= new AddProduct();
        $this->model->setProduct_Id($_POST['id']);
        $this->model->setProduct_Name($_POST['name']);
        $this->model->setProduct_Description($_POST['desc']);
        $this->model->setCategory_Id($_POST['catid']);
        $this->model->setBuying_Price($_POST['price']);
        $this->model->setImage($_POST['image']);
    }

    public function display(){
        $modelAction=new ProductFunctionalty();
        $result=$modelAction->DisplayProduct($this->model);        
    }
    
    public function insert(){       
        $modelAction= new ProductFunctionalty();
        $result=$modelAction->InsertProduct($this->model);
        GeneralClass::redirect('/project/itool/AdminProduct/Index.php?'.$result, false);
    }
    
    public function update(){
       $modelAction= new ProductFunctionalty();
        $result=$modelAction->UpdateProduct($this->model);
        
    }
}
echo '<script>alert("entered controller")</script>';

$controllerObj = new AdminProductController();