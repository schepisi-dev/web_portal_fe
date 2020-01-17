<?php
include('header.php');
include('sidebar.php');
?> 
   <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Tabular Content -->
                                        <h2 class="title-1 m-b-25">File Upload History</h2>
                                        <div id="jsonOutput"></div>
                                         <div class="row">
                                            <div class="col-lg-12">
                                                <!-- USER DATA-->
                                                <div class="col-lg-12">
                                                    <div class="au-card m-b-30">
                                                        <div class="au-card-inner">
                                                            <div class="table-responsive m-b-40 tableFixHead organizationTable">
                                                                <table id="display"  class="display historyTable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>UPLOAD ID</th>
                                                                        <th>TYPE</th>
                                                                        <th>UPLOADED BY</th>
                                                                        <th>UPLOADED DATE</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="file_upload_history">
                                                                                   
                                                                    </tbody>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th>UPLOAD ID</th>
                                                                        <th>TYPE</th>
                                                                        <th>UPLOADED BY</th>
                                                                        <th>UPLOADED DATE</th>
                                                                    </tr>
                                                                    </tfoot>
                                                              </table>

                                                            </div>
                                                            <!--<div class="organizationInfo">Hello World</div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END USER DATA-->
                                            </div>

                                        </div>


                                <!-- End Tabular Content -->
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