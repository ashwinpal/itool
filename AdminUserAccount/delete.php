

<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/UserModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new UserFunctionality();

$r = $objModel -> DeleteUser($id);

if($r){
    
    GeneralClass::redirect('../AdminUserAccount/', false);   
    
}
?>