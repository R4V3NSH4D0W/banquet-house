<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "add") {
        add();
    } else if ($_POST["action"] == "edit") {
        edit();
    } else {
        delete();
    }
}
function add()
{
    global $conn;
    $admin_id = $_SESSION['admin_id'];
    $servicename = mysqli_real_escape_string($conn, $_POST['service_name']);
    $servicedesc = mysqli_real_escape_string($conn, $_POST['service_desc']);
    $serviceprice = $_POST['service_price'];
    $duplicate = mysqli_query($conn, "SELECT * FROM tbservice WHERE servicename = ' $servicename' AND adminid='$admin_id'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "Service already exist";
    } else {
        $query = "INSERT INTO tbservice VALUES('',' $servicename','$servicedesc','$serviceprice','$admin_id')";
        mysqli_query($conn, $query);
        echo "service added successfully";
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

    $query = "DELETE FROM tbservice WHERE id = $id";
    mysqli_query($conn, $query);
    echo "delete";
}