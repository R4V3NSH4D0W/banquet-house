<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:../../login/index.php');
}
$services = $_POST['services'];
$booking_from = $_POST['booking-from'];
$booking_to = $_POST['booking-to'];
$no_of_guests = $_POST['guest'];
$message = $_POST['message'];
$page_id = $_POST['page_id'];
$total_price = 0;
$service_name = array();
if (empty($booking_from || $booking_to || $no_of_guests || $message)) {
    echo "Empty Field";
} else {
    foreach ($services as $service) {
        $result = mysqli_query($conn, "SELECT servicename, serviceprice FROM tbservice WHERE id = $service");
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);
            $service_name = $rows['servicename'];
            $service_price = $rows['serviceprice'];
            $total_price += $service_price;
            $service_names[] = $service_name;
        }
    }
    $services_str = implode(',', $service_names);
    $sql = mysqli_query($conn, "Insert into booking VALUES('','$user_id','$booking_from','$booking_to','$services_str','$no_of_guests','','','$page_id')");
    echo "Your Booking has been sent we will contact you soon";
}
