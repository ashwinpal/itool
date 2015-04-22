<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';



    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>

 <?php
 $err="";
    if(onsubmitCheck('submit'))
        {
        if($_GET['qty']>=$_POST['rqty'])
        {
        $controllerObj->update($_POST['rqty'],$_GET['qty'],$_POST['received_date'],$_POST['expiry_date'],$_GET['id']);
        }
        else
           $err="Received quantity should not more than quantity ordered.<br/>";
        
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
        
          <div id="recieved_orders">
              
              <?php echo $err."</br>"; ?>
            <form action="" method="post">
                <label> Order Number: <?php echo $_GET['id']; ?></label><br/>
                <label> Received Quantity: </label><input type="text" id="rqty" name="rqty" value="<?php echo $_GET['qty'];?>"/><br/>
                <label>Received Date:</label><input name='received_date' type='date'   /><br/>
                <label>Expiry Date:</label><input name='expiry_date' type='date'  />
                <input type="submit" name="submit" id="submit" value="Ok" />  

               </form> 
        </div>
               <div> <a class="page_links" href="index.php">Back to home</a> </div>
    </body>
</html>


<?php LayoutClass::includeFooter();