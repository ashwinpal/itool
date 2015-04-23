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

                <h1>Messages</h1><br><br>
        <?php
        
            $objMsg = new MessageFunctionality();
                        
                        $msgArr = $objMsg->retrieveAllMessages($_SESSION['uid']);
                        
                        //var_dump($msgArr);
                        
                        if($msgArr != NULL){
                            
                               foreach($msgArr as $msg){
                                
                                   //var_dump($msg);    
                                   
                                echo '<a href="../Messages/index.php?id='.$msg->getalertId().'">'.$msg->getalertDescription().'</a><br><br>';
                            }
                        }
                        else{
                            
                            echo 'No Messages !!!';
                            
                        }
        ?>
   

            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
<?php
    LayoutClass::includeFooter();