<html>
    <head></head>
    <body>
        
        <form action="" method="POST">
            <label>Username : </label>
            <input type="text" name="uname"/>
            <br/>
            <label>Password</label>
            <input type="password" name="pass">
            <br/>
            <button type="submit" value="Login" name="login">Login</button>
        </form>
    </body>
    
</html>



<?php

   session_start();
   
    $_SESSION["uid"] = NULL;
    $_SESSION["role"]=NULL;

if(isset($_POST['login']))
{

      
   include_once 'Application/Class/GeneralClass.php';
   
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/UserModel.php';

$modelAction=new UserFunctionality();
 $result=$modelAction->checkUser($_POST['uname'],$_POST['pass']);
 if ($result!=0)
 {
     
    $_SESSION["uid"] = $_POST['uname'];
    $_SESSION["role"]=$result['role_id'];

    if($_SESSION["role"]==2){

        GeneralClass::redirect('Application/Controller/AdminController.php?action=Index', false);
        
        $_SESSION["admin"]=true;

    }
    else{

        GeneralClass::redirect('Application/Controller/HomeController.php?action=Index', false);
        $_SESSION["user"]=true;
    }
}
 else {
    echo 'Incorrect Userid or password.';
}
}