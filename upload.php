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
                                        <h2 class="title-1 m-b-25">Upload Files</h2>
                                        <div id="jsonOutput"></div>
                                        <div class="card-body">
                                            <div class="custom-tab">

                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                                         aria-selected="true" data-attr="occ_description">Chargers and Credit</a>
                                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile"
                                                         aria-selected="false" data-attr="call_usage_type">Call and Usage</a>
                                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact"
                                                         aria-selected="false" data-attr="charge_type_description">Service and Equipment</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content pl-3 pr-3 pt-2 pb-2 card" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                        <p>
                                                            <div class="row m-t-30">
                                                                <div class="col-md-12">
                                                                    
                                                                    <div class="col-md-12 table-data__tool table-data__tool-left">
                                                                        <select class="form-control col-md-3" id="paginator" name="paginator">
                                                                            <option id="10" value="10">Show 10 rows</option>
                                                                            <option id="20" value="20">Show 20 rows</option>
                                                                            <option id="50" value="50">Show 50 rows</option>
                                                                            <option id="100" value="100">Show 100 rows</option>
                                                                            <option id="0" value="0">Show all rows</option>
                                                                        </select>
                                                                        <select class="form-control col-md-3" id="drpdownOrg1" name="drpdownOrg">
                                                                            <option id="0" value="0">Select Organization</option>
                                                                        </select>
                                                                        <input type="file" class="btn btn-outline-primary btn-sm mb-3" accept=".csv" id="chargers_and_credit">
                                                                        <button id="uploadChargers" class="btn btn-primary btn-sm mb-3 ">Upload </button>
                                                                    </div>
                                                                    <!-- DATA TABLE-->
                                                                    <div class="table-responsive m-b-40">
                                                                        <table class="table table-borderless table-data3">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ACCOUNT NUMBER</th>
                                                                                    <th>BILL ISSUE DATE</th>
                                                                                    <th>BILL NUMBER</th>
                                                                                    <th>SERVICE NUMBER</th>
                                                                                    <th>OCC DESCRIPTION</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="chargers_and_credit-table">
                                                                               
                                                                            </tbody>
                                                                        </table>
                                                                        <div id="pagination"></div>    
                                                                        <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
                                                                    </div>
                                                                    <!-- END DATA TABLE-->
                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                        <p>
                                                            <div class="row m-t-30">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12 table-data__tool table-data__tool-left">
                                                                        <select class="form-control col-md-3" id="paginator1" name="paginator">
                                                                            <option id="10" value="10">Show 10 rows</option>
                                                                            <option id="20" value="20">Show 20 rows</option>
                                                                            <option id="50" value="50">Show 50 rows</option>
                                                                            <option id="100" value="100">Show 100 rows</option>
                                                                            <option id="0" value="0">Show all rows</option>
                                                                        </select>

                                                                        <select class="form-control col-md-3" id="drpdownOrg2" name="drpdownOrg">
                                                                            <option id="0" value="0">Select Organization</option>
                                                                        </select>
                                                                        <input type="file" class="btn btn-outline-primary btn-sm mb-3 col-md-3" accept=".csv" id="call_and_usage">
                                                                        <button id="uploadCall" class="btn btn-primary btn-sm mb-3">Upload</button>

                                                                       
                                                                    </div>
                                                                    <!-- DATA TABLE-->
                                                                    <div class="table-responsive m-b-40">
                                                                        <table class="table table-borderless table-data3">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ACCOUNT NUMBER</th>
                                                                                    <th>SERVICE NUMBER</th>
                                                                                    <th>CALLED NUMBER</th>
                                                                                    <th>CALL & USAGE TYPE</th>
                                                                                    <th>DURATION</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="call-and-usage-table">
                                                                               
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- END DATA TABLE-->
                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                        <p>
                                                            <div class="row m-t-30">
                                                                <div class="col-md-12">
                                                                    
                                                                    <div class="col-md-12 table-data__tool table-data__tool-left">
                                                                        <select class="form-control col-md-3" id="paginator2" name="paginator">
                                                                            <option id="10" value="10">Show 10 rows</option>
                                                                            <option id="20" value="20">Show 20 rows</option>
                                                                            <option id="50" value="50">Show 50 rows</option>
                                                                            <option id="100" value="100">Show 100 rows</option>
                                                                            <option id="0" value="0">Show all rows</option>
                                                                        </select>
                                                                        <select class="form-control col-md-3" id="drpdownOrg3" name="drpdownOrg">
                                                                            <option id="0" value="0">Select Organization</option>
                                                                        </select>
                                                                        <input type="file" class="btn btn-outline-primary btn-sm mb-3" accept=".csv" id="service_and_equipment">
                                                                        <button id="uploadService" class="btn btn-primary btn-sm mb-3">Upload</button>
                                                                    </div>
                                                                    <!-- DATA TABLE-->
                                                                    <div class="table-responsive m-b-40">
                                                                        <table class="table table-borderless table-data3">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ACCOUNT NUMBER</th>
                                                                                    <th>SERVICE NUMBER</th>
                                                                                    <th>SERVICE OWNER</th>
                                                                                    <th>CHARGE TYPE DESCRIPTION</th>
                                                                                    <th>SERVICE TYPE</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="service-and-equipment-table">
                                                                               
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- END DATA TABLE-->
                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>

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