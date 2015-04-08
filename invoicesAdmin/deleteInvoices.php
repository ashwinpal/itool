<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';

LayoutClass::includeHeader();

?>
 
    <?php 
        LayoutClass::includeAdminNav();
    ?>
    
    <?php
        
        if(onsubmitCheck('submit'))
            // validation 1 , checking if submit is clicked
            {
               
                $controllerObject->formValues();
                $controllerObject->delete();
            
            }
    
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
                    <a class="page-links" href="insert.php"  >Insert invoices</a> &nbsp;
                    <a class="page-links" href="UpdateInvoices.php"  >Update invoices</a> &nbsp;
                    <a class="page-links" href="deleteInvoices.php"  >Delete invoices</a> &nbsp;
                </ul>
            </li>
        </div>

    <h3>Delete invoices</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Enter a Product Id : </label>
        <input type="text" name="product_id"/>
        <br>
        <input type="submit" name="submit" value="Submit"/>
        
    </form>
    
    <a class="page-links" href="index.php"  ><< Back to List</a>
    </body>
</html>
<br><br>
<a style="color: black" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?action=delete';?>"></a>

        <?php
        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "product has been deleted."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in deleting product."; }
            
            }
            
            echo '<div>'
        ?>
   
            

    
<?php
    LayoutClass::includeFooter();