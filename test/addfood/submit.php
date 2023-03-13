<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $page_id = $_POST['page_id'];
    $eventType = $_POST['event-type'];
    $guestCount = $_POST['guest-count'];
    $user_id = $_SESSION['user_id'];
    // Check if reservation already exists
    $bookingDate = $_POST['bookingdate'];
    $checkQry = "SELECT * FROM `reservation` WHERE `user_id` = '$user_id' AND `event-type` = '$eventType' AND `booking-date` = '$bookingDate'";
    $checkResult = mysqli_query($conn, $checkQry);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "You have already made a reservation for this event type on the selected date.";
        exit;
    }

    // Split the array values by & and ,
    $appetizers = isset($_POST['appetizers']) ? explode(',', str_replace(' ', '', $_POST['appetizers'])) : '';
    $soups = isset($_POST['soups']) ? explode(',', str_replace(' ', '', $_POST['soups'])) : '';
    $mainCourses = isset($_POST['maincourse']) ? explode(',', str_replace(' ', '', $_POST['maincourse'])) : '';
    $desserts = isset($_POST['dessert']) ? explode(',', str_replace(' ', '', $_POST['dessert'])) : '';
    $harddrinks = isset($_POST['harddrinks']) ? explode(',', str_replace(' ', '', $_POST['harddrinks'])) : '';
    $softdrinks = isset($_POST['softdrinks']) ? explode(',', str_replace(' ', '', $_POST['softdrinks'])) : '';
    $totalprice = $_POST['total-price'];
    $bookingDate = $_POST['bookingdate'];

    // Convert arrays to comma-separated strings
    $appetizers_str = is_array($appetizers) ? implode(', ', $appetizers) : '';
    $soups_str = is_array($soups) ? implode(', ', $soups) : '';
    $mainCourses_str = is_array($mainCourses) ? implode(', ', $mainCourses) : '';
    $desserts_str = is_array($desserts) ? implode(', ', $desserts) : '';
    $harddrinks_str = is_array($harddrinks) ? implode(', ', $harddrinks) : '';
    $softdrinks_str = is_array($softdrinks) ? implode(', ', $softdrinks) : '';

    $qry = "INSERT INTO `reservation`
values('','$bookingDate','$eventType','$guestCount','$appetizers_str','$mainCourses_str','$harddrinks_str','$softdrinks_str','$totalprice','$page_id','$user_id','pending')";
    if (mysqli_query($conn, $qry)) {
        echo "Your Request has been Submitted";
    }

    // Process the data and store it in the database
    // ...

    // Send a response back to the client
    header('Content-Type: application/json');
}
