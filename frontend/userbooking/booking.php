<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$user_id = $_SESSION['user_id'];
$id = $_GET['page_id'];
if (!isset($user_id)) {
    header('location:../../login/index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <style>
    #form-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
        padding: 20px;
    }

    #map {
        width: 50%;
        height: 400px;
        margin-left: 20px;

    }

    #form-container form {
        width: 100%;
    }

    #form-container #map {
        width: 50%;
        height: auto;
        object-fit: cover;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="date"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    select {
        width: 38.5rem;
        padding: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0062cc;
    }

    #map {
        height: 400px;
    }

    .map-section {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    </style>
</head>

<body>
    <section class="map-section">
        <div id="form-container">
            <form id="booking-form">
                <input type="hidden" name="page_id" value="<?php echo $id; ?>">
                <label for="booking-from">Booking From:</label>
                <input type="date" id="booking-from" name="booking-from" required>
                <label for="booking-to">Booking To:</label>
                <input type="date" id="booking-to" name="booking-to">
                <label for="num-guests">Number of guests:</label>
                <input type="number" id="guest" name="guest" required>
                <label for="service-type">Type of service:</label>
                <select name="services[]" multiple>
                    <?php
                    $result = mysqli_query($conn, "select * from tbservice where adminid='$id'");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row["id"] . '">' . $row["servicename"] . '</option>';
                        }
                    } else {
                        echo '<option value="">No services found</option>';
                    }
                    ?>
                </select>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
                <input type="submit" value="Submit">
            </form>
            <!-- <div id="map"></div> -->
        </div>
        <div id="map"></div>
    </section>
    <!-- <div id="map"> -->
    <!-- <div id="map-container">
        <div id="map">
        </div>
    </div> -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#booking-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "insertbooking.php",
            data: $('#booking-form').serialize(),
            success: function(response) {
                alert(response);
                location.reload();

            }
        });
    });
});
</script>
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
var pageurl = window.location.href;
var pageurlparts = pageurl.split('?');
var pageParams = new URLSearchParams(pageurlparts[1]);
var pageId = pageParams.get('page_id');
var url = 'get_locations.php?page_id=' + encodeURIComponent(pageId);
var xhr = new XMLHttpRequest();
xhr.open('GET', url, true);
xhr.onload = function() {
    if (xhr.status == 200) {
        var location = JSON.parse(xhr.responseText);
        var latitude = location.latitude;
        var longitude = location.longitude;
        var name = location.name;
        map.setView([latitude, longitude], 14);
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup(name)
            .openPopup();
    }
};
xhr.send();
</script>

</html>