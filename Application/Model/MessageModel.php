<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageModel
 *
 * @author gappan20
 */

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/NotificationModel.php';

class MessageModel {
    //put your code here
    private $id;
    private $alert_id;
    private $user_id;
    
    public function getId() {
        return $this->id;
    }
    
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
        
}


class MessageFunctionality{
    
    public $dbcon;
    
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    
    public function retrieve5Msg($id)
    {
        $msgList = array();
        
        $sql="select * from notify_person where user_id = :id LIMIT 5";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':id', $id);

        $statement->execute();
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        $row_count=$statement->rowCount();
            
         if($row_count > 0)
         {
        
            $i=0;

            foreach ($statement as $r){

                $msgList[$i] = $r['alert_id'];
                $i++;
            }
            
            return $this->retrieveMsgSub($msgList);
         }
        
        
        return NULL;
    }
    
    public function retrieveMsgSub($list){
        
        $subjectList = array();
        
        $i=0;
        
        foreach ($list as $val) {
        
            $msg = new Notification_SystemModel();
            
            $sql="select alert_description from notification_system where alert_id = :id";

            $statement = $this->dbcon->prepare($sql);

            $statement->bindValue(':id', $val);

            $statement->execute();
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
                       
            foreach ($statement as $v) {
                
                $msg->setalertId($val);
                $msg->setalertDescription($v['alert_description']);
                
            }
            
            $subjectList[$i] = $msg;
            $i++;
        }
        
        return $subjectList;
        
    }
    
}