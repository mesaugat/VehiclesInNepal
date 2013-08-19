<script type="text/javascript">
	$(document).ready(function(){
        $('#year').change(function(){
            var selYear = $(this).val();
            if (selYear != '') {
                $.ajax({
                    url: "resources/dynamic_json",       
                    async: false,
                    type: "POST",                   
                    data: "year="+selYear,        
                    dataType: "json",               
                    success: function(json) {
                        // Vehicle Numbers yearly
                        var column_chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'vehicle-output', 
                                type: 'column'
                            },
                            title: {
                                text: 'Number of Vehicles Registered in ' + selYear + ' A.D.'
                            },
                            subtitle: {
                                text: 'Source: Department of Transport Management, Nepal'
                            },
                            xAxis: {
                                categories: ['Bus', 'Mini Bus', 'Crane', 'Car', 'Pick Up', 'Micro', 'Tempo', 'Motorcycle', 'Tractor', 'Others']
                            },
                            yAxis: {
                                type: 'logarithmic',
                                title: {
                                    text: 'Number of Vehicles'
                                }
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.1,
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [{
                                name: 'Vehicles',
                                data: json
                            }]
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })  // end of $.ajax
            }
        });     // end of change function
        
        $.getJSON('<?= base_url() ?>public/json/vehicle_numbers_total_pie.json', function(json){
            var pie_chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'vehicle-output',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Total Vehicle Numbers as of 2011(Q3)'
                },
                subtitle: {
                    text: 'Source: Department of Transport Management, Nepal'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total Vehicles',
                    data: json
                }]
            });
        });

        // Vehicles Number Increase line chart
        $.getJSON('<?= base_url() ?>public/json/vehicle_numbers_total.json', function(json){
            var line_chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'vehicle-line-chart',
                    type: 'line'
                },
                title: {
                    text: 'Vehicles Growth Each Year'
                },
                subtitle: {
                    text: 'Source: Department of Transport Management, Nepal'
                },
                xAxis: {
                    title: {
                        text: 'Year'
                    },
                    categories: ['1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011']
                },
                yAxis: {
                    title: {
                        text: 'Number of Vehicles'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    shared: true
                },
                series: json
            });
        });

        // Vehicle Numbers from 1989 to 2011
        $.getJSON('<?= base_url() ?>public/json/vehicle_numbers.json', function(json){
            var bar_chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'vehicle-bar',
                    type: 'bar'
                },
                title: {
                    text: 'Vehicles Registered From 1989 A.D. to 2011 A.D.'
                },
                subtitle: {
                    text: 'Source: Department of Transport Management, Nepal'
                },
                xAxis: {
                    title: {
                        text: 'Year'
                    },
                    categories: ['1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of Vehicles'
                    }
                },
                legend: {
                    backgroundColor: '#FFFFFF',
                    reversed: false
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                    series: json
            });
        });    // end of vehicle numbers
	});    // end of document ready
</script>

<!-- CONTENT -->
<div id="content">
	<!-- PAGE WRAPPER -->
	<div id="page-wrapper">
		<h3>Vehicle Statistics</h3><br />
		<p id="vehicle-year">
            <b>Navigate here:</b>
			<?php  
                $null = array('' => 'Select a year');
                $year = $null + $year;
                echo form_dropdown('year', $year, '', 'id="year"');
			?>
		</p>
        <p id="vehicle" class="text">
            As of 2009 there were 1,015,271 registered vehicles. At present, more than 1,280,000 motorized vehicles are registered in the country, a rapid 21% rise compared to 2009 with highest share of motorcycles(76%). Light vehicles (Cars/ Jeep/ Van/ Pick up) share the second highest with 11% whereas; the public utility vehicles mainly Bus, Mini Bus and Micro Bus share only 3%. The goods transport vehicles consist of 5% of the total vehicle population. Besides the motorized vehicles there are also considerable numbers of non-motorized vehicles plying in the roads such as Cycle, Tricycle (Riksaw), Oxen carts etc. There is no specific record for numbers of non-motorized vehicles.<br /><br />
            Navigate through the dropdown on the top right to see number of vehicles registered each year from 1989 to the third quarter(Q3) of 2011. Scroll down for more statistics.
        </p>
		<div id="vehicle-output"></div>
        <br style="clear: both"/><hr />
        <div id="vehicle-bar"></div>
        <hr />
        <div id="vehicle-line-chart"></div>

	<!-- END OF PAGE WRAPPER -->
	</div>
<!-- END OF CONTENT -->
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/exporting.js"></script>