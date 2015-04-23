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
        <form action="rateProduct.php" method="get">
                <label>Product Id: </label><?php $a=$_GET['id'];echo $a; ?>
                <input type="hidden" name="pid" value="<?=$_GET['id']?>">
                <input type="radio" name="rate" value="1">1<br/>
                <input type="radio" name="rate" value="2">2<br/>
                <input type="radio" name="rate" value="3">3<br/>
                <input type="radio" name="rate" value="4">4<br/>
                <input type="radio" name="rate" value="5">5<br/><br/>
                
                <input type="submit" name="submit" value="Rate It!" id="rate" />
        </form>    
                <br/><br/>
                
                <div id="status"></div>
        </div>
    </div>
</div>



<?php
    LayoutClass::includeFooter();

    

