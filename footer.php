<!-- modal static -->
<div class="modal fade" id="accountsModal" tabindex="-1" role="dialog" aria-labelledby="accountsModalLabel" aria-hidden="true"
 data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Static Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    This is a static modal, backdrop click will not close it.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal static -->

<<<<<<< HEAD
<!-- modal static -->
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
     data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Upload Information</h5>
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
                                
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
                    <!-- end modal static -->

=======
>>>>>>> master
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
     <script type="text/javscript" src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
 
    <!-- Main JS-->
    <script type="text/javascript">
        
        $(document).ready(function(){

                $('#chargers_and_credit').change(function(){
                    $('#jsonOutput').text('');
                    UploadIt('chargers_and_credit');
                })
                $('#call_and_usage').change(function(){
                    $('#jsonOutput').text('');
                    UploadIt('call_and_usage');
                })
                $('#service_and_equipment').change(function(){
                    $('#jsonOutput').text('');
                    UploadIt('service_and_equipment');
                })
                organizationControls();
                onLoadData();
                uploadBtn();

        });
    </script>


<script src="js/main.js"></script>
<script src="assets/js/chkSession.js"></script>
<script src="assets/js/scripts.js"></script>

<script type="text/javascript" src="https://cdn.anychart.com/releases/8.7.0/js/anychart-base.min.js"></script>
<script type="text/javascript" src="https://cdn.anychart.com/releases/8.7.0/js/anychart-exports.min.js"></script>
<script type="text/javascript" src="https://cdn.anychart.com/releases/8.7.0/js/anychart-ui.min.js"></script>

    <!-- data tables scrips and styles -->
<script src="assets/js/jquery.min.js"></script>
<!-- DataTables -->
<!--<script src="assets/js/jquery.dataTables.js"></script>-->

<script type="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!--end data tables -->
<script type="text/javascript" src="assets/js/chart.js"></script>
</body>
</html>
<!-- end document-->

