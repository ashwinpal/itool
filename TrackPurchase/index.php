<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ImportProductModel.php';

    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeHomeNav();
        ?>

<?php 
    $list=$controllerObj->DisplayOrderList();
    if(isset($_POST['search']))
    {
        $modelAction=new ImportFunctionality();
         $result=$modelAction->DisplayOrderTrack($_POST['selectOrder']);
           
    }
    else
    {
      $modelAction=new ImportFunctionality();
      $result=$modelAction->DisplayTrack();
        
    }
  ?>
<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Track orders</h1>
        </div>
        <hr/>
        <form action="" method="post">
        <div id="product_nav">
            <label>Order Number</label>
            <select name="selectOrder" id="selectOrder" >
                   <option value="0">Select Order Number</option>
                   <?php foreach ($list as $orders) 
                     { 
                        echo "<option value=".$orders['order_number'].">".$orders['order_number']."</option>";
                     }
                   ?> 
               </select>
       
            <input type="submit" value="Search" id="search" name="search"/>
            <input type="submit" value="Show all Orders" name="show"/>
                   
            
        </div>
            
        </form>
        <br/>
        <br/>
          <div id="view_orders">
                <?php 
                   echo '<table border="1"> <th>Order Number</th><th>Product Name</th><th>Status</th><th>Received Date</th>';
                    foreach($result as $q)
                    {
                        if($q['quantity']==0)
                        {
                            $status="Delievered";
                        }
                        else
                        {
                            $status="In Process";
                        }
                        
                       echo '<tr>';
                       echo '<td>'. $q['order_number'].'</td><td>'.$q['product_name'].'</td><td>'.$status.'</td><td>'. $q['recieved_date'].'</td>';
                       echo '</tr>';   
                     }
                 
                                                      
                ?>
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();

