<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/RatingController.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkUser($_SESSION['role']);
?>  

<?php
   LayoutClass::includeHomeNav();
?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>Rating a Product</h1>
        </div>
        <hr/>
        <div id="tab" role="tabpanel">
    
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="page-links" aria-controls="home" role="tab" data-toggle="tab">Rate A Product</a></li>
        </ul>

      <!-- Tab panes -->
  <div class="tab-content">
      
   <div class="heading3" role="tabpanel" class="tab-pane active" id="home"> 
            <h3>Rate A Product</h3>
            <form>
            <?php 
                $ratingObj->rating();
            ?>
            </form>           
    </div>
    </div>
  </div>
    </body>
</html>


<?php
    LayoutClass::includeFooter();
