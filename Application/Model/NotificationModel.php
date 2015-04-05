<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';



class Notification_SystemModel{

    private $alert_id;
    private $user_id;
    private $alert_description;
    private $alert_condition;
    private $alert_content;
    private $product_id;

    public function getalertId()
    {
    	return $this->alert_id;
    }
    public function setalertId($value)
    {
    	$this->alert_id = $value;
    }

    public function getuserId()
    {
    	return $this->user_id;
    }
    public function setuserId($value)
    {
    	$this->user_id = $value;
    }

    public function getalertDescription()
    {
    	return $this->alert_description;
    }
    public function setalertDescription($value)
    {
    	$this->alert_description = $value;
    }

    public function getalertCondition()
    {
    	return $this->alert_condition;
    }
    public function setalertCondition($value)
    {
    	$this->alert_condition = $value;
    }

    public function getalertContent()
    {
    	return $this->alert_content;
    }
    public function setalertContent($value)
    {
    	$this->alert_content = $value;
    }

    public function getproductId()
    {
    	return $this->product_id;
    }
    public function setproductId($value)
    {
    	$this->product_id = $value;
    }

}



class NotificationFunctionality{
    
    
    public $dbcon;
    
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    

    public function checkRecepient($arr){
        
        foreach ($arr as $id) {
            
            $sql="select user_id from user_accounts where user_id = :id";

            $statement = $this->dbcon->prepare($sql);

            $statement->bindValue(':id', $id);

            $statement->execute();
            
            
            $row_count= 0;
            
            $row_count=$statement->rowCount();
            
            if($row_count == 0)
            {
                return 0;
            }
        }
        return 1;
    }
    
    public function sendMessage($model){
        
        $sql="Insert into notification_system(user_id, alert_description, alert_content) values(:sender_id,:subject,:msg)";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':sender_id', $model->getuserId());
        $statement->bindValue(':subject', $model->getalertDescription());
        $statement->bindValue(':msg', $model->getalertContent());

        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();

        $msgID = $this->dbcon->lastInsertId();
        
        
        if($success)
        {
            return $msgID;

        }
        else
        {
            return -1;
        }
        
    }
    
    public function delieverMessage($arr,$msgId){
        
        foreach($arr as $id){
            
        $sql="Insert into notify_person(alert_id, user_id) values(:msgId,:id)";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':msgId',$msgId);
        $statement->bindValue(':id', $id);

        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();
            
        }
        
        return 1;    
        
        
    }
    
    
    public function display()
        {

            $modelList = array();

            $obj = new AccessDB();

                    $con = $obj->dbConnect();

                    $sql="select alert_id from notification_system";

                    $q = $con->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($q as $r)
             {
                 echo $r['alert_id']." alert<br>";

             }
        }

}