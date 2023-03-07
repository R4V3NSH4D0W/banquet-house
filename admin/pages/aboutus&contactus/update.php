<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}

$aboutus = mysqli_real_escape_string($conn, $_POST['aboutus']);
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `about us` WHERE admin_id ='$admin_id' "));
if ($row < 1) {
    $query = "INSERT INTO `about us` VALUES('','$aboutus','$admin_id')";
    if (mysqli_query($conn, $query)) {
        echo "About us updated";
    } else {
        echo "Error updating About us ";
    }
} else {
    $query = " UPDATE `about us` SET description='$aboutus' WHERE admin_id='$admin_id' ";
    if (mysqli_query($conn, $query)) {
        echo "About us updated";
    } else {
        echo "Error updating About us ";
    }
}
