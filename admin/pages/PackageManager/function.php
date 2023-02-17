<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "edit") {
        edit();
    } else {
        delete();
    }
}

function edit()
{
    global $conn;
    $id = $_POST['service_id'];
    $name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $desc = mysqli_real_escape_string($conn, $_POST['service_desc']);
    $price = $_POST['service_price'];
    $query = " UPDATE tbservice SET servicename='$name',servicedesc='$desc',serviceprice='$price' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "service updated";
    } else {
        echo "Error updating record ";
    }
}
function delete()
{
    global $conn;
    $id = $_POST["action"];

    $query = "DELETE FROM packages WHERE id = $id";
    mysqli_query($conn, $query);
    echo "delete";
}
