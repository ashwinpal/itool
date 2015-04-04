<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ProductCategoryController.php';

    LayoutClass::includeHeader();
?>   

 <?php
            LayoutClass::includeHomeNav();
        ?>
<?php
    
    $id=0;

    if(isset($_GET['id'])){
        $id = $_GET['id'];   
    }

    if(isset($_POST['submit'])){
        
        $controllerObj->update($_POST['name'],$id);
           
    }
?>
        <div>
            <h3>Update Category</h3>
            <form action="update.php?id=<?=$id?>" method="post">
                <label>Product Id:</label>  <input type="text" name="id" id="id" /><br/>
                <label>Product Name:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea rows="3" cols="19" name="desc" id="desc" ></textarea><br/>
                <label>Category Id:</label> <input type="text" name="catid" id="catid" /><br/>
                <label>Buying Price</label> <input type="text" name="price" id="price" /><br/>
                <label>Image:</label> <input type="text" name="image" id="image" /><br/>
                <input type="submit" name="submit" id="submit" value="Update Product" />
            </form>
        </div>

<?php
    LayoutClass::includeFooter();