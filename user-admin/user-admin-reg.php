<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:../../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Banquet Owner Request Form</h1>
        <form>
            <div class="field">
                <label for="banquet-name">Banquet Name:</label>
                <input type="text" id="banquet-name" name="banquet-name" required>
            </div>
            <div class="field">
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" required>
            </div>
            <div class="field">
                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact-number" required>
            </div>
            <div class="field">
                <label for="banquet-type">Banquet Type:</label>
                <select id="banquet-type" name="banquet-type" required>
                    <option value="">Select an option</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Conference">Conference</option>
                    <option value="Party">Party</option>
                    <option value="other">other</option>
                </select>
            </div>
            <div class="field">
                <label for="location">Location:</label>
                <div id="map"></div>
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
                <input type="text" id="address" name="address" placeholder="address" required>
                <!-- <input type="detail" id="detail" name="detail" placeholder="detail" required> -->
            </div>
            <div class="field">
                <label for="identity">Banquet image</label>
                <input type="file" id="file-input" name="ownerdoc" required>
            </div>
            <div class="field">
                <label for="detail">About Your banquet</label>
                <input type="text" id="detail" name="detail" placeholder="detail" required>
            </div>
            <div class="field">
                <label for="city">city</label>
                <select id="city">
                    <option value="kathmandu">Kathmandu</option>
                    <option value="pokhara">Pokhara</option>
                </select>
            </div>
            <div class="submit">
                <button type="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
<script src="script.js">
</script>
<script>
document.getElementById('submit').addEventListener('click', function(event) {
    event.preventDefault();
    var latitude = document.getElementById('latitude').value;
    var banquetname = document.getElementById('banquet-name').value;
    var number = document.getElementById('contact-number').value;
    var capacity = document.getElementById('capacity').value;
    var city = document.getElementById('city').value;
    var longitude = document.getElementById('longitude').value;
    var type = document.getElementById('banquet-type').value;
    var address = document.getElementById('address').value;
    var detail = document.getElementById('detail').value;
    var fileInput = document.getElementById('file-input');
    if (address === '' || detail === '') {
        alert('Please enter both address and detail');
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };
    xhr.open('POST', 'save_location.php');
    var formData = new FormData();
    formData.append('latitude', latitude);
    formData.append('longitude', longitude);
    formData.append('address', address);
    formData.append('detail', detail);
    formData.append('city', city);
    formData.append('capacity', capacity);
    formData.append('banquetname', banquetname);
    formData.append('type', type);
    formData.append('number', number);
    formData.append('file', fileInput.files[0]);
    console.log(formData);
    xhr.send(formData);
});
// document.getElementById('submit').addEventListener('click', function(event) {
//             event.preventDefault();
//             var latitude = document.getElementById('latitude').value;
//             var banquetname = document.getElementById('banquet-name').value;
//             var number = document.getElementById('contact-number').value;
//             var city = document.getElementById('city').value;
//             var longitude = document.getElementById('longitude').value;
//             var address = document.getElementById('address').value;
//             var detail = document.getElementById('detail').value;
//             if (address === '' || detail === '') {
//                 alert('Please enter both address and detail');
//                 return;
//             }

//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 alert(xhr.responseText);
//             } else {
//                 console.log('Error: ' + xhr.status);
//             }
//         }
//     };
//     xhr.open('POST', 'save_location.php');
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     var data = 'latitude=' + encodeURIComponent(latitude) + '&longitude=' + encodeURIComponent(longitude) +
//         '&address=' + encodeURIComponent(address) + '&detail=' + encodeURIComponent(detail) + '&city=' +
//         encodeURIComponent(city) + '&banquetname=' + encodeURIComponent(banquetname) + '&number=' +
//         encodeURIComponent(number);
//     console.log(data);
//     xhr.send(data);
// });
</script>

</html>