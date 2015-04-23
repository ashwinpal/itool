<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/UserModel.php';


    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>
<?php
       $modelAction=new UserFunctionality();
      $result=$modelAction->DisplayUserList();
        
?>
<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>User Accounts</h1>
        </div>
        <hr/>
        
        <div id="product_nav">
            <a class="buttonstyle" href="insert.php"  >Create new account</a>
        </div>
        <br/>
                <div id="view_orders">
            <form action="" method="post">
               <?php 
                   echo '<table border="1"> <th>User Id</th><th>User Name</th><th>Role</th><th>Email</th><th>Action</th>';
                    foreach($result as $q)
                    {
                       
                       echo '<tr>';
                       echo '<td>'. $q['user_id'].'</td><td>'.$q['user_name'].'</td><td>'.$q['role_name'].'</td><td>'. $q['email_id'].'</td><td><a href=edit.php?id='.$q['user_id'].'>Edit</a> / <a href=delete.php?id='.$q['user_id'].'>Delete</a></td>';
                       echo '</tr>';   
                     }
                 
                                                      
                ?>
                      
            </form> 
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();
