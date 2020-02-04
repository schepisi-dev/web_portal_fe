<?php
include('header.php');
include('sidebar.php');
?>  

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <div class="title-2 m-b-40">
                                          <div class="col-lg-12">
                                            <div class="col-lg-12">Billing Overview</div>
                                               <div id="pieChartContainer" class="card-body">
                                                <p class="typo-articles">Choose month
                                                    <select name="month" class="monthOverview">
                                                       <?php 
                                                       for ($m=1; $m<=12; $m++) {
                                                         $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                                         $month_number = date("n",strtotime($month));
                                                         echo '<option value="'.$month_number.'">'.$month.'</option>';
                                                         }
                                                       ?>
                                                    </select>
                                                </p>
                                               </div>
                                               <div id="pieChartData">
                                               </div>
                                          </div>                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <div class="title-2 m-b-40">
                                           <div class="col-lg-12">
                                            <div class="col-lg-12"><?php echo date('Y'); ?> Billing Overview</div>
                                               <div id="barChartContainer"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25" id='overview'>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="orgCount"></h2>
                                                <a href="organization.php"><span>Total number of organizations</span></a>

                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="userCount"></h2>
                                                <a href="users.php"><span>Total number of users</span></a>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                       <h2 class="title-1 m-b-25">Monthly Report</h2>
                                        <div class="table-responsive m-b-40 tableFixHead">

                                          <table id="display" class="display allTransactionTable">
                                            <thead>
                                            <tr>
                                                <th>TRANSACTION TYPE</th>
                                                <th>ACCOUNT NUMBER</th>
                                                <th>SERVICE NUMBER</th>
                                                <th>DATE SYNCED</th>
                                            </tr>
                                            </thead>
                                            <tbody id="allTransaction">
                                                           
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>TRANSACTION TYPE</th>
                                                <th>ACCOUNT NUMBER</th>
                                                <th>SERVICE NUMBER</th>
                                                <th>DATE SYNCED</th>
                                            </tr>
                                            </tfoot>
                                          </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Schepisi Communications. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<?php
include('footer.php');
?>