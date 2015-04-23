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
        <h1>Report Generated</h1>
<?php

$modelAction = new reportFunctionality();

      $view =$modelAction->DisplayProductReport($_GET['selectId']);
      
foreach($view as $row)
 {
    echo "Product Id: " . $row['product_id'] . "<br/>";
    echo "Product Name:" . $row['product_name'] . "<br/>";
    echo "Product Description: " . $row['product_description'] . "<br/>";
    echo "Category Id: " . $row['category_id'] . "<br/>";
    echo "Rating: " . $row['avg_rating'] . "<br/>";
    echo "Invoice Date: " . $row['invoice_date'] . "<br/>";
    echo "Total Selling Price: " . $row['total_sellingPrice'] . "<br/>";
    echo "Total Buying Price: " . $row['total_buyingPrice'] . "<br/>";
    echo "Difference: " . $row['difference'] . "<br/>";
    if($row['difference']>0)
    {
        echo "<strong>It is in PROFIT</strong>";
    }
    elseif ($row['difference']<0) {

        echo "<strong>It is in LOSS</strong>";
    
    }
    else{
                echo "<strong>Nor PROFIT - Nor LOSS</strong>";
    }
    echo "<br/><br/>";
}

?>
    </body>
</html>


<?php
    LayoutClass::includeFooter();

