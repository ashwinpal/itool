<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/RatingModel.php';

class RatingController implements iAction{
    
    public $model;
    public function Action($view){
        
        switch ($view){
            
            case 'Index' :  GeneralClass::redirect('../../rating', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    public function rating(){
        $modelAction=new RateFunctionalty();
        $result=$modelAction->RateProduct($this->model);        
    }
   
    
    
}

$ratingObj = new RatingController();
    