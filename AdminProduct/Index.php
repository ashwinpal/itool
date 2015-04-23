<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminProductController.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeAdminNav();
?>

        <div id="heading">
             <h1>Product</h1>
        </div>
        <hr/>
        <?php
         if(onsubmitCheck('submit'))
           {
             
          if($_POST['id']==""|| $_POST['name']=="" ||$_POST['desc']==""|| $_POST['catid']==""|| $_POST['price']=="")
        {
          echo "<strong>*All fields are required</strong>";
        }
    
        else{
            $controllerObj->formValues();
            $controllerObj->insert(); 
        } 
    }
?>
<div id="tab" role="tabpanel">
    
       <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Add New Product</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" class="page-links" role="tab" data-toggle="tab">View Product</a></li>
        </ul>

      <!-- Tab panes -->
      <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
<!--        <div id="add_product">-->
<!--            <h3>Add New Products</h3>-->
            <form action="" method="post">
                <label>Product Id:</label>  <input class="form-control" placeholder="PID000" type="text" name="id" id="id" /><br/>
                <label>Product Name:</label>  <input class="form-control" placeholder="Name" type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea class="form-control" rows="3" cols="19" name="desc" id="desc" ></textarea><br/>
                <label>Category Id:</label> <input class="form-control" placeholder="1" type="text" name="catid" id="catid" /><br/>
                <label>Buying Price</label> <input class="form-control" placeholder="12.00" type="text" name="price" id="price" /><br/>
                <input class="buttonstyle" type="submit" name="submit" id="submit" value="Add Product" />
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