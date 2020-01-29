     

function monthlyBilling(month)
{
      $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            url: localStorage.getItem('url')
        },

        //url: 'http://10.128.187.11/web/web_portal_be/reports/accounts/month?token='+localStorage.getItem('token'),
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
                  if(window.location.pathname=='/web_portal_fe/dashboard.php'){
                   pieChart = anychart.fromJson(jsonData); 
                    pieChart.draw();
                    }
                    $('.anychart-credits').remove();
                
                $('#pieChartContainer').find('[fill=orange]').addClass('chargers');
                $('#pieChartContainer').find('[fill=green]').addClass('usage');
                $('#pieChartContainer').find('[fill=blue]').addClass('service');



        },
        error: function(xhr, textStatus, errorThrown){
           console.log(xhr);

        }
    });
}

    anychart.onDocumentReady(function () {
    var d = new Date();
    var n = d.getMonth()+1;
    var yearVar = new Date();
    var year = yearVar.getFullYear();
/* monthly billing */
    monthlyBilling(n);
    $('.monthOverview').change(function(){
        monthlyBilling($(this).val());
    })
/* end monthly billing */
    /* annual billing */
        $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url')+'/reports/accounts/year/'+year+ '?token='+localStorage.getItem('token'),
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

            if(window.location.pathname == '/web_portal_fe/dashboard.php'){
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
                    token: localStorage.getItem('token')
                },

                //url: 'costCentreReport.php',
                url: localStorage.getItem('url')+'/reports/cost_centres/get/3/'+year+'/3?token='+localStorage.getItem('token'),
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
                    if(window.location.pathname == '/web_portal_fe/cost.php'){
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