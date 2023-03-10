<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Fetch booking data from database
$result = mysqli_query($conn, "SELECT id, bookingFrom, bookingTo FROM booking");

// Format booking data as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = '';
    $event['start'] = $row['bookingFrom'];
    $event['end'] = $row['bookingTo'];

    // create an array of dates between start and end dates
    $start_date = new DateTime($row['bookingFrom']);
    $end_date = new DateTime($row['bookingTo']);
    $days = $start_date->diff($end_date)->days + 1; // add 1 day to include end date

    // set background color based on number of days
    if ($days >= 7) {
        $event['backgroundColor'] = 'red'; // red
        $event['borderColor'] = 'transparent';
    } elseif ($days >= 4) {
        $event['backgroundColor'] = '#f0ad4e'; // orange
        $event['borderColor'] = 'transparent';
    } else {
        $event['backgroundColor'] = '#green'; // green
        $event['borderColor'] = 'transparent';
    }

    $data[] = $event;
}

echo json_encode($data);