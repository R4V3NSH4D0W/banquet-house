<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Fetch booking data from database
$result = mysqli_query($conn, "SELECT id, `booking-date`, `event-type` FROM reservation where status='accepted'");


// Format booking data as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['event-type'];
    $event['start'] = $row['booking-date'];
    $data[] = $event;
}
echo json_encode($data);
