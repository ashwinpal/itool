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

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Import Product</h1>
        </div>
        <hr/>
        
            <br/>
          <div id="view_orders">
            <form action="" method="post">
               <label>Category Id:</label>  <input type="select" name="cat_id" id="cat_id" />
               <?php $controllerObj->select_option();  
 ?>
            <br/>
                <input type="submit" name="submit" id="submit" value="Add Category" />
                      
            </form> 
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();
