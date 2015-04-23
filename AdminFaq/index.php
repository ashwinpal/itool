<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkAdmin($_SESSION['role']);
    
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>
<?php 
if (isset($_GET['r']))
{
    $msg= "FAQs successfully added";
}
else
    $msg="";
?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>Support FAQ</h1>
        </div>
        <hr/>
        
         <div id="tab">
            <li>
                <ul> 
                    <a class="page-links" href="insert.php"  >Insert FAQs</a> &nbsp;
                </ul>
            </li>
        </div>
        
        <h3>FAQ List</h3>
        <br/>
        
        <?php echo $msg;?>
          <div id="view_product">
            <form action="" method="post">
               <?php 
                $controllerObject->display();    
               ?>                                     
            </form> 
        </div>
         
    </body>
</html>


<?php
    LayoutClass::includeFooter();