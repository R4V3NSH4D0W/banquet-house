<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
if (isset($_GET['sort'])) {
    $sort_by = mysqli_real_escape_string($conn, $_GET['sort']);
    if ($sort_by == 'active') {
        $order_by = 'banquet.status ASC';
    } elseif ($sort_by == 'deactive') {
        $order_by = 'banquet.status DESC';
    } else {
        $order_by = 'user.id ASC';
    }
    $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id
            ORDER BY $order_by";
    $rows = mysqli_query($conn, $sql);
    $table_body = '';
    $i = 1;
    foreach ($rows as $row) {
        $table_body .= '<tr data-id="' . $row['admin_id'] . '">';
        $table_body .= '<td>' . $i++ . '</td>';
        $table_body .= '<td>' . $row['name'] . '</td>';
        $table_body .= '<td>' . $row['email'] . '</td>';
        $table_body .= '<td>' . $row['banquetname'] . '</td>';
        $table_body .= '<td>' . $row['city'] . '</td>';
        $table_body .= '<td>';
        if ($row['status'] == 'active') {
            $table_body .= '<button class="status" style="background-color: green; color: white;">Active</button>';
        } elseif ($row['status'] == 'pending') {
            $table_body .= '<button class="status" style="background-color: blue; color: white;">Pending</button>';
        } else {
            $table_body .= '<button class="status" style="background-color: red; color: white;">Deactive</button>';
        }
        $table_body .= '</td>';
        $table_body .= '</tr>';
    }
    echo $table_body;
} else {
    echo 'Invalid request.';
}
