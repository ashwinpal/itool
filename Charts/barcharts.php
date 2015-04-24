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
    



            <div id="heading">
                <h2>Profit / Loss Chart</h2>
            </div>
<div id="tab">
    <?php
            $modelAction = new reportFunctionality();    

    $view =$modelAction->DisplayProductReport($_GET['selectId1']);

    foreach($view as $row)
     {

        echo "<div>Product 1 :<span id='p1'> " . $row['product_name'] . "</span></div><br/>";
        echo "<div>Value :<span id='d1'> " . $row['difference'] . "</span></div><br/>";
        
    }
    $view =$modelAction->DisplayProductReport($_GET['selectId2']);

    foreach($view as $row)
     {

        echo "<div>Product 2 : <span id='p2'>" . $row['product_name'] . "</span></div><br/>";
        echo "<div>Value : <span  id='d2'>" . $row['difference'] . "</span></div><br/>";
        
    }

?> 
    
                <div id="chart1" style="height:400px;width:300px; "></div>
</div>
            
            
       
 
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>-->

  <script src="../Application/js/jquery_ui/external/jquery/jquery.js"></script>
    <script src="../Application/js/jquery_ui/jquery-ui.min.js"></script>

    <!-- Custom jquery -->
    <script src='../Application/js/appJS.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Application/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../Application/js/src/jquery.jqplot.js"></script>
<script type="text/javascript" src="../Application/js/src/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../Application/js/src/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../Application/js/src/plugins/jqplot.pointLabels.js"></script>
<script type="text/javascript" src="../Application/js/src/jqplot.tableLegendRenderer.js"></script>

<script type="text/javascript" src="../Application/js/barcharts.js"></script>
</div>
</body>
</html>