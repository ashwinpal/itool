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
            $controllerObject->formValues();
            $controllerObject->insert();
             
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
            <h3>Add invoices information</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label>Product Id:</label>  <input class="form-control" type="text" name="name" id="name" /><br/>
                <label>Product Quantity:</label>  <input class="form-control" type="text" name="quantity" id="quantity" /><br/>
                <label>Selling Date:</label> <input class="form-control" type="text" name="date" id="date" /> <br/>
                <label>Selling Price</label> <input class="form-control" type="text" name="price" id="price" /><br/>
                <label>User Id</label> <input class="form-control" type="text" name="userid" id="userid" /><br/>
                <input class="buttonstyle" type="submit" name="submit" id="submit" value="submit" />
            </form>
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
            

        ?>

<?php
    LayoutClass::includeFooter();


