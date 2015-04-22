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
        <div id="product_heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
        
<div id="update_invoices">
            <h3>Update invoices</h3>
            <form action="updateInvoices.php?id=<?=$id?>" method="post">
                <label>Product Id:</label>  <input type="text" name="name" id="name" value=<?=$details['product_id']?> /><br/>
                <label>Product Quantity:</label>  <input type="text" name="quantity" id="quantity" value=<?=$details['quantity']?> /><br/>
                <label>Selling Date:</label> <input type="text" name="date" id="date" value=<?=$details['invoice_date']?> /> <br/>
                <label>Selling Price</label> <input type="text" name="price" id="price" value=<?=$details['selling_price']?> /><br/>
                <input type="submit" name="submit" value="Update invoices" />
            </form>    
</div>
        <a class="page-links" href="index.php"  ><< Back to List</a>
</body>
</html>


<?php
    LayoutClass::includeFooter();
