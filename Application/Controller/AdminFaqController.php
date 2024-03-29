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
        $this-> model->setQuestions($_POST['Question']);
        $this->model->setAnswers($_POST['Answer']);
        
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

     public function delete(){
        
            $modelAction = new faqFunctionality();
        
            $result=$modelAction->DeleteValues($this->model);
            
            GeneralClass::redirect('/project/itool/AdminFaq/delete.php?'.$result, false);
    }    
    
//    public function update($id, $q, $a){
//        
//        $this->model = new addFaq();
//        $this->model->setId($id);
//        $this->model->setQuestions($q);
//        $this->model->setAnswers($a);
//        $modelAction=new faqFunctionality();
//        $result=$modelAction->update($this->model);  
//         
//        var_dump($result);
//         
//        if($result){
//            //GeneralClass::redirect('/project/itool/AdminFaq/Index.php?r='.$result,false);
//        }
//    }
    }

$controllerObject = new AdminFaqController();