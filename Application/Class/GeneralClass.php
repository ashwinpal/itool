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
    
}


