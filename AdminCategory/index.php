<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminCategoryController.php';

    LayoutClass::includeHeader();
?>   

 <?php
            LayoutClass::includeHomeNav();
        ?>
<?php
    if(onsubmitCheck('submit'))
        {
        
//        $cat = new AddCategory();
//        $cat->getCategory_Name($_POST['category_id']);
//        
//        $catModel = new CategoryFunctionality();
//        $a=$catModel->InsertCategory($cat);
        
        //GeneralClass::redirect('../AdminCategory/Index.php?'.$a, false);
        
        $controllerObj->formValues();
        $controllerObj->insert();
       // $controllerObj->display();
    }

?>

        <div id="category_heading">
             <h1>Category</h1>
        </div>
        <hr/>
<div role="tabpanel">  
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Add New Category</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" class="page-links" role="tab" data-toggle="tab">View Category</a></li>
        </ul>
     <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
<!--             <h3>Add New Category</h3>-->
<br/><br/>
             <form action="" method="post">
                <label>Category Name:</label>  <input type="text" name="name" id="name" /><br/>
                <input type="submit" name="submit" id="submit" value="Add Category" />
            </form>
        </div>

        <div role="tabpanel" class="tab-pane" id="profile">
            <h3>All Categories</h3>
            <br/>
            <form action="" method="post">
               <?php 
                $controllerObj->display();  
                
               ?>                      
            </form> 
        </div>
     </div>
</div>       
        <?php        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Keyword has been added."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in inserting keyword."; }
            
            }
            
            echo '</div>'
        ?>


<?php
    LayoutClass::includeFooter();
