<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminProductController.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeHomeNav();
?>
<?php
  if(onsubmitCheck('submit')){
      
      
      $controllerObj->formValues();
      $controllerObj->insert();
  }  
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Product</h1>
        </div>
        <hr/>
<div role="tabpanel">
<!--        <div id="product_nav">
            <ul>
                <li><a href="#">Add Product</a></li>
                <li><a href="#">View Product</a></li>
                <li><a href="#">Delete Product</a></li>
            </ul>
        </div>-->

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Add New Product</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" class="page-links" role="tab" data-toggle="tab">View Product</a></li>
       </ul>

      <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
<!--        <div id="add_product">-->
            <h3>Add New Products</h3>
            <form action="" method="post">
                <label>Product Id:</label>  <input type="text" name="id" id="id" /><br/>
                <label>Product Name:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea rows="3" cols="19" name="desc" id="desc" ></textarea><br/>
                <label>Category Id:</label> <input type="text" name="catid" id="catid" /><br/>
                <label>Buying Price</label> <input type="text" name="price" id="price" /><br/>
                <label>Image:</label> <input type="text" name="image" id="image" /><br/>
                <input type="submit" name="submit" id="submit" value="Add Product" />
            </form>           
    </div>
      
    <div role="tabpanel" class="tab-pane" id="profile"> 
<!--        <div id="view_product">-->
            <h3>View Products</h3>
            <form>
                <?php $controllerObj->display(); ?>
            </form>           
    </div>
  </div>
</div>
<!--        <div id="update_product">
            <h3>Update Product</h3>
            <form>
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Name:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea rows="3" cols="19" name="desc"></textarea><br/>
                <label>Category Id:</label> 
                <select name="U_category">  
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                </select><br/>
                <label>Buying Price</label> <input type="text" name="price" id="price" /><br/>
                <label>Image:</label> <input type="file" name="image" id="image" /><br/>
                <input type="submit" name="submit" id="submit" value="Update Product" />
            </form>
        </div>-->
    </body>
</html>
        <?php        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "New Product Has Been Inserted."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Can Not Insert."; }
            
            }
            
            echo '</div>'
        ?>

<?php
    LayoutClass::includeFooter();