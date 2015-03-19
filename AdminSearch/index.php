
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
            
                
                //GeneralClass::redirect('../Application/Controller/AdminSearchController.php?action=Insert&keyword='.$_POST['keyword'], false);

//                        $model = new search();
//        
//                        $model->setKeyword($_POST['keyword']);
//                        $model->setCount(0);
                
                      
                        
//                        $modelAction = new SearchFunctionality();
//        
//                        $result=$modelAction->InsertKeyword($model);
        
        
        
                        //GeneralClass::redirect('../AdminSearch/Index.php?'.$result, false);
            
                
                
                $controllerObj->formValues();
                $controllerObj->insert();
            
            }
    
    ?>



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
   
            

    
<?php
    LayoutClass::includeFooter();