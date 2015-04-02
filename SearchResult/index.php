<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/SearchController.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';

if(isset($_GET['query']))
{
    echo $_GET['query'];

    $controllerObj->retrieveValues($_GET['query']);
    
    //$obj = new SearchFunctionality();
    
    //$obj->GetProductId($_GET['query']);
    
}
