<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeHomeNav();
        ?>
<?php 
if (isset($_GET['r']))
{
    $msg= "Reports successfully added";
}
else
    $msg="";
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Report Generation</h1>
        </div>
        <hr/>
        
        <h3>Reports</h3>
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