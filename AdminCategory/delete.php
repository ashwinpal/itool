<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminCategoryController.php';

LayoutClass::includeHeader();

?>
 
    <?php 
        LayoutClass::includeAdminNav();
    ?>
    
    <?php        
        if(onsubmitCheck('submit'))            
            {               
                $controllerObj->formValues();
                $controllerObj->delete();            
            }    
    ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
             
    </form>
<br><br>
        <?php
        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Category has been deleted."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in deleting category."; }
            
            }           
            echo '<div>'
        ?>
   
            
