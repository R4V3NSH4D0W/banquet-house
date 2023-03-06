<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

if (!isset($_SESSION['super_id'])) {
    header('location:../../../login/index.php');
    exit();
}

$i = 1;
$rows_per_page = 8;

if (!isset($_POST['page'])) {
    $page = 1;
} else {
    $page = $_POST['page'];
}

$start = ($page - 1) * $rows_per_page;


if (isset($_POST['status'])) {
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    if ($status == 'All') {
        $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id LIMIT $start, $rows_per_page";
        $total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id");
    } else {
        $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id WHERE banquet.status = '$status' LIMIT $start, $rows_per_page";
        $total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id WHERE banquet.status = '$status'");
    }
} else {
    $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id LIMIT $start, $rows_per_page";
    $total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id");
}

$rows = mysqli_query($conn, $sql);

$total_rows = mysqli_fetch_assoc($total_rows)['total'];

$total_pages = ceil($total_rows / $rows_per_page);
if (isset($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);

    // Modify the SQL query to include a WHERE clause with the search term
    $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id
            WHERE user.name LIKE '%$search_term%'
            OR user.email LIKE '%$search_term%'
            OR banquet.banquetname LIKE '%$search_term%'
            OR map.city LIKE '%$search_term%'
            LIMIT $start, $rows_per_page";
} else {
    // If no search term was submitted, use the original query
    $sql = "SELECT * FROM user JOIN banquet ON banquet.admin_id=user.id JOIN map ON map.admin_id=banquet.admin_id LIMIT $start, $rows_per_page";
}
$rows = mysqli_query($conn, $sql);
$filter = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h2>Banquet Status</h2>
            <br>
            <form method="get" action="">
                <input type="text" name="search" placeholder="Search.." class="search-field">
                <button type="submit" class="search-button">Search</button>
            </form>
            <form action="" method="POST">
                <label for="status">Filter by:</label>
                <select name="status" id="status" class="form-control">
                    <option value="All">All</option>
                    <option value="active">Active</option>
                    <option value="deactive">Deactive</option>
                </select>
                <button type="submit" name="submit-filter" class="btn btn-primary"><i class="fa fa-filter"></i>
                    Filter</button>
            </form>

            <table id="myTable">
                <thead>
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
                    <?php while ($row = mysqli_fetch_assoc($rows)) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
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
                                <button class="active-button" onclick="updateStatus('active', <?php echo $row['admin_id']; ?>)">Active</button>
                                <button class="deactive-button" onclick="updateStatus('deactive', <?php echo $row['admin_id']; ?>)">Deactive</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for ($p = 1; $p <= $total_pages; $p++) { ?>
                    <lable class="<?php if ($page === (string)$p) echo 'active'; ?>">
                        <a href="#" class="page-link" onclick="submitForm(<?php echo $p; ?>)">
                            <?php echo $p; ?>
                        </a>
                    </lable>
                <?php } ?>
                <form id="pagination-form" method="POST">
                    <input type="hidden" name="page" id="page" value="">
                </form>
            </div>
        </div>

    </section>
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
    <script>
        function submitForm(page) {
            document.getElementById("page").value = page;
            document.getElementById("pagination-form").submit();
        }

        document.querySelector('.bx-menu').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('close');
        });
    </script>
</body>