<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/SearchController.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/SearchModel.php';

LayoutClass::includeHeader();

GeneralClass::checkUser($_SESSION['role']);

?>
<?php 
        LayoutClass::includeHomeNav();
    ?>
<div id="page-wrapper">

            <div class="container-fluid">
                
                <h1>Search Result : <?=$_GET['query']?></h1>
                <br/>

        <?php
            if(isset($_GET['query']))
            {


                $controllerObj->retrieveValues($_GET['query']);

                //$obj = new SearchFunctionality();

                //$obj->GetProductId($_GET['query']);

            }
        ?>

            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php
    LayoutClass::includeFooter();