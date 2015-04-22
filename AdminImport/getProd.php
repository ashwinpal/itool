
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ImportProductModel.php';

$cat_num = intval($_GET['q']);
$modelActionImport=new ImportFunctionality();
$result_prod=$modelActionImport->DisplayProd($cat_num);
            $flag=0;
 foreach ($result_prod as $prod) 
                     { 
                       echo "<option value=".$prod['product_id'].">".$prod['product_name']."</option>";
                       $flag=1;
                     }
                     if($flag==0)
                     {
                        echo "<option value='-1'>No product available</option>";  
                     }

   
?>
</body>
</html>
