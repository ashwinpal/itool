<?php
ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminProductController.php';

    LayoutClass::includeHeader();

    LayoutClass::includeHomeNav();
        ?>  
<div id="tab">
    <div id="heading">
        <h1>Products</h1>
    </div>
    <hr/>
    <div role="tabpanel" class="tab-pane" id="profile"> 
<!--        <div id="view_product">-->
        <h3>View Products</h3>
            <form>
                <?php $controllerObj->display(); ?>
            </form>           
    </div>
</div>
<?php
    LayoutClass::includeFooter();
