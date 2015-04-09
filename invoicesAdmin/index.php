<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeHomeNav();
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
        <div id="product_heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
        
         <div id="product_nav">
            <li>
                <ul> 
                    <a class="page-links" href="insert.php"  >Insert invoices</a> 
                </ul>
            </li>
        </div>
        
        <h3>List of Invoices & Bills</h3>
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