<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminInvoicesController.php';
    LayoutClass::includeHeader();
    
    GeneralClass::checkUser($_SESSION['role']);
?>   

        <?php
            LayoutClass::includeHomeNav();
        ?>

<html>
    <head></head>
    <body>
        <div id="heading">
             <h1>Invoices & Bills</h1>
        </div>
        <hr/>  
        
     <?php
         if(onsubmitCheck('submit'))
           {
             
          if($_POST['name']==""|| $_POST['quantity']==""||$_POST['date']==""|| $_POST['price']==""|| $_POST['userid']=="")
        {
          echo "<strong>*All fields are required</strong>";
        }
    
        else{
            $controllerObject->formValues();
            $controllerObject->insert(); 
        } 
    }
    ?>
               
        <div id="tab">
            <h3>Add invoices information</h3>
            <!--Form for inserting values into invoices-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label>Product Id:</label>  <input class="form-control" type="text" name="name" id="name" /><br/>
                <label>Product Quantity:</label>  <input class="form-control" type="text" name="quantity" id="quantity" /><br/>
                <label>Selling Date:</label> <input class="form-control" type="text" name="date" /> <br/>
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


