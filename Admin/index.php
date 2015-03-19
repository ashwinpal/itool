
<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminController.php';

LayoutClass::includeHeader();

?>
 
        <?php 
        LayoutClass::includeAdminNav();
        ?>
        
   <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Admin
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back"></div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        
                        </div><!--flip4d-->
                        <div class="box_title">Product List</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><img src="image/Users.gif" alt="box1" />
                        </div>
                        </div><!--flip4d-->

                    </div>
 
                </div>
 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    
<?php
    //include_once '../Application/Layout/footer.php';
    LayoutClass::includeFooter();

