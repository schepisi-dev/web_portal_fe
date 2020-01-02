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
                                        <span class="title-5 m-b-35">User Management</span>
                                      
                                    </div>
                                    <div class="table-data__tool-right  userButton">

                                        <button type="button" class="btn btn-secondary mb-1 au-btn-icon au-btn au-btn--green au-btn--small" data-toggle="modal" data-target="#userModal">
                                           <i class="zmdi zmdi-plus"></i>add a user
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    
                                    <div class="table-responsive table-data">
                                        
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>full name</td>
                                                    <td>email address</td>
                                                    <td>organization</td>
                                                    <td>username</td>
                                                    <td>user role</td>
                                                </tr>
                                            </thead>
                                            <tbody id="userData">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
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
                 <!-- modal static -->
                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                         data-backdrop="static">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticModalLabel">Input User Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <form action="" method="post" class="form-horizontal" id='userform'>
                                                <div id="userformdiv">
                                                    
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6">
                                                        <select class="form-control" id="drpdownRole">
                                                            <option value="0">Select User Role</option>
                                                            <option id='administrator' value="administrator">Admin</option>
                                                            <option id='standard' value="standard">Standard User</option>
                                                            <option id='basic' value="basic">Basic User</option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <select class="form-control" id="drpdownOrg" name="drpdownOrg">
                                                            <option id="0" value="0">Select Organization</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="First Name" class="form-control" id="firstname" name="firstname">
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="Last Name" class="form-control" id="lastname" name="lastname">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="Username" class="form-control"  id="username" name="username">
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="Email Address" class="form-control" id="email" name="email">
                                                    </div>
                                                </div>

                                                 <div class="row form-group">
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="Input Password" class="form-control" id="password" name="password">
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <input type="text" placeholder="Confirm Password" class="form-control" id="confirmpass" name="confirmpass">
                                                    </div>
                                                </div>
                                            </form>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" id="submitUser">
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
            </div>
            <!-- END MAIN CONTENT-->
<?php
include('footer.php');
?>