<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

$super_id = $_SESSION['super_id'];

if (!isset($super_id)) {
    header('location:../../../login/index.php');
    exit;
}

// Get the ID and status from the AJAX request
$id = $_POST['id'];
$status = $_POST['status'];
print_r($id);
// Escape the input data to prevent SQL injection attacks
$id = mysqli_real_escape_string($conn, $id);
$status = mysqli_real_escape_string($conn, $status);

// Update the status in the banquet table
$sql = "UPDATE banquet SET status='$status' WHERE admin_id=$id";
mysqli_query($conn, $sql);

// Fetch the updated status of the banquet
$sql = "SELECT status, admin_id FROM banquet WHERE admin_id=$id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false]);
    exit;
}
$row = mysqli_fetch_assoc($result);
$status = $row['status'];
$admin_id = $row['admin_id'];

// Update the user table based on the banquet status
if ($status == 'active') {
    $sql = "UPDATE user SET type='admin' WHERE id=$admin_id";
    mysqli_query($conn, $sql);
} elseif ($status == 'deactive') {
    $sql = "UPDATE user SET type='user' WHERE id=$admin_id";
    mysqli_query($conn, $sql);
}

// Send a response back to the AJAX request
header('Content-Type: application/json');
echo json_encode(['success' => true]);
