<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
            <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>I-Tool Master Page</title>

     <!-- Bootstrap -->
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/style/master.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">I-Tool</a>
            </div>
            <form class="navbar-form navbar-left collapse navbar-collapse navbar-ex1-collapse" role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Search</button>
                    </form>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-question-circle fa-lg"></i></a>
                </li>
                <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-pencil-square-o fa-lg"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
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
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php" ><i class="fa fa-home fa-lg"></i> Home</a></li>
                    <li><a href="productlist.php"><i class="fa fa-home fa-lg"></i> Product List</a></li>  
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Purchase List</a></li>   
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Track Purchase</a></li>  
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Invoices And Bills</a></li> 
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Stock List</a></li>
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Reports</a></li>
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Charts</a></li>
                    <li><a href="#"><i class="fa fa-home fa-lg"></i> Rate a Product</a></li>                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-home"></i> Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">		
                        <div class="flip4d">
                        <div class="back"></div>
                        <div class="front"><i class="fa fa-bar-chart"></i>
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

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>
