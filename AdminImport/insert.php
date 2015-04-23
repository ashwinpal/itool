<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/AddCategoryModel.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ImportProductModel.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>
<?php
    $modelActionImport=new ImportFunctionality();
    $result_prod=$modelActionImport->DisplayProd();
       if(isset($_POST['submit']))
         {
        $result=$modelActionImport->InsertOrder($_POST['product_list'],$_POST['qty'],$_SESSION['uid']);
         }
   
 ?>   

<html>
    <head>
       
    </head>
    <body>
        <div id="heading">
             <h1>Import Product</h1>
        </div>
        <hr/>
        
            <br/>
          <div id="tab">
            <form action="" method="post">
               
               <label>Product</label>
               <select class="form-control" name="product_list" id="product_list" >
                   <option>Select Product</option>
                   <?php 
                     foreach ($result_prod as $prod) 
                     { 
                       echo "<option value=".$prod['product_id'].">".$prod['product_name']."</option>";
                     }                  
                     
                        ?> 
                </select>
               <br/>
                <label> Quantity: </label><input class="form-control" type="text" id="qty" name="qty"/><br/>
                <input class="buttonstyle" type="submit" name="submit" id="submit" value="Place Order" />
             
                      
            </form> 
               </div>
    </body>
</html>


<?php
    LayoutClass::includeFooter();
