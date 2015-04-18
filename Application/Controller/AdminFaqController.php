<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/FaqModel.php';

class AdminFaqController implements iAction{
    
    public $model;
      
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('/project/itool/AdminFaq', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function formValues(){
        
        $this-> model = new FAQ();
        
        $this-> model->setId($_POST['id']);
        $this-> model->setQuestions($_POST['questions']);
        $this->model->setAnswers($_POST['answers']);
        
    }
    
    public function insert(){
        
            $modelAction = new faqFunctionality();
        
            $result=$modelAction->InsertValues($this->model);
            
            GeneralClass::redirect('/project/itool/AdminFaq/insert.php?'.$result, false);
    }
    
    public function display(){
        $modelAction = new faqFunctionality();
        
        $result=$modelAction->DisplayFaq($this->model);
            
    }
}


echo '<script>alert("entered controller")</script>';

$controllerObject = new AdminFaqController();