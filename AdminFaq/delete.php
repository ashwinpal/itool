<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/FaqModel.php';

$id=0;

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$objModel = new faqFunctionality();

$r = $objModel ->DeleteValues($id);

if($r){
    
    GeneralClass::redirect('../AdminFaq/', false);

    
}