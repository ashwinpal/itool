<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ReportModel.php';

    LayoutClass::includeHeader();
    
    GeneralClass::checkUser($_SESSION['role']);
?>  

<?php
   LayoutClass::includeHomeNav();
?>

<?php
         $modelAction=new reportFunctionality();
         $result=$modelAction->displayProd();

 
 ?>   

        <div id="heading">
             <h1>Report Generation</h1>
        </div>
        <hr/><br/>
        
           <div id="tab">
               <form action="index.php" method="post">
               <label>Product Name</label> <br/><br/>
            
               <select class="form-control" name="selectId" id="selectId">
                   <option value="0">Select a Product Name</option>
                   <?php 
                  
            
                   foreach ($result as $rep) 
                     {            
                       if ($_POST['selectId']==$rep['product_id'])
                        {
                           
                            echo "<option selected value=".$rep['product_id'].">".$rep['product_name']."</option>";
                        }
                       else {
                        echo "<option value=".$rep['product_id'].">".$rep['product_name']."</option>";
                           
                       }
                     }
            
                   ?> 
               </select>             
            <br/>
            <input class="buttonstyle" type="submit" name="submit" id="submit" value="Generate Report"/>
            </form>
              
         <?php  if(isset($_POST['selectId']))
                     {
          
                     if($_POST['selectId'] === "0")
                                {
                                    echo '<label style="color:red;"><strong>Please select a Product Name from the list.</strong></label>';
                     }
                    else {
                        GeneralClass::redirect('GetReport.php?selectId='.$_POST['selectId'], false);
                       }
             
            }
             
           
             ?>
               
 </div> 


<?php
    LayoutClass::includeFooter();
