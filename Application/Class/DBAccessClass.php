<?php

class AccessDB{
    
    public $dbcon=NULL;
    
    public function dbConnect() 
    {
        
         $username = "itoolDev";
         $password="agile";
        
         $dsn = 'mysql:host=ashwinpal.me;dbname=itoolDB';
        
        try
        {
           $this->dbcon = new PDO($dsn,$username,$password);
        }
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
            die("DB connection error");
        }

        return $this->dbcon;
    }





}