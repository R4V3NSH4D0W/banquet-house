<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}
$lat = $_POST['latitude'];
$long = $_POST['longitude'];
$address = $_POST['address'];
$detail = $_POST['detail'];
$result = mysqli_query($conn, "Insert into map VALUES('','$address','$detail','$lat','$long','$admin_id')");
echo "added sucessfully";
