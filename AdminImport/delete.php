

<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ImportProductModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new ImportFunctionality();

$r = $objModel -> DeleteOrder($id);

if($r){
    
    GeneralClass::redirect('../AdminImport/', false);   
    
}
?>