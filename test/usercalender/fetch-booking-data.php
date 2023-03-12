<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
// Fetch booking data from database
$id = $_GET['page_id'];
$result = mysqli_query($conn, "SELECT id, `booking-date` FROM reservation WHERE status='accepted' AND admin_id=$id");

// Format booking data as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = 'Reserved';
    $event['start'] = $row['booking-date'];

    // set background color for the date
    $event['backgroundColor'] = 'green'; // default color

    // add event to data array
    $data[] = $event;
}

echo json_encode($data);
