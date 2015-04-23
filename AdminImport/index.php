<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>
<?php 
if (isset($_GET['r']))
{
    $msg= "Order is successfully recieved";
}
else
    $msg="";
?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>List of orders</h1>
        </div>
        <hr/>
        
        <div id="tab">
            <a class="buttonstyle" href="insert.php"  >Place an order</a>
        </div>
        <br/>
        <?php echo $msg;?>
          <div id="view_orders">
            <form action="" method="post">
               <?php 
                $controllerObj->display();  
                
               ?>                      
            </form> 
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();