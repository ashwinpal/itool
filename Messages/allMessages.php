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
        
        if(isset($_GET['id']))
        {
          $objMsg = new MessageFunctionality();
          $result=$objMsg->DeleteMsg($_GET['id']);
          
          
          if($result > 0){
            
            echo'<div class="alert alert-success alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong >Success!!!</strong> Message Deleted.
                 </div>';
            
        }
        else {

            echo'<div class="alert alert-danger alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Sorry !!!</strong> Message was not deleted! 
                 </div>';
            
        }
          
          
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
                                   
                                echo '<span class="btn btn-primary"><i class="fa fa-fw fa-user"></i>'.$msg->getuserId().'</span>&nbsp;'.'<a class="btn btn-primary" href="../Messages/index.php?id='.$msg->getalertId().'">Subject : '.$msg->getalertDescription().'</a>&nbsp;&nbsp;<a class="btn btn-danger" href="allMessages.php?id='.$msg->getalertId().'"><i class="fa fa-trash-o"></i>&nbsp;Delete</a><br><br>';
                            }
                        }
                        else{
                            
                            echo'<div class="alert alert-danger alert-dismissible text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>You have no more messages !!!</strong> 
                                </div>';
                            
                        }
        ?>
   

            
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
<?php
    LayoutClass::includeFooter();