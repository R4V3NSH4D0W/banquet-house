<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';


if (!isset($_SESSION['super_id'])) {
    header('location:../../../login/index.php');
    exit();
}
$i = 1;
$rows_per_page = 8;

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * $rows_per_page;

$sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id  JOIN map ON map.admin_id=banquet.admin_id LIMIT $start, $rows_per_page";

$rows = mysqli_query($conn, $sql);

$total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM user JOIN banquet ON banquet.admin_id=user.id  JOIN map ON map.admin_id=banquet.admin_id");
$total_rows = mysqli_fetch_assoc($total_rows)['total'];

$total_pages = ceil($total_rows / $rows_per_page);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>

<body>
    <div class="sidebar close">
        <?php include '../sidebar/sidebar.php'; ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Admin</span>
        </div>
        <div class="container">
            <h3>Banquet Status</h3>
            <br>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Banquet name</th>
                        <th>City</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                    <tr data-id="<?php echo $row['admin_id']; ?>">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['banquetname']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td>
                            <?php if ($row['status'] == 'active') : ?>
                            <button class="status" style="background-color: green; color: white;">Active</button>
                            <?php elseif ($row['status'] == 'pending') : ?>
                            <button class="status" style="background-color: blue; color: white;">Pending</button>
                            <?php else : ?>
                            <button class="status" style="background-color: red; color: white;">Deactive</button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="active-button"
                                onclick="updateStatus('active', <?php echo $row['admin_id']; ?>)">Active</button>
                            <button class="deactive-button"
                                onclick="updateStatus('deactive', <?php echo $row['admin_id']; ?>)">Deactive</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="pagination">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page=<?php echo $i; ?>&rows_per_page=<?php echo $rows_per_page; ?>"
                    <?php if ($page == $i) : ?> class="active" <?php endif; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>

        </div>
        <script>
        function updateStatus(status, id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    location.reload();
                }
            };
            xhr.send("status=" + status + "&id=" + id);
        }
        </script>


        <script src="../sidebar/script.js"></script>

</html>