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
                                <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <span class="title-5 m-b-35">Organizations</span>
                                      
                                    </div>
                                    <div class="table-data__tool-right orgButton">

                                        <button type="button" class="btn btn-secondary mb-1 au-btn-icon au-btn au-btn--green au-btn--small" data-toggle="modal" data-target="#staticModal">
                                           <i class="zmdi zmdi-plus"></i>create an organization
                                        </button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export as</option>
                                                <option value="">xls</option>
                                                <option value="">pdf</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>organization name</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="data-table">
        
                                            <tr class="spacer"></tr>                                            
                                            <tr class="spacer"></tr>                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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
            <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Add new organization</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                     
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="orgname" name="orgname" placeholder="Enter organization name..." class="form-control">
                                        </div>
                                    </div>
                                </form> 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="submitOrganization">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Clear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal static -->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<?php
include('footer.php');
?> 