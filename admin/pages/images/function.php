<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../login/login.php');
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "upload") {
        upload();
    } else {
        delete();
    }
}
function upload()
{
    global $conn;
    $admin_id = $_SESSION['admin_id'];
    $file = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $filesize = $_FILES['image']['size'];
    $fileerror = $_FILES['image']['error'];
    $filetype = $_FILES['image']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 2000000) {
                $filenamenew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $filenamenew;
                move_uploaded_file($file_tmp_name, $fileDestination);
                $query = "INSERT INTO images values('','$filenamenew','$admin_id')";
                mysqli_query($conn, $query);
            } else {
                echo "file is to big";
            }
        } else {
            echo "There was an error uplading an file";
        }
    } else {
        echo "you can not upload file of this type!";
    }
}
function edit()
{
    global $conn;
}
function delete()
{
    global $conn;
}
