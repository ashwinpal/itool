<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminCategoryController.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkAdmin($_SESSION['role']);
?>   

 <?php
            LayoutClass::includeAdminNav();
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
    <div id="heading">
       <h1>Category</h1>
    </div>
        <hr/>
        
        <div id="tab" role="tabpanel">   

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Update Category</a></li>          
        </ul>

    <div  class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
           <h3>Update Category</h3>
<br/><br/>
            <form action="update.php?id=<?=$id?>" method="post">
                <label >Enter The Category Name: </label>&nbsp;<input class="form-control" type="text" name="name" value="" id="name" /><br/><br/>
                <input class="buttonstyle" type="submit" name="submit" id="submit" value="Update" />               
            </form>
        </div>
    </div>
</div>
<?php
    LayoutClass::includeFooter();