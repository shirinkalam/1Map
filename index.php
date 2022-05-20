<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1Map</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    
    <link rel="stylesheet" href="assets/css/leaflet.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />

    <script src="assets/js/leaflet.js"></script>
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </div>
    <script>

	    var map = L.map('map').setView([35.7077718,51.4873992], 12);

	    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		    maxZoom: 18,
		    attribution: 'Map data &copy; <a href="">`1Map Project`</a>',
		    id: 'mapbox/streets-v11',
		    tileSize: 512,
		    zoomOffset: -1
	    }).addTo(map);

    </script>

</body>

</html>