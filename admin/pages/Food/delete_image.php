<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_POST['image'];
    $query = "DELETE FROM food WHERE admin_id='$admin_id' AND image='$image'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        unlink("uploads/$image");
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}