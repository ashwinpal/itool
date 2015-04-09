<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/InvoicesModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new invoicesFunctionality();

$r = $objModel ->DeleteValues($id);

if($r){
    
    GeneralClass::redirect('../invoicesAdmin/', false);

    
}