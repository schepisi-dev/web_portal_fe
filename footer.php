
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

