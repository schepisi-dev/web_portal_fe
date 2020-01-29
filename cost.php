<?php
include('header.php');
include('sidebar.php');
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <span class="title-5 m-b-35"> Cost Centre</span>
                                      
                                    </div>
                                    <div class="table-data__tool-right  userButton">

                                        <button type="button" class="btn btn-secondary mb-1 au-btn-icon au-btn au-btn--green au-btn--small" data-toggle="modal" data-target="#userModal">
                                           <i class="zmdi zmdi-plus"></i>add a cost centre
                                        </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                
                                

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12 au-card">
                                    <ul id="cost-centre-data" class="navbar-mobile__list list-unstyled table-data__info"></ul>
                                </div>
                            </div>
                                
                                <div class="col-lg-10 au-card"> 
                                    <div id="lineGraphContainer"></div>
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
<?php
include('footer.php');
?>