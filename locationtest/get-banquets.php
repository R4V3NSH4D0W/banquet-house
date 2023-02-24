<?php
include '../../banquethouses/connection/config.php';

// Check if the user has granted permission to access their device's location
if (isset($_GET['lat']) && isset($_GET['lng'])) {
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    // Execute a query to select the banquet house locations from the map table
    $sql = "SELECT id, address, lat, lng, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM map HAVING distance < 10 ORDER BY distance LIMIT 0 , 20";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Output the banquet house locations within a certain range
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<b>" . $row["address"] . "<br>Latitude: " . $row["lat"] . " Longitude: " . $row["lng"] . "<br><br>";
        }
    } else {
        echo "0 results";
    }
}

// Close the connection
mysqli_close($conn);
