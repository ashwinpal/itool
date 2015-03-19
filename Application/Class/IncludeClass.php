<?php


class LayoutClass{
    
    public static function includeHeader(){
        include_once '../Application/Layout/header.php';
    }
    
    public static function includeHomeNav(){
        include_once '../Application/Layout/navigation.php';
    }
    
    public static function includeAdminNav(){
        include_once '../Application/Layout/admin_navigation.php';
    }
    
    public static function includeFooter(){
        include_once '../Application/Layout/footer.php';
    }
}

