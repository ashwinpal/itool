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

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>
<div id="update_invoices">
            <h3>Update invoices</h3>
            <form>
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Quantity:</label>  <input type="text" name="quantity" id="quantity" /><br/>
                <label>Selling Date:</label> <input type="text" name="date" id="date" /> <br/>
                <label>Selling Price</label> <input type="text" name="price" id="price" /><br/>
                <input type="submit" name="update" id="update" value="Update invoices" />
            </form>    
</div>
</body>
</html>


<?php
    LayoutClass::includeFooter();
