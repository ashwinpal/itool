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
         if(onsubmitCheck('submit'))
    // validation 1 , checking if submit is clicked
            {
//                        $model = new invoices();
//        
//                        $model->setproductId($_POST['name']);
//                        $model->setQuantity($_POST['quantity']);
//                        $model->setsellingDate($_POST['date']);
//                        $model->setsellingPrice($_POST['price']);
//                        $model->setuserId("U123");
//                    $modelAction = new invoicesFunctionality();
//        
//                    $result=$modelAction->insertValues($model);
//       
//                    GeneralClass::redirect('../invoicesAdmin/Index.php?'.$result, false);
//                    
            $controllerObj->formValues();
            $controllerObj->insert();
             
            }
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>     
        
        <div id="add_product">
            <h3>Add invoices information</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Quantity:</label>  <input type="text" name="quantity" id="quantity" /><br/>
                <label>Selling Date:</label> <input type="text" name="date" id="date" /> <br/>
                <label>Selling Price</label> <input type="text" name="price" id="price" /><br/>
                <label>User Id</label> <input type="text" name="userid" id="userid" /><br/>
                <input type="submit" name="submit" id="submit" value="Add invoices" />
            </form>
        </div>
        
        <div id="product_nav">
            <li>
                <ul>  
                    <a class="page-links" href="UpdateInvoices.php"  >Update invoices</a>
                </ul>
            </li>
        </div>
    </body>
</html>

 <?php
        
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Values have been added."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in inserting values."; }
            
            }
            
            echo '<div>'
        ?>

<?php
    LayoutClass::includeFooter();
