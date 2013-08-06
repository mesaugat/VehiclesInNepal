<script type="text/javascript">
    $(document).ready(function(){
        // Road Accident Trends
        $.getJSON('<?= base_url() ?>public/json/road_accidents_trends.json', function(json){
            var column_chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'accident-column',
                    type: 'column'
                },
                title: {
                    text: 'Road Accident Trends in Nepal'
                },
                subtitle: {
                    text: 'Source: UN Economic and Social Commission for Asia and the Pacific (UNESCAP)'
                },
                xAxis: {
                    title: {
                        text: 'Year'
                    },
                    categories: ['2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Injuries'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });

        // Road Accident and User Group
        $.getJSON('<?= base_url() ?>public/json/road_accidents_user_group.json', function(json){
            var stack_chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'accident-stack',
                    type: 'bar'
                },
                title: {
                    text: 'Road Accidents and User Group - 2010/11 A.D.'
                },
                subtitle: {
                    text: 'Source: UN Economic and Social Commission for Asia and the Pacific (UNESCAP)'
                },
                xAxis: {
                    categories: ['Minor Injuries', 'Serious Injuries', 'Fatal Injuries']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of Casualties'
                    }
                },
                legend: {
                    backgroundColor: '#FFFFFF',
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                    series: json
            });
        }); 

    });     // end of document ready
</script>

<div id="content">
    <!-- PAGE WRAPPER -->
    <div id="page-wrapper">
    <!-- END OF PAGE WRAPPER -->
        <h3>Accident Statistics</h3><br />
        <p id="accident" class="text">
            The number of accidents is increasing with increase in number of registered vehicles. As of 2010/11 the total number of minor injuries is 861, serious injuries is 241 and fatalities is 81 making a total of 1183. According to statistics, pedestrians are the number one casualty in road accidents. Motorcyle follows up in second position.  While looking at the number of injuries and fatalities the pedesterian number is the highest. The main cause behind this result is lack of proper safety rules and well managed roads. Most of roads in Nepal except some urban roads lack footpath for pedestrian, disabled and older people. The road length is still not sufficient especially in districts where road density is high.<br /><br />

            For more information please take a look at the visualizations.
        </p>
        <div id="accident-column"></div>
        <br style="clear:both" /><hr />
        <div id="accident-stack"></div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/exporting.js"></script>