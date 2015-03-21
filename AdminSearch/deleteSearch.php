<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminSearchController.php';

LayoutClass::includeHeader();

?>
 
    <?php 
        LayoutClass::includeAdminNav();
    ?>
    
    <?php
        
        if(onsubmitCheck('submit'))
            // validation 1 , checking if submit is clicked
            {
               
                $controllerObj->formValues();
                $controllerObj->delete();
            
            }
    
    ?>



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Enter a new keyword : </label>
        <input type="text" name="keyword"/>
        <br>
        <input type="submit" name="submit" value="Submit"/>
        
    </form>
<br><br>
<a style="color: black" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?action=Insert';?>">Insert</a>

        <?php
        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Keyword has been deleted."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in deleting keyword."; }
            
            }
            
            echo '<div>'
        ?>
   
            

    
<?php
    LayoutClass::includeFooter();