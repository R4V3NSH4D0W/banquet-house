<!DOCTYPE html>
<html>

<head>
    <title>Nearby Banquet Houses</title>
    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        border: 1px solid black;
        padding: 10px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <h1>Nearby Banquet Houses</h1>
    <ul id="banquets">
    </ul>
    <script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showBanquets);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function showBanquets(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("banquets").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "get-banquets.php?lat=" + lat + "&lng=" + lng, true);
        xmlhttp.send();
    }
    </script>

</body>

</html>