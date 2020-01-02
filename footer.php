
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
<script src="assets/js/jquery.dataTables.js"></script>
    
    <!--end data tables -->
    <script type="text/javascript">

    anychart.onDocumentReady(function () {
/* monthly billing */
    $.ajax({
        type: 'POST',
        data:{
            token: sessionStorage.getItem('token'),
            type: 'month'
        },

        //url: 'http://10.128.187.11/web/web_portal_be/reports/accounts/month?token='+sessionStorage.getItem('token'),
        //dataType: 'json',
        url: 'monthlyBilling.php',
        success: function(data, index){    
               
            $('.overview-wrap').append(data);
            jsonData = {
                    // chart settings
                    "chart": {
                      // chart type
                      "type": "pie",
                      // chart data
                      "data": [
                            {"x": "Call and Usage", "value": $('#callandusageTxt').text(), fill: "green"},
                            {"x": "Chargers and Credit", "value": $('#chargersandcreditTxt').text(), fill: "orange"},
                            {"x": "Service and Equipment", "value": $('#serviceandequipmentTxt').text(), fill: "blue"}
                      ],
                      // chart container
                      "container": "pieChartContainer"
                    }
                  };
                  if(window.location.pathname=='/schepisi/dashboard.php'){
                   pieChart = anychart.fromJson(jsonData); 
                    pieChart.draw();
                    }
                    $('.anychart-credits').remove();
                
                $('#pieChartContainer').find('[fill=orange]').addClass('chargers');
                $('#pieChartContainer').find('[fill=green]').addClass('usage');
                $('#pieChartContainer').find('[fill=blue]').addClass('service');

                $('.usage').click(function(){
                   if($(this).hasClass('active')){
                        $(this).removeClass('active');
                        $('#pieChartData .usage').empty();
                    }
                    else{
                        $(this).addClass('active');
                        var classData = $(this).attr('class');
                        //$('#pieChartData > ul').append("<div>"+data+"</div>"); 
                        $.ajax({
                            type: 'POST',
                            data:{
                                token: sessionStorage.getItem('token'),
                                click: $(this).attr('class')
                            },

                            url: 'monthlyBilling.php',
                            success: function(data, textStatus ){
                                console.log(classData);
                                $('#pieChartData').append("<ul class='list-unstyled navbar__sub-list js-sub-list usage'>"+data+"</ul>");                     
                                
                            },
                            error: function(xhr, textStatus, errorThrown){
                               $('#submitOrganization').text('Submit');

                            }
                        }); 
                    }

                    
                });

                $('.chargers').click(function(){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active');
                        $('#pieChartData .chargers').empty();
                    }
                    else{
                        $(this).addClass('active');
                        var classData = $(this).attr('class');
                        //$('#pieChartData > ul').append("<div>"+data+"</div>"); 
                        $.ajax({
                            type: 'POST',
                            data:{
                                token: sessionStorage.getItem('token'),
                                click: $(this).attr('class')
                            },

                            url: 'monthlyBilling.php',
                            success: function(data, textStatus ){
                                console.log(classData);
                                $('#pieChartData').append("<ul class='list-unstyled navbar__sub-list js-sub-list chargers'>"+data+"</ul>");                    
                                
                            },
                            error: function(xhr, textStatus, errorThrown){
                               $('#submitOrganization').text('Submit');

                            }
                        }); 
                    }
                    
                });

                $('.service').click(function(){
                    if($(this).hasClass('active')){
                        $(this).removeClass('active');
                        $('#pieChartData .service').empty();
                    }
                    else{
                        $(this).addClass('active');
                        var classData = $(this).attr('class');
                        //$('#pieChartData > ul').append("<div>"+data+"</div>"); 
                        $.ajax({
                            type: 'POST',
                            data:{
                                token: sessionStorage.getItem('token'),
                                click: $(this).attr('class')
                            },

                            url: 'monthlyBilling.php',
                            success: function(data, textStatus ){
                                console.log(classData);
                                $('#pieChartData').append("<ul class='list-unstyled navbar__sub-list js-sub-list service'>"+data+"</ul>");                    
                                
                            },
                            error: function(xhr, textStatus, errorThrown){
                               $('#submitOrganization').text('Submit');

                            }
                        }); 
                    }
                });


        },
        error: function(xhr, textStatus, errorThrown){
           console.log(xhr);

        }
    });
/* end monthly billing */
    /* annual billing */
        $.ajax({
        type: 'GET',
        data:{
            token: sessionStorage.getItem('token'),
            type: 'year'
        },

        url: 'http://10.128.187.11/web/web_portal_be/reports/accounts/year?token='+sessionStorage.getItem('token'),
        //dataType: 'json',
        //url: 'annualBilling.php',
        success: function(data, index){            
            //$('.overview-wrap').append(data);
            // create data set on our data
            chartData = {
                header: ['#', 'Call and Usage', 'Chargers and Credit', 'Service and Equipment'],
                rows: data
            };

            // create column chart
            var chart = anychart.column();

            // set chart data
            chart.data(chartData);

            // turn on chart animation
            chart.animation(true);

            // force chart to stack values by Y scale.
            chart.yScale().stackMode('value');

            // chart padding
            chart.padding([10, 20, 5, 20]);

          
            chart.xAxis(1).stroke(null)
                    .orientation('top');
            chart.yAxis(0).labels().format('${%Value}');

            // zero marker line
            var zeroMarker = chart.lineMarker(0);
            zeroMarker.stroke('#ddd');
            zeroMarker.scale(chart.yScale());
            zeroMarker.value(0);

            // enable and tune grid
            chart.xGrid()
                    .stroke('#ddd')
                    .drawLastLine(false);

            // tune paddings
            chart.barsPadding(0.1)
                    .barGroupsPadding(0.9);

            // turn on legend and set settings
            chart.legend()
                    .enabled(true)
                    .fontSize(13)
                    .padding([0, 0, 20, 0]);

            chart.interactivity().hoverMode('by-x');
            chart.tooltip().displayMode('union');

            if(window.location.pathname == '/schepisi/dashboard.php'){
            // set container id for the chart
            chart.container('barChartContainer');
            chart.draw();

            }
            $('.anychart-credits').remove();
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(xhr);

        }
    });
    /* end annual billing */

/* cost centre reporting*/
     var d = new Date(),
        month = d.getMonth(),
        year = d.getFullYear();
        $.ajax({
                type: 'GET',
                data:{
                    token: sessionStorage.getItem('token')
                },

                //url: 'costCentreReport.php',
                url: 'http://10.128.187.11/web/web_portal_be/reports/cost_centres/get/3/'+year+'/3?token='+sessionStorage.getItem('token'),
                success: function(data, index){            
                    //$('.overview-wrap').append(data);
                   
                    // create line chart
                    var chart = anychart.line();

                    // set chart padding
                    chart.padding([10, 20, 5, 20]);

                    // turn on chart animation
                    chart.animation(true);

                    // turn on the crosshair
                    chart.crosshair(true);

                    // create logarithmic scale
                    var logScale = anychart.scales.log();
                    logScale.minimum(1)
                            .maximum(45000);

                    // set scale for the chart, this scale will be used in all scale dependent entries such axes, grids, etc
                    chart.yScale(logScale);

                    // create data set on our data,also we can pud data directly to series
                    var dataSet = anychart.data.set(
                        data.account_numbers
                        );

                    // map data for the first series,take value from first column of data set
                    var seriesData_1 = dataSet.mapAs({'x': 0, 'value': 1});

                    // map data for the second series,take value from second column of data set
                    var seriesData_2 = dataSet.mapAs({'x': 0, 'value': 2});

                    // map data for the third series, take x from the zero column and value from the third column of data set
                    var seriesData_3 = dataSet.mapAs({'x': 0, 'value': 3});

                    // temp variable to store series instance
                    var series;

                    // setup first series
                    series = chart.line(seriesData_1);
                    series.name('Call and Usage');
                    // enable series data labels
                    series.labels()
                            .enabled(true)
                            .anchor('left-bottom')
                            .padding(5);
                    // enable series markers
                    series.markers(true);

                    // setup second series
                    series = chart.line(seriesData_2);
                    series.name('Chargers and Credit');
                    // enable series data labels
                    series.labels()
                            .enabled(true)
                            .anchor('left-bottom')
                            .padding(5);
                    // enable series markers
                    series.markers(true);

                    // setup third series
                    series = chart.line(seriesData_3);
                    series.name('Service and Equipment');
                    // enable series data labels
                    series.labels()
                            .enabled(true)
                            .anchor('left-bottom')
                            .padding(5);
                    // enable series markers
                    series.markers(true);

                    // turn the legend on
                    chart.legend()
                            .enabled(true)
                            .fontSize(13)
                            .padding([0, 0, 20, 0]);

                    // set container for the chart and define padding
                    if(window.location.pathname == '/schepisi/cost.php'){
                        chart.container('lineGraphContainer');
                        chart.draw();
                    }
                    $('.anychart-credits').remove();
                },
                error: function(xhr, textStatus, errorThrown){
                   console.log(xhr);

                }
            });
/* end cost centre reporting */
});


    </script>

</body>

</html>
<!-- end document-->

