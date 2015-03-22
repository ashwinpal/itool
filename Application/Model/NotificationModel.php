<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';



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

$obj = new NotificationFunctionality();

$obj->display();