<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/AddCategoryModel.php';

class AdminCategoryController implements iAction{
    
    public $model;
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('../../AdminCategory', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formvalues(){
        $this->model =  new AddCategory();
        $this->model->setCategory_Name($_POST['name']);
    }
     
    public function insert(){
        $modelAction=new CategoryFunctionality();
        $result=$modelAction->InsertCategory($this->model);
        GeneralClass::redirect('/project/itool/AdminCategory/Index.php?'.$result, false);
    }
    
    public function display(){
        $modelAction=new CategoryFunctionality();
        $result=$modelAction->DisplayCategory($this->model);
    }
    
    public function update($n,$id){
        
        $this->model = new AddCategory();
        $this->model->setCategory_Id($id);
        $this->model->setCategory_Name($n);
        $modelAction=new CategoryFunctionality();
        $result=$modelAction->UpdateCategory($this->model);  
        if($result){
            GeneralClass::redirect('/project/itool/AdminCategory/Index.php');
        }
    }
}

echo '<script>alert("entered controller")</script>';

$controllerObj = new AdminCategoryController();

//$view = $_GET['action'];
//
//$adminObj = new AdminCategoryController();
//$adminObj->Action($view);