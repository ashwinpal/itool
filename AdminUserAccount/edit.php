<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/UserModel.php';

    //include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';
    LayoutClass::includeHeader();
?>   

        <?php
            LayoutClass::includeAdminNav();
        ?>

<?php
       $modelAction=new UserFunctionality();
      $result_role=$modelAction->DisplayRoleList();
        $details = $modelAction->DisplayById($_GET['id']);       
         if(isset($_POST['submit']))
         {
             //echo 'hi';
             if($_POST['password']!=$_POST['cpassword'])
             {
                 $msg="Password does not match";
             }
        else {
                $msg="";
               //var_dump($_POST);
            $result=$modelAction->UpdateUser($_GET['id'],$_POST['uname'],$_POST['role_id'],$_POST['email'],$_POST['password']);
            var_dump($result);
           }
         }
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Create new account</h1>
        </div>
        <hr/>    
        <?php if(isset($_POST['submit']))
        {
            echo $msg.'<br/>';
        }
?>
        <div id="add_product">
            
            <form method="post">
                <label>User Id:</label> <label><?php echo $details['user_id'];?></label><br/>
                <label>User Name:</label> <input type="text" id="uname" name="uname" value="<?php echo $details['user_name'];?>"/><br/>
                <label> Role:</label> <select name="role_id" id="role_id">
                    <?php foreach($result_role as $q)
                    {
                      echo "<option selected value=".$q['id'].">".$q['role_name']."</option>";
                 
                    }
                  ?>
                </select><br/>
                <label>Email id:</label> <input type="text" id="email" name="email" value="<?php echo $details['email_id'];?>"/><br/>
                <label>Password:</label> <input type="text" id="password" name="password" value="<?php echo $details['password'];?>"/><br/>
                <label>Confirm Password:</label> <input type="text" id="cpassword" name="cpassword" value="<?php echo $details['password'];?>"/> <br/>
               <br/> <br/> <input type="submit" name="submit" id="submit" value="Update" />
                 <input type="reset" name="reset" id="reset" value="Cancel" />
                 
            </form>
        </div>
     <br/>   <a class="page-links" href="index.php"  ><< Back to List</a>
    </body>
</html>

 
<?php
    LayoutClass::includeFooter();



