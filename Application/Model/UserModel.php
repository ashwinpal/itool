<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/GeneralClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/Interfaces.php';
include_once  $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class UserAccount
{
    private $userid;
    private $username;
    private $role;
   private $email;
   private $password;
   
   public function getUserID()
    {
        return $this->userid;
    }
    public function setUserID($value)
    {
        $this->userid = $value;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function setUserName($value)
    {
        $this->username = $value;
    }
    
    public function getRoleId()
    {
        return $this->role;
    }
    public  function setRoleId($value)
    {
        $this->role = $value;
    }
    public function getEmail()
    {
        return $this->email;
    }
     public  function setEmail($value)
    {
        $this->email = $value;
    }
   public function getPassword()
    {
        return $this->password;
    }
     public  function setPassword($value)
    {
        $this->password = $value;
    }
    

}
class UserFunctionality{
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    public function checkUser($uid,$pass)
    {
        $sql="select role_id from user_accounts where user_id='".$uid."'&& password='".$pass."'";
        //var_dump($sql);
        $statement = $this->dbcon->prepare($sql);
        $success = $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
          return $row;
        
    }

    public function insert($user_id,$uname,$role_id,$email,$password)
    {
        $sql = "insert into user_accounts (user_id,user_name,role_id,password,email_id) values ('".$user_id."','".$uname."','".$role_id."','".$password."','".$email."')";
        $statement = $this->dbcon->prepare($sql);
        //var_dump($statement);
        $success = $statement->execute();
       //return $success;
        GeneralClass::redirect('/project/itool/AdminUserAccount/Index.php?'.$success, false);
    }
    public function DisplayById($id){
        $sql="select * from user_accounts where user_id ='". $id."'";
         $statement = $this->dbcon->prepare($sql);
        $success = $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
          return $row;
        
        }

         public function  DeleteUser($id){
        
        $sql="Delete from user_accounts where user_id = :id ";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':id', $id);
        
        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();

        //$jobID = $this->dbcon->lastInsertId();

        if($success)
        {
            return 1;

        }
        else
        {
            
            return 0;
        } 
    }


    public function DisplayRoleList()
    {
        $query="select * from roles_table";
       // var_dump($query);
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
    }
    public function DisplayUserList()
    {
        $query="select ui.user_id,role_name,email_id,user_name from user_accounts as ui Join roles_table as rl on ui.role_id=rl.id";
       // var_dump($query);
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
    }
    public function UpdateUser($id,$uname,$roleid,$email,$password)
            {
       $sql="Update user_accounts set user_name ='". $uname."', role_id = '".$roleid."',email_id='". $email."',password='".$password ."' where user_id = '".$id."'";
        $statement = $this->dbcon->prepare($sql);
        //var_dump($statement);
        $success = $statement->execute();
        //var_dump($success) ;      
       GeneralClass::redirect('/project/itool/AdminUserAccount/Index.php?'.$success, false);
    }
    
}  
?>