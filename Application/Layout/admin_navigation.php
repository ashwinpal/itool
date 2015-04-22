            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="../Admin" ><i class="fa fa-home fa-lg"></i> Admin</a></li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Accounts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"><i class="fa fa-home fa-lg"></i> Roles</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-home fa-lg"></i> User Accounts</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-home fa-lg"></i> Admin Accounts</a>
                            </li>
                        </ul>
                    </li>  
                    <li><a href="<?php echo '../AdminCategory';?>"><i class="fa fa-home fa-lg"></i> Category List</a></li>   
                    <li><a href="<?php echo '../AdminProduct';?>"><i class="fa fa-home fa-lg"></i> Product List</a></li>   
                    <li><a href="<?php echo '../AdminImport';?>"><i class="fa fa-home fa-lg"></i> Purchase List</a></li>   
                    <li><a href="<?php echo '../Application/Controller/AdminSearchController.php?action=Index';?>"><i class="fa fa-home fa-lg"></i> Track Purchase</a></li>  
                    <li><a href="<?php echo '../invoicesAdmin';?>"><i class="fa fa-home fa-lg"></i> Invoices And Bills</a></li> 
                    <li><a href="<?php echo '../Application/Controller/AdminSearchController.php?action=Index';?>"><i class="fa fa-home fa-lg"></i> Stock List</a></li>
                    <li><a href="<?php echo '../AdminReport';?>"><i class="fa fa-home fa-lg"></i> Reports</a></li>
                    <li><a href="<?php echo '../Charts';?>"><i class="fa fa-home fa-lg"></i> Charts</a></li>
                    <li><a href="<?php echo '../rating';?>"><i class="fa fa-home fa-lg"></i> Rate a Product</a></li>
                    <li><a href="<?php echo '../AdminFaq';?>"><i class="fa fa-home fa-lg"></i> FAQ'S</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>