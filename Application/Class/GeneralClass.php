<?php


/**
 * Description of GeneralClass
 * 
 * All general an dglobal functionalities for the application
 * 
 *
 * @author gappan20
 */
class GeneralClass {
    
    public static function redirect($url, $statusCode = 303){
       header('Location: ' . $url, true, $statusCode);
       die();
    }
    
    public static function checkAdmin($in){
        if($in!=2||$in!='2')
        {
        self::redirect("../");
        }
    }
    
    public static  function checkUser($in){
        if($in!=1||$in!='1')
        {
        self::redirect("../");
        }
    }
    
}


