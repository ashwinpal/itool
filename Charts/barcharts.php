<?php

ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/MessageModel.php';

LayoutClass::includeHeader();

?>
 
    <?php 
        LayoutClass::includeHomeNav();
    ?>
    
    <?php
        
        if(onsubmitCheck('submit'))
            // validation 1 , checking if submit is clicked
            {
            
            
            
        }
        
    ?>
        
    <div id="page-wrapper">

            <div class="container-fluid">

                    
                <div id="chart1" style="height:400px;width:600px; "></div>

            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
 
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