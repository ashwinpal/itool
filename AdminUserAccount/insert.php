<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/UserModel.php';

    //include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';
    LayoutClass::includeHeader();
    GeneralClass::checkAdmin($_SESSION['role']);
?>   

        <?php
            LayoutClass::includeAdminNav();
        ?>

<?php
       $modelAction=new UserFunctionality();
      $result_role=$modelAction->DisplayRoleList();
        
         if(isset($_POST['submit']))
         {
             if($_POST['password']!=$_POST['cpassword'])
             {
                 $msg="Password does not match";
             }
        else {
                $msg="";
            $result=$modelAction->insert($_POST['userid'],$_POST['uname'],$_POST['role_id'],$_POST['email'],$_POST['password']);
            //var_dump($result);
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
                <label>User Id:</label> <input type="text" id="userid" name="userid"/><br/>
                <label>User Name:</label> <input type="text" id="uname" name="uname"/><br/>
                <label> Role:</label> <select name="role_id" id="role_id">
                    <?php foreach($result_role as $q)
                    {
                      echo "<option selected value=".$q['id'].">".$q['role_name']."</option>";
                 
                    }
                  ?>
                </select><br/>
                <label>Email id:</label> <input type="text" id="email" name="email"/><br/>
                <label>Password:</label> <input type="password" id="password" name="password"/><br/>
                <label>Confirm Password:</label> <input type="password" id="cpassword" name="cpassword"/> <br/>
                 <input type="submit" name="submit" id="submit" value="Add account" />
                 <input type="reset" name="reset" id="reset" value="Cancel" />
            </form>
        </div>
        <a class="page-links" href="index.php"  ><< Back to List</a>
    </body>
</html>

 <?php
            
        
 
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Values have been added."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in inserting values."; }
            
            }
            
            echo '<div>'
        ?>

<?php
    LayoutClass::includeFooter();


