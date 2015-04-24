<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminProductController.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkAdmin($_SESSION['role']);
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
        
        $controllerObj->update($id,$_POST['name'],$_POST['desc'],$_POST['catid'],$_POST['price']);
           
    }
?>
    <div id="heading">
       <h1>Product</h1>
    </div>
        <hr/>

        <div class="tab" role="tabpanel">   

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Update Product</a></li>          
        </ul>

    <div id="heading3" class="tab-content">
        <div id="tab" role="tabpanel" class="tab-pane active" id="home">               
<!--            <h3>Update Category</h3>-->
<br/>
            <form action="update.php?id=<?=$id?>" method="post">
<!--                <label>Product Id:</label>  <input type="hidden" name="id" id="id" /><br/>-->
                <label>Product Name:</label><input class="form-control" type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea class="form-control" rows="3" cols="19" name="desc" id="desc" ></textarea><br/>
                <label>Category Id:</label> <input class="form-control" type="text" name="catid" id="catid" /><br/>
                <label>Buying Price:</label> <input class="form-control" type="text" name="price" id="price" /><br/>
               <input class="buttonstyle" type="submit" name="submit" id="submit" value="Update Product" />
            </form>
        </div>
    </div>
</div>
<?php
    LayoutClass::includeFooter();