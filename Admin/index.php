
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
                        <div class="front"><i class="fa fa-list-ol fa-5x"></i>
                        </div>
                        
                        </div><!--flip4d-->
                        <div class="box_title">Product List</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-tags fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                         <div class="box_title">Category List</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-shopping-cart fa-5x" ></i>
                        </div>
                        </div><!--flip4d-->
                        <div class="box_title">Purchase List</div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-backward fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                          <div class="box_title">Track Purchase</div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-money fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                    <div class="box_title">Invoices And Bills</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-star fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                        <div class="box_title">Rate A Product</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-list-alt fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                        <div class="box_title">Reports</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-line-chart fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                <div class="box_title">Stock List</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="flip4d">
                        <div class="back">Box 1 - Back</div>
                        <div class="front"><i class="fa fa-bar-chart fa-5x"></i>
                        </div>
                        </div><!--flip4d-->
                        <div class="box_title">Charts</div>
                    </div>
 
                </div> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    
<?php
    //include_once '../Application/Layout/footer.php';
    LayoutClass::includeFooter();

