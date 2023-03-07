<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$page_id = $_GET['page_id'];
$sql = "SELECT * FROM map WHERE admin_id = $page_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("Location not found");
}
$row = mysqli_fetch_assoc($result);
$words = explode(",", $row['address']);
$words = array_filter($words, function ($word) {
    return strcasecmp(trim($word), "Undefined") !== 0;
});
$name = implode(", ", $words);
$latitude = $row['lat'];
$longitude = $row['lng'];
$data = array(
    'name' => $name,
    'latitude' => $latitude,
    'longitude' => $longitude
);
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conn);
