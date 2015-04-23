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
<div id="heading">
        <h1>Report Generated</h1>
</div>
<div id="tab">
<?php

$modelAction = new reportFunctionality();

      $view =$modelAction->DisplayProductReport($_GET['selectId']);
      
foreach($view as $row)
 {
  
    echo "<label style='color:#2574A9;'><strong>Product Id: </strong></label>&nbsp;" . $row['product_id'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Product Name: </strong></label>&nbsp;" . $row['product_name'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Product Description: </strong></label>&nbsp;" . $row['product_description'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Category Id: </strong></label>&nbsp;" . $row['category_id'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Rating: </strong></label>&nbsp;" . $row['avg_rating'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Invoice Date: </strong></label>&nbsp;" . $row['invoice_date'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Total Selling Price: </strong></label>&nbsp;" . $row['total_sellingPrice'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Total Buying Price: </strong></label>&nbsp;" . $row['total_buyingPrice'] . "<br/>";
    echo "<label style='color:#2574A9;'><strong>Difference: </strong></label>&nbsp;" . $row['difference'] . "<br/>";
    if($row['difference']>0)
    {
        echo "<label style='color:#335f7d;'><strong>It is in PROFIT</strong></label>";
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
</div>
<?php
    LayoutClass::includeFooter();

