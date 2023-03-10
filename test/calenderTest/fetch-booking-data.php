<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Fetch booking data from database
$result = mysqli_query($conn, "SELECT id, bookingFrom, bookingTo, services FROM booking");


// Format booking data as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['services'];
    $event['start'] = $row['bookingFrom'];
    $event['end'] = $row['bookingTo'];
    if (strtotime($event['end']) > strtotime($event['start']) + 86400) {
        $event['end'] = date('Y-m-d', strtotime($event['end']) + 86400);
    }
    $data[] = $event;
}
echo json_encode($data);
