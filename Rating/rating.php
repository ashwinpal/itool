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


    <div id="product_heading">
       <h1>Product</h1>
    </div>
        <hr/>

<div role="tabpanel">   

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Update Product</a></li>          
        </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">               
<!--            <h3>Update Category</h3>-->
<br/>
            <form action="update.php?id=<?=$id?>" method="post">
<!--                <label>Product Id:</label>  <input type="hidden" name="id" id="id" /><br/>-->
                <label>Product Name:</label>&nbsp;<input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>&nbsp;  <textarea rows="3" cols="19" name="desc" id="desc" ></textarea><br/>
                <label>Category Id:</label>&nbsp; <input type="text" name="catid" id="catid" /><br/>
                <label>Buying Price:</label>&nbsp; <input type="text" name="price" id="price" /><br/>
                <label>Image:</label>&nbsp; <input type="text" name="image" id="image" /><br/><br/>
                <input type="submit" name="submit" id="submit" value="Update Product" />
            </form>
        </div>
    </div>
</div>



<?php
    LayoutClass::includeFooter();

    
