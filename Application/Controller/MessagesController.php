<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';


class MessagesController implements iAction{
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index': GeneralClass::redirect('../../Messages', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    
    
    
    
}


$view = $_GET['action'];
$msgObj = new MessagesController();
$msgObj-> Action($view);