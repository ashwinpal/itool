<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';
    LayoutClass::includeHeader();
?>   

        <?php
            LayoutClass::includeHomeNav();
        ?>

<?php
    
    $id=0;

    if(isset($_GET['id'])){
        $in = $_GET['id'];   
    }
    
    
    
    if(isset($_POST['submit'])){
        
        //$controllerObject->update($in,$_POST['product_id'],$_POST['quantity'],$_POST['invoice_date'],$_POST['selling_price']);
        
        $model = new invoicesFunctionality();
        
        $model->UpdateValues($in,$_POST['name'],$_POST['quantity'],$_POST['date'],$_POST['price']);
    }
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
        
         <div id="product_nav">
            <li>
                <ul> 
                    <a class="page-links" href="insert.php"  >Insert invoices</a> 
                </ul>
            </li>
        </div>
<div id="update_invoices">
            <h3>Update invoices</h3>
            <form action="updateInvoices.php?id=<?=$in?>" method="post">
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Quantity:</label>  <input type="text" name="quantity" id="quantity" /><br/>
                <label>Selling Date:</label> <input type="text" name="date" id="date" /> <br/>
                <label>Selling Price</label> <input type="text" name="price" id="price" /><br/>
                <input type="submit" name="submit" value="Update invoices" />
            </form>    
</div>
        <a class="page-links" href="index.php"  ><< Back to List</a>
</body>
</html>


<?php
    LayoutClass::includeFooter();
