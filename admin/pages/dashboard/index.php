<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
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
            <span class="text">Dashboard</span>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tbservice where adminid='$admin_id'");

                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_services = $row['total'];
                                                echo $total_services;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Services</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-hammer"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM images where admin_id='$admin_id'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_image = $row['total'];
                                                echo $total_image;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Gallary</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-thin fa-image"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM Packages where admin_id='$admin_id'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Packages</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-thin fa-books"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reservation where admin_id='$admin_id' AND status='pending'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">New Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reservation where admin_id='$admin_id' AND status='accepted'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Approved Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reservation where admin_id='$admin_id' AND status='rejected'");
                        ?>
                        <div class="number"><?php if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $total_package = $row['total'];
                                                echo $total_package;
                                            } else {
                                                echo "0";
                                            }
                                            ?></div>
                        <div class="card-name">Rejected Booking</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="../sidebar/script.js"></script>

</html>