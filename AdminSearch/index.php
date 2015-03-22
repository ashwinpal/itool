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
                $controllerObj->insert();
            
            }
    
    ?>

   <div id="page-wrapper">

            <div class="container-fluid">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Enter a new keyword : </label>
        <input type="text" name="keyword"/>
        <br>
        <input type="submit" name="submit" value="Submit"/>
        
    </form>
<br><br>
<a style="color: black" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?action=Delete';?>">delete</a>

        <?php
        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Keyword has been added."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in inserting keyword."; }
            
            }
            
            echo '<div>'
        ?>
   
<br>
<br>
<input type="text" name="date" id="date">
            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
<?php
    LayoutClass::includeFooter();