<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:../../login/login.php');
}
$lat = $_POST['latitude'];
$long = $_POST['longitude'];
$address = $_POST['address'];
$cost = $_POST['cost'];
$detail = $_POST['detail'];
$city = $_POST['city'];
$banuqetname = $_POST['banquetname'];
$capacity = $_POST['capacity'];
$type = $_POST['type'];
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');
$check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM map where admin_id=$user_id"));
// if ($check['admin_id'] != $user_id) {
if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 100000000) {
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $sql =  "INSERT INTO banquet  VALUES ('', '$fileNameNew', '$user_id','$banuqetname','$capacity','pending','$type','$cost')";
            $result = mysqli_query($conn, "Insert into map VALUES('','$address','$detail','$lat','$long','$user_id','$city')");

            if ($conn->query($sql) === TRUE) {
                echo "your request";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "File is too big.";
        }
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "You cannot upload files of this type.";
}

echo "sent sucessfully";
// // } else {
// //     echo "user already send request";
// }