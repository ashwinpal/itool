<?php


include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';

class SearchController implements iAction{
    
    public function Action($view){
        
        switch ($view){
            
            case 'Index': GeneralClass::redirect('/project/itool/SearchResult', false);
                break;
            default : die('Error in action call ->'.$view);
                
        }
    }
    
    
    public function retrieveValues($word){
        
        $sObj = new SearchFunctionality();
        $id = $sObj->GetProductId($word);
        
        echo '<br><br>id is : '.$id;
        
        $ans=$sObj->SearchDatabase($id);
        
        echo '<br><br>result is : '.$ans;
    }
     
}


$controllerObj = new SearchController();

if(isset($_GET['action']))
    {
    $view = $_GET['action'];
    
    $controllerObj->Action($view);
    }
