<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminImportController.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/AddCategoryModel.php';
    LayoutClass::includeHeader();
?>

        <?php
            LayoutClass::includeAdminNav();
        ?>



<?php
$modelAction=new CategoryFunctionality();
 $result=$modelAction->DisplayCat();
 ?>   
<?php
if (isset($_POST['generate']))
{
       $cat_num=$_POST['selectCat'];
    $modelActionImport=new ImportFunctionality();
    $result_prod=$modelActionImport->DisplayProd($cat_num);
   
   //var_dump($result_prod);
    //echo $product_list;
    
}
if(onsubmitCheck('submit'))
           {
    //var_dump($controllerObj->formValues());
            $controllerObj->formValues();
            $controllerObj->insert(); 
            
            
           }
 
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Import Product</h1>
        </div>
        <hr/>
        
            <br/>
          <div id="view_orders">
            <form action="" method="post">
               <label>Category Id:</label> 
               
               <select name="selectCat" id="selectCat" >
                   <option value="0">Select Category</option>
                   <?php foreach ($result as $cat) 
                     { 
                       if ($_POST['selectCat']==$cat['category_id'])
                        {
                           
                            echo "<option selected value=".$cat['category_id'].">".$cat['category_name']."</option>";
                        }
                       else {
                        echo "<option value=".$cat['category_id'].">".$cat['category_name']."</option>";
                           
                       }
                     }
                   ?> 
               </select>
               <input type="submit" name="generate" value="Generate Product List" id="generate"/>
               <br/>
            </form>
              <form>
              <div id="showcontent">             
               <label> Product: </label>
               <select name="product" id="product">
                    <?php 
                    
                    $flag=0;
                    
                    if(!empty($result_prod))
                    {
                     
                    foreach ($result_prod as $prod) 
                     { 
                       echo "<option value=".$prod['product_id'].">".$prod['product_name']."</option>";
                     
                       $flag=1;
                     }
                     //echo "<option value='-1'>No product available</option>";
                    }
                    
                    if($flag==0)
                    {
                        echo "<option value='-1'>No product available</option>";
                    }
                   ?> 
                
               </select>
               <br/>
                <label> Quantity: </label><input type="text" id="qty" name="qty"/><br/>
                <input type="submit" name="submit" id="submit" value="Add Category" />
              </div>
                      
            </form> 
              
        </div>
        
    </body>
</html>


<?php
    LayoutClass::includeFooter();
