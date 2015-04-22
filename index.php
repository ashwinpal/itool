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
if(isset($_POST['login']))
{
   session_start();

   include_once 'Application/Class/GeneralClass.php';
   
    $_SESSION["uid"] = $_POST['uname'];

    if($_POST['uname']=='admin'){

        GeneralClass::redirect('Application/Controller/AdminController.php?action=Index', false);
        
        $_SESSION["admin"]=true;

    }
    else{

        GeneralClass::redirect('Application/Controller/HomeController.php?action=Index', false);
        $_SESSION["user"]=true;
    }
}