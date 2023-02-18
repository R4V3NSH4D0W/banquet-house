<!DOCTYPE html>
<html>

<head>
    <title>fetch map</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>

    <div id="map"></div>
    <script>
        var map = L.map('map').setView([27.7172, 85.3240], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        var marker;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_locations.php', true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                var location = JSON.parse(xhr.responseText);
                var latitude = location.latitude;
                var longitude = location.longitude;
                var name = location.name;
                map.setView([latitude, longitude], 13);
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup(name)
                    .openPopup();
            }
        };
        xhr.send();
    </script>

</body>

</html>