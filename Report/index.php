<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ReportModel.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeHomeNav();
?>

<?php
         $modelAction=new reportFunctionality();
         $result=$modelAction->displayProd();

 
 ?>   

<html>
    <head>
    </head>
    <body>
        <div id="product_heading">
             <h1>Report Generation</h1>
        </div>
        <hr/><br/>
        
           <div id="">
               <form action="index.php" method="post">
               <label>Product Id</label> <br/><br/>
            
             
               
               <select name="selectId" id="selectId">
                   <option value="0">Select a Product Id</option>
                   <?php 
                  
            
                   foreach ($result as $rep) 
                     { 
                       if ($_POST['selectId']==$rep['product_id'])
                        {
                           
                            echo "<option selected value=".$rep['product_id'].">".$rep['product_id']."</option>";
                        }
                       else {
                        echo "<option value=".$rep['product_id'].">".$rep['product_id']."</option>";
                           
                       }
                     }
            
                   ?> 
               </select>
               
            &nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" id="submit" value="Generate Report"/>
            </form>
               
         <?php  if(isset($_POST['selectId']))
                     {
            var_dump($_POST['selectId']);
                     if($_POST['selectId'] === "0")
                                {
                                    echo 'Please select a Product Id from the list.';
                     }
                    else {
                        GeneralClass::redirect('GetReport.php?selectId='.$_POST['selectId'], false);
                       }
             
            }
             
             
             ?>
        
    
    </body>
</html>


<?php
    LayoutClass::includeFooter();
