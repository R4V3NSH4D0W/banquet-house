<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id  JOIN map ON map.admin_id=banquet.admin_id WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR banquetname LIKE '%$search%' OR city LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    }

    echo json_encode($response);
}
