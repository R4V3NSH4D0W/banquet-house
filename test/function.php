<?php
require 'config.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "insert") {
        insert();
    } else if ($_POST["action"] == "edit") {
        edit();
    } else {
        delete();
    }
}

function insert()
{
    global $conn;
    $id = $_POST["id"];
    $name = mysqli_real_escape_string($conn, $_POST['service-name']);
    $desc = mysqli_real_escape_string($conn, $_POST['service-description']);
    $price = $_POST['service-price'];
    $duplicate = mysqli_query($conn, "SELECT * FROM tbservice WHERE servicename = '$name' AND id='$id'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('service already exist'); </script>";
    } else {
        $query = "INSERT INTO tbservice VALUES('','$name','$desc','$price','$id')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Service Added'); </script>";
    }
}

function edit()
{
    global $conn;

    $id = $_POST["id"];
    $name = $_POST["service-name"];
    $desc = $_POST["service-description"];
    $price = $_POST['service-price'];


    $query = "UPDATE tbservice SET servicename = '$name',  servicedesc= '$desc', serviceprice = '$price' WHERE id = $id";
    mysqli_query($conn, $query);
    echo "Updated Successfully";
}

function delete()
{
    global $conn;

    $id = $_POST["action"];

    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $query);
    echo "Deleted Successfully";
}