<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ProductsModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new ProductFunctionalty();

$r = $objModel -> DeleteProduct($id);

if($r){
    
    GeneralClass::redirect('../AdminProduct/', false);   
    
}
// else {
//    
//     echo "Error!!!, you cannot delete. Try again later";
//}
