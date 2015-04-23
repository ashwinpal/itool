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


        <?php
        
            if(isset($_GET['id'])){
                
                $objMsg = new MessageFunctionality();
                
                echo "Message ".$objMsg->retrieveMsgContent($_GET['id']);
                
            }
        ?>
   

            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
<?php
    LayoutClass::includeFooter();