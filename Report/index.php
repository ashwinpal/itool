<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReportController.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeHomeNav();
?>

<html>
    <head>
    </head>
    <body>
        <div id="product_heading">
             <h1>Report Generation</h1>
        </div>
        <hr/>
        
        <div id="">
        <form>
              <select name="users" onchange="showList(this.value)">
                  <option value="">Select a Product Id:</option>
                  <option value="1">PID000</option>
                  <option value="2">PID001</option>
                  <option value="3">PID002</option>
                  <option value="4">PID004</option>
                  <option value="3">PID005</option>
                  <option value="4">PID006</option>
              </select>
            </form>
            <br>
            <div id="pId"><b>Product information will be listed here...</b></div><br/>
       </div>
    </body>
</html>


<?php
    LayoutClass::includeFooter();
