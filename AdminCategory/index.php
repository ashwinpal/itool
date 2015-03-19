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
    }

?>
 
        <div id="category_heading">
             <h1>Product</h1>
        </div>
        <hr/>
        
        <div id="category_nav">
            <ul>
                <li><a href="#">Add Category</a></li>
                <li><a href="#">View Category</a></li>
                <li><a href="#">Delete Category</a></li>
            </ul>
        </div>
        
        <div id="add_category">
            <h3>Add New Category</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label>Category Name:</label>  <input type="text" name="name" id="name" /><br/>
                <input type="submit" name="submit" id="submit" value="Add Category" />
            </form>
        </div>
<!--        <div id="view_category">
            <h3>View Category</h3>
            <form>
                <table border="1">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>
                    <tr>                       
                        <td>abc</td>
                        <td>abc</td>
                    </tr>
                </table>
            </form>           
        </div>
        <div id="update_category">
            <h3>Update Category</h3>
            <form>
                <label>Category Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Category Name:</label>  <input type="text" name="name" id="name" /><br/>              
                <input type="submit" name="submit" id="submit" value="Update Category" />
            </form>
        </div>-->

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
