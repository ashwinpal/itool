<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';



    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeHomeNav();
        ?>

 <?php
    if(onsubmitCheck('submit'))
        {
        
        $controllerObj->update($_POST['qty'],$_POST['received_date'],$_POST['expiry_date'],$_GET['id']);
       // $controllerObj->display();
    }

?>

<html>
    <head>
        
    </head>
    <body>
        <div id="product_heading">
             <h1>Add Received Orders</h1>
        </div>
        <hr/>
        
        
               <br/>
          <div id="recieved_orders">
            <form action="" method="post">
                <label> Order Number: <?php echo $_GET['id']; ?></label><br/>
                <label> Quantity: </label><input type="text" id="qty" name="qty" value="<?php echo $_GET['qty'];?>"/><br/>
                <label>Received Date:</label><input name='received_date' type='date' value=''  /><br/>
                <label>Expiry Date:</label><input name='expiry_date' type='date' value='' />
                <input type="submit" name="submit" id="submit" value="Ok" />  

               </form> 
        </div>
               <div> <a class="page_links" href="index.php">Back to home</a> </div>
    </body>
</html>


<?php LayoutClass::includeFooter();