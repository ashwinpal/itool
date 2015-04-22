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
 
 if(onsubmitCheck('submit'))
           {
    
            $controllerObj->formValues();
            $controllerObj->insert(); 
            
            
           }

 ?>   

<html>
    <head>
        <script>
function showProd(str) {
    if (str == "") {
        document.getElementById("product_list").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("product_list").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getprod.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

    </head>
    <body>
        <div id="product_heading">
             <h1>Import Product</h1>
        </div>
        <hr/>
        
            <br/>
          <div id="">
            <form action="" method="post">
               <label>Category Id:</label> 
               
               <select name="selectCat" id="selectCat" onchange="showProd(this.value)" >
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
               <br/>
               <label>Product</label>
               <select name="product_list" id="product_list">
                   <option>Select Product</option>
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
