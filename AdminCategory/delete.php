<?php

    LayoutClass::includeHeader();
    

GeneralClass::checkAdmin($_SESSION['role']);

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/AddCategoryModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new CategoryFunctionality();

$r = $objModel ->DeleteCategory($id);

if($r){
    
    GeneralClass::redirect('../AdminCategory/', false);

    
}
 else {
    
     echo "Error!!!, you cannot delete a category if it has products under it";
}
