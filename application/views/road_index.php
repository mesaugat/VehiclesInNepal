<script type="text/javascript">
    $(document).ready(function(){
        $.getJSON('<?= base_url() ?>public/json/road_growth.json', function(json){
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'road-area',
                    type: 'area'
                },
                title: {
                    text: 'Road Growth by Year'
                },
                subtitle: {
                    text: 'Source: Department of Road, Nepal'
                },
                xAxis: {
                    categories: ['1985', '1990', '1994', '1998', '2002', '2004', '2006', '2009'],
                    tickmarkPlacement: 'on',
                    title: {
                        text: 'Year'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Kilometer (km)'
                    },
                    labels: {
                        formatter: function() {
                             return this.value;
                        }
                    }
                },
                tooltip: {
                    shared: true,
                    valueSuffix: ' km'
                },
                plotOptions: {
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    }
                },
                    series: json
            });     // end of chart
        
        });     // end of $.getJSON

        // Map GeoJson
        var map = L.map('map', {
            minZoom: 7,
            maxZoom: 7,
            zoomControl: false,
            dragging: false
        }).setView([28.35, 84.94], 7);

        L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
            key: 'c9d322df6bdc4f088f0affd664e76506',
            attribution: 'VIN',
            styleId: 22677
        }).addTo(map);


        // L.geoJson(nepalData).addTo(map);

        //colorbrewer2.org
        function getColor(road) {
            return  road > 750 ? '#252525': 
                    road > 500 ? '#525252':
                    road > 250 ? '#737373':
                    road > 100  ? '#969696':
                    road > 50  ? '#BDBDBD':
                    road > 10  ? '#D9D9D9':
                                 '#F0F0F0';
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.ROAD_LENGTH),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 1
            };
        }

        function highlightFeature(district) {
            var layer = district.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 1
            });

            if (!L.Browser.opera) {
                layer.bringToFront();
            }
            info.update(layer.feature.properties);
        }

        function resetHighlight(district) {
            geojson.resetStyle(district.target);
            info.update();
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight
            })
        }

        var info = L.control();

        info.onAdd = function (map) {
            // create a div with a class "info"
            this._div = L.DomUtil.create('div', 'info'); 
            this.update();
            return this._div;
        };

        // method that we will use to update the control based on feature properties passed
        info.update = function (props) {
            this._div.innerHTML = '<h5>Road Coverage - NEPAL - 2004 A.D.</h5>' +  (props ?
                '<p><b>' + props.DISTRICT + '</b></p>' + '<p>' + props.ROAD_LENGTH + ' km </p>' 
                : '<p>' + 'Hover over a district' + '</p>');
        };
        
        info.addTo(map);

        var legend = L.control({position: 'bottomright'});

        var legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10, 50, 100, 250, 500, 750],
                labels = [];

            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<p><i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + ' km <br />' : '+ km</p>');
            }
            return div;
        };

        legend.addTo(map);

        //Load geoJSON
        var geojson = L.geoJson(nepalDistrictRoadData, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

    });     // end of document ready
 
</script>

<div id="content">
    <script type="text/javascript" src="<?= base_url() ?>assets/js/nepal-district-road-data.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/nepal-region-road-data.js"></script>
    <script src="<?= base_url() ?>assets/js/leaflet.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet.css" />
    <!--
        <script src="http://cdn.leafletjs.com/leaflet-0.6.3/leaflet.js"></script>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.3/leaflet.css" />
    -->
    <!-- PAGE WRAPPER -->
    <div id="page-wrapper">
        <h3>Road Statistics</h3><br />
        <p id="road" class="text">
           The road length in Nepal is increasing yearly. New roads are being constructed and some old roads are also being upgraded. As of 2004 there are 7 districts which are not connected by road networks as per valid data available. Bhojpur, Solukhumbu and Khotang district of Eastern Development Region, Manang and Mustang of Western Development Region and Dolpa, Humla and Mugu district of Mid-Western Development Region are not linked with road network. From 1985 to 2009 total road length has increased by 14,339 km. The significant increase in road network can be seen in the period from 1994 (9534 km) to 2002 (16834 km) with an average of 912 km increase per year.<br /><br />
           Scroll down to see the road coverage of Nepal till 2004 A.D.
        </p>
        <div id="road-area"></div><br style="clear: both"/><hr />
        <h3>Road Coverage as of 2004 A.D.</h3>
        <div id="map"></div>
    <!-- END OF PAGE WRAPPER -->
    </div>
<!-- END OF CONTENT -->
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/exporting.js"></script>  