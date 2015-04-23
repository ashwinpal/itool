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


    <div id="heading">
       <h1>Rate This Product</h1>
    </div>
        <hr/>

        <div id="tab" role="tabpanel">   

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Rate Product</a></li>          
        </ul>

    <div id="tab" class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">               
<!--            <h3>Update Category</h3>-->
<br/>
        <form action="rateProduct.php" method="get">
                <label>Product Id: </label><?php $a=$_GET['id'];echo $a; ?>
                <input type="hidden" name="pid" value="<?=$_GET['id']?>"><br/>
                <input type="radio" name="rate" value="1">&nbsp;1&nbsp;
                <input type="radio" name="rate" value="2">&nbsp;2&nbsp;
                <input type="radio" name="rate" value="3">&nbsp;3&nbsp;
                <input type="radio" name="rate" value="4">&nbsp;4&nbsp;
                <input type="radio" name="rate" value="5">5<br/><br/>
                
                <input class="buttonstyle" type="submit" name="submit" value="Rate It!" id="rate" />
        </form>    
                <br/><br/>
                
                <div id="status"></div>
        </div>
    </div>
</div>



<?php
    LayoutClass::includeFooter();

    

