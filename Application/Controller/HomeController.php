<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';


class HomeController implements iAction{
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index': GeneralClass::redirect('../../Home', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    
    
    
    
}


$view = $_GET['action'];

$homeObj = new HomeController;
$homeObj->Action($view);
