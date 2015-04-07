<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeHomeNav();
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
        <div id="product_heading">
             <h1>List of orders</h1>
        </div>
        <hr/>
        
        <div id="product_nav">
            <input type="Button" id="btn_place" name="btn_place" value="Place an Order"/>
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