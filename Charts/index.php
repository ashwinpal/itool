<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';
LayoutClass::includeHeader();

?>
 
    <?php 
    
    
        if($_SESSION['role']==2||$_SESSION['role']=="2")
        {LayoutClass::includeAdminNav();}
        elseif($_SESSION['role']==1||$_SESSION['role']=="1")
            {
        LayoutClass::includeHomeNav();
        }
    ?>
    
<?php

        $modelAction = new reportFunctionality();
        
        
        $result=$modelAction->displayProd();
        
        
  ?>

<h1>Compare Products</h1>

<div id="page-wrapper">

            <div class="container-fluid">

<form action="" method="get">
<span>Product 1</span>
 <select class="form-control" name="selectId1" id="selectId1">
                   <option value="0">Select a Product Name</option>
                   <?php 
                  
            
                   foreach ($result as $rep) 
                     {            
                       if ($_GET['selectId1']==$rep['product_id'])
                        {
                           
                            echo "<option selected value=".$rep['product_id'].">".$rep['product_name']."</option>";
                        }
                       else {
                        echo "<option value=".$rep['product_id'].">".$rep['product_name']."</option>";
                           
                       }
                     }
            
                   ?> 
               </select>

<br><br><span>Product 2</span>
<select name="selectId2" class="form-control" id="selectId2">
                   <option value="0">Select a Product Name</option>
                   <?php 
                  
                   $result=$modelAction->displayProd();
                   
                   foreach ($result as $rep) 
                     {            
                       if ($_GET['selectId2']==$rep['product_id'])
                        {
                           
                            echo "<option selected value=".$rep['product_id'].">".$rep['product_name']."</option>";
                        }
                       else {
                        echo "<option value=".$rep['product_id'].">".$rep['product_name']."</option>";
                           
                       }
                     }
            
                   ?> 
               </select>
<br>
<br>

<button class="btn btn-primary" type="submit" name="charts">Bar Chart</button>

                </form>


        
    



            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
<?php


if(isset($_GET['charts']))
                     {
          
                     if($_GET['selectId1'] === "0"||$_GET['selectId2'] === "0")
                                {
                                    echo 'Please select a Product Name from the list.';
                     }
                    else {
                        GeneralClass::redirect('barcharts.php?selectId1='.$_GET['selectId1'].'&selectId2='.$_GET['selectId2'], false);
                       }
             
            }



    LayoutClass::includeFooter();