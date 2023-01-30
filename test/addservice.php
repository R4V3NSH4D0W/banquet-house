<?php
require 'config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}
// add service //
if (isset($_POST["add"])) {
    $name = mysqli_real_escape_string($conn, $_POST['service-name']);
    $desc = mysqli_real_escape_string($conn, $_POST['service-description']);
    $price = $_POST['service-price'];
    $duplicate = mysqli_query($conn, "SELECT * FROM tbservice WHERE servicename = '$name' AND adminid='$admin_id'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('service already exist'); </script>";
    } else {
        $query = "INSERT INTO tbservice VALUES('','$name','$desc','$price','$admin_id')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Service Added'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="sidebar close">
        <?php
        include 'sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Admin Dashboard</span>
        </div>
        <div class="container">
            <div class="main-container">
                <h1>ADD Services</h1>
                <form method="post">
                    <label for="service-name">Service name:</label>
                    <input type="text" id="service-name" name="service-name">

                    <label for="service-description">Service description:</label>
                    <textarea id="service-description" name="service-description"></textarea>

                    <label for="service-price">Service price:</label>
                    <input type="number" id="service-price" name="service-price">
                    <button class="add" name="add"><i class='bx bx-plus'></i> Add</button>
                </form>
            </div>
        </div>

    </section>
</body>
<script src="script.js"></script>

</html>