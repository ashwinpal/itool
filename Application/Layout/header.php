<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/NotificationModel.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/MessageModel.php';
?>

<html>
    <head>
            <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Management Tool</title>

     <!-- Bootstrap -->
        <link href="../Application/css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="../Application/css/style/style.css" rel="stylesheet">
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--  -->
    <link rel="stylesheet" href="../Application/js/jquery_ui/jquery-ui.min.css">
    
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
<?php

        if(isset($_POST["msgSubmit"])){
    
            $result = 0;

            $rec = explode(",", $_POST['receiver']);

            $objNotify = new NotificationFunctionality();
            
            
            if($rec[0]!="")
            {
            $result = $objNotify->checkRecepient($rec);

                if($result > 0){

                    $notifyModel = new Notification_SystemModel();

                    $notifyModel->setuserId($_SESSION["uid"]);
                    $notifyModel->setalertDescription($_POST['subject']);
                    $notifyModel->setalertContent($_POST['msgText']);

                    $result = $objNotify->sendMessage($notifyModel);
                    
                }
               else{
                   $result = -1;
               } 
        }
        else{
            $result = -1;
        }
        
        if($result > -1){
            
            $result = $objNotify->delieverMessage($rec, $result);
        }
        else{
            $result = -1;
        }
        
        
        if($result > -1){
            
            echo'<div class="alert alert-success alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong >Success!!!</strong> Message was sent.
                 </div>';
            
        }
        else {

            echo'<div class="alert alert-danger alert-dismissible text-center" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <strong>Sorry !!!</strong> Message was not sent, check you entry! 
                 </div>';
            
        }
        
    }


?>
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">I-Tool</a>
            </div>
            <form action="../SearchResult/Index.php" class="navbar-form navbar-left collapse navbar-collapse navbar-ex1-collapse" role="search">
                      <div class="form-group">
                          <input type="text" name="query" id="search_txt" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" id="btn_search" class="btn btn-default">Search</button>
                    </form>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-question-circle fa-lg"></i></a>
                </li>
                <li class="dropdown"><a href="" data-toggle="modal" data-target="#messageModal">
                        <i class="fa fa-pencil-square-o fa-lg"></i></a>
                </li>
                
                <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="messageSubject">New message</h4>
                    </div>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  
                    <div class="modal-body">
                      
                        <div class="form-group">
                          <label for="recipient-name" class="control-label">Recipient:</label>
                          <input type="text" name="receiver" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                          <label for="recipient-subject" class="control-label">Subject:</label>
                          <input type="text" name="subject" class="form-control" id="recipient-subject">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="control-label">Message:</label>
                          <textarea class="form-control" name="msgText" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="msgSubmit" class="btn btn-primary">Send message</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        
                        <?php
                        
                        $objMsg = new MessageFunctionality();
                        
                        $msgArr = $objMsg->retrieve5Msg($_SESSION['uid']);
                        
                        //var_dump($msgArr);
                        
                        if($msgArr != NULL){
                            
                               foreach($msgArr as $msg){
                                
                                   //var_dump($msg);    
                                   
                                echo '<li><a href="../Messages/index.php?id='.$msg->getalertId().'">'.$msg->getalertDescription().'</a></li>';
                            }
                        }
                        else{
                            
                            echo '<li>No Messages !!!</li>';
                            
                        }
                        ?>
                        
                        <li>
                            <a href="#">Message.....</a>
                        </li>
                        <li>
                            <a href="#">Message....</a>
                        </li>
                        <li>
                            <a href="#">Message....</a>
                        </li>
                        <li>
                            <a href="#">Message....</a>
                        </li>
                        <li>
                            <a href="#">Message....</a>
                        </li>
                        <li>
                            <a href="#">Message....</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['uid']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            

