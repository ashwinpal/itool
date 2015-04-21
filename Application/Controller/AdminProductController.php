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
    
//     public function rating(){
//        $modelAction=new ProductFunctionalty();
//        $result=$modelAction->RateProduct($this->model);        
//    }
    
    public function insert(){       
        $modelAction= new ProductFunctionalty();
        $result=$modelAction->InsertProduct($this->model);
        GeneralClass::redirect('/project/itool/AdminProduct/Index.php?'.$result, false);
    }
    
//    public function delete(){
//        $modelAction = new ProductFunctionality();        
//        $result=$modelAction->DeleteProduct($this->model);          
//        GeneralClass::redirect('/project/itool/AdminProduct/Delete.php?'.$result, false);
//    }
    
    public function update($id,$n,$d,$c,$b,$i){
       $this->model = new AddProduct();   
       $this->model->setProduct_Id($id);
       $this->model->setProduct_Name($n);
       $this->model->setProduct_Description($d);
       $this->model->setCategory_Id($c);
       $this->model->setBuying_Price($b);
       $this->model->setImage($i);
       $modelAction= new ProductFunctionalty();
       $result=$modelAction->UpdateProduct($this->model);
        if($result){
            GeneralClass::redirect('/project/itool/AdminProduct/Index.php');
        }
    }
}
echo '<script>alert("entered controller")</script>';

$controllerObj = new AdminProductController();