<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$pageId = $_POST['page_id'];
$bookingDate = $_POST['booking_date'];
$packageID = $_POST['packageID'];
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO eventbooking values('','$packageID','$user_id','$pageId','$bookingDate')";
if (mysqli_query($conn, $sql)) {
    echo "Reservation record inserted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
