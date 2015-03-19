<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';


class AdminController implements iAction{
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index': GeneralClass::redirect('/project/itool/Admin', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    
    
    
    
}


echo '<script>alert("entered admin controller")</script>';

if(isset($_GET['action']))
    {
    $view = $_GET['action'];

$adminObj = new AdminSearchController();
$adminObj->Action($view);
    }