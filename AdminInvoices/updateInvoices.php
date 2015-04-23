<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';
    LayoutClass::includeHeader();
?>   

        <?php
            LayoutClass::includeAdminNav();
        ?>

<?php
    
    $id=0;

    if(isset($_GET['id'])){
        $id = $_GET['id'];   
    }
    
     $iobj = new invoicesFunctionality();
     
     $details = $iobj->DisplayById($id);
     
     
    if(isset($_POST['submit'])){
        
        //$controllerObject->update($in,$_POST['product_id'],$_POST['quantity'],$_POST['invoice_date'],$_POST['selling_price']);
        
        $model = new invoicesFunctionality();
        
        $model->UpdateValues($id,$_POST['name'],$_POST['quantity'],$_POST['date'],$_POST['price']);
        
        GeneralClass::redirect('/project/itool/AdminInvoices', false);
    }
?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
        
<div id="tab">
            <h3>Update invoices</h3>
            <form action="updateInvoices.php?id=<?=$id?>" method="post">
                <label>Product Id:</label>  <input class="form-control" type="text" name="name" id="name" value=<?=$details['product_id']?> /><br/>
                <label>Product Quantity:</label>  <input class="form-control" type="text" name="quantity" id="quantity" value=<?=$details['quantity']?> /><br/>
                <label>Selling Date:</label> <input class="form-control" type="text" name="date"  value=<?=$details['invoice_date']?> /> <br/>
                <label>Selling Price</label> <input class="form-control" type="text" name="price" id="price" value=<?=$details['selling_price']?> /><br/>
                <input class="buttonstyle" type="submit" name="submit" value="Update invoices" />
                

            <a class="buttonstyle" class="page-links"  href="index.php"  ><< Back to List</a>
            
            </form>
        </div>
</body>
</html>


<?php
    LayoutClass::includeFooter();
