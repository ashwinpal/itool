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
        <div id="heading">
             <h1>List of orders</h1>
        </div>
        <hr/>
        
  
          <div>
            <form action="" method="post">
               <?php 
                $controllerObj->displayPublic();  
                
               ?>                      
            </form> 
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();