<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.32.1/mapbox-gl.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.32.1/mapbox-gl.css' rel='stylesheet' />

    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<div id='map'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiY3luYzQ4IiwiYSI6IjExOTU2MDk4ZTRkMzIwOWU4MGNmODI4MDU2MWJjZTMwIn0.jYa0_F7xX9NqSNIik_DEoA';


var Titik = new Array();
var tampung_titik;

$.get( "http://localhost/clearroute/public/getroute/112.76069140/-7.27064930/112.7977632/-7.280136", function( data ) {
        // $tampung_titik = data;

        console.log(data);
        
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v9', //stylesheet location
            center: [112.79729, -7.27957], // starting position
            zoom: 13 // starting zoom
        });

        var geojson = {
          "type": "FeatureCollection",
          "features": []
        };

        var geojson2 = {
          "type": "FeatureCollection",
          "features": []
        };

        var geojson3 = {
          "type": "FeatureCollection",
          "features": []
        };

        for(var i=0; i<data[0].length - 1; i++)
        {
            $json = JSON.parse(data[0][i]['json']);
            geojson.features.push($json);
        }

        for(var i=0; i<data[1].length - 1; i++)
        {
            $json = JSON.parse(data[1][i]['json']);
            geojson2.features.push($json);
        }

        for(var i=0; i<data[2].length - 1; i++)
        {
            $json = JSON.parse(data[2][i]['json']);
            geojson3.features.push($json);
        }

        map.on('load', function () {

                    map.addLayer({
                        "id": "rute",
                        "type": "line",
                        "source": {
                            "type": "geojson",
                            "data": geojson
                        },
                        "layout": {
                            "line-join": "round",
                            "line-cap": "round"
                        },
                        "paint": {
                            "line-color": "#009688",
                            "line-width": 3
                        }
                    });

                    // map.addLayer({
                    //     "id": "rute2",
                    //     "type": "line",
                    //     "source": {
                    //         "type": "geojson",
                    //         "data": geojson2
                    //     },
                    //     "layout": {
                    //         "line-join": "round",
                    //         "line-cap": "round"
                    //     },
                    //     "paint": {
                    //         "line-color": "#B71C1C",
                    //         "line-width": 3,
                    //         "line-opacity": 0.5
                    //     }
                    // });

                    // map.addLayer({
                    //     "id": "rute3",
                    //     "type": "line",
                    //     "source": {
                    //         "type": "geojson",
                    //         "data": geojson3
                    //     },
                    //     "layout": {
                    //         "line-join": "round",
                    //         "line-cap": "round",
                    //     },
                    //     "paint": {
                    //         "line-color": "#424242",
                    //         "line-width": 3,
                    //         "line-opacity": 0.5
                    //     }
                    // });

                    
            });
        });
</script>

</body>
</html>
