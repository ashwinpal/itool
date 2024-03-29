<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';



class AdminSearchController implements iAction{
    
    public $model;
    
    
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('/project/itool/AdminSearch', false);
                break;
            case 'Delete':  GeneralClass::redirect("DeleteSearch.php", false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formValues(){
        
        $this-> model = new search();
        
        $this-> model->setKeyword($_POST['keyword']);
        $this-> model->setCount(0);
        
    }
    
    
    public function insert(){
        
            $modelAction = new SearchFunctionality();
        
            $result=$modelAction->InsertKeyword($this->model);
            
            GeneralClass::redirect('/project/itool/AdminSearch/Index.php?'.$result, false);
    }
    
    public function delete(){
        
            $modelAction = new SearchFunctionality();
        
            $result=$modelAction->DeleteKeyword($this->model);
            
            GeneralClass::redirect('/project/itool/AdminSearch/DeleteSearch.php?'.$result, false);
    }    
    
    
    public function update($word){
        
            $modelAction = new SearchFunctionality();
        
            $result=$modelAction->UpdateKeyword($word);
            
            GeneralClass::redirect('/project/itool/AdminSearch/UpdateSearch.php?'.$result, false);        
        
    }
    
    
            
}



$controllerObj = new AdminSearchController();

if(isset($_GET['action']))
    {
    $view = $_GET['action'];
    
    $controllerObj->Action($view);
    }
