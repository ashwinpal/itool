<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkAdmin($_SESSION['role']);
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>
<?php 
if (isset($_GET['r']))
{
    $msg= "invoices successfully added";
}
else
    $msg="";
?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
        <div id="tab">
        <h3>List of Invoices & Bills</h3>      
        
        <?php echo $msg;?>
          
            <form action="" method="post">
               <?php 
                $controllerObject->DisplayDetail();    
               ?>                                     
            </form> 
        
      <a class="buttonstyle" class="page-links" href="index.php"  ><< Back to List</a> 
      
      </div>
    </body>
</html>


<?php
    LayoutClass::includeFooter();