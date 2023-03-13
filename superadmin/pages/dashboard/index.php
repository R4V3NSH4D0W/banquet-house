<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$super_id = $_SESSION['super_id'];

if (!isset($super_id)) {
    header('location:../../../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Admin</span>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM banquet where status='active'");

                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_services = $row['total'];
                                                echo $total_services;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Active Owners</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM banquet where status='deactive'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_image = $row['total'];
                                                echo $total_image;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Deactive Owner</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM banquet where status='active' OR status='deactive'");

                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_services = $row['total'];
                                                echo $total_services;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Total Owners</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM banquet where status='pending'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Pending</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM user where type='user'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Total Users</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>
    </section>
</body>
<script src="../sidebar/script.js"></script>

</html>