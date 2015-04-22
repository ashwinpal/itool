<!DOCTYPE html>
<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeHomeNav();
?>
<html>
    <body>
<?php

$modelAction = new reportFunctionality();
      $view =$modelAction->getReport();
      
foreach($view as $row)
 {
    echo "Product Id: " . $row['product_id'] . "<br/>";
    echo "Product Name:" . $row['product_name'] . "<br/>";
    echo "Product Description: " . $row['product_description'] . "<br/>";
    echo "Category Id: " . $row['category_id'] . "<br/>";
    echo "Buying Price: " . $row['buying_priice'] . "<br/>";
    echo "Image: " . $row['image'] . "<br/>";
    echo "Rtaing: " . $row['rating'] . "<br/>";
    echo "</tr>";
}

?>
    </body>
</html>


<?php
    LayoutClass::includeFooter();

