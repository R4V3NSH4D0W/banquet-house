<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

$sql = "SELECT * FROM map join  banquet on map.admin_id= banquet.admin_id where banquet.status='active' ";
$result = $conn->query($sql);
$locations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $location = array(
            'name' => $row['banquetname'],
            'latitude' => $row['lat'],
            'longitude' => $row['lng']
        );
        array_push($locations, $location);
    }
}
header('Content-Type: application/json');
echo json_encode($locations);
