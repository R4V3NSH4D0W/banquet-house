<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `contactus` WHERE admin_id ='$admin_id' "));
if ($row < 1) {
    $query = "INSERT INTO contactus VALUES('','$email','$number','$desc','$admin_id')";
    if (mysqli_query($conn, $query)) {
        echo "Contact us updated";
    } else {
        echo "Error updating Contact us ";
    }
} else {
    $query = " UPDATE `contactus` SET email='$email',number='$number',description='$desc' WHERE admin_id='$admin_id' ";
    if (mysqli_query($conn, $query)) {
        echo "contact us updated";
    } else {
        echo "Error updating contact us ";
    }
}