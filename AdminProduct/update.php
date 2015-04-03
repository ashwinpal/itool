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
                <input type="text" name="name" value="" id="name" /><br/>
                <input type="text" name="" />
                <input type="submit" name="submit" id="submit" value="update" />               
            </form>
        </div>

<?php
    LayoutClass::includeFooter();