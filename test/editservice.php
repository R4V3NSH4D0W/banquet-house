<?php
require 'config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}
// update service //
if (isset($_POST["update"])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['service-name']);
    $desc = mysqli_real_escape_string($conn, $_POST['service-description']);
    $price = $_POST['service-price'];
    // $query = "UPDATE tbservice SET servicename='$name', servicedesc='$desc' ,serviceprice='$price' WHERE id='$id'";
    $query = " UPDATE `tbservice` SET `servicename`='$name',`servicedesc`='$desc',`serviceprice`='$price' WHERE `id`='$id'";
    if (mysqli_query($conn, $query)) {
        "<script> alert('Service updated'); </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
                <h1>Edit Services</h1>
                <form method="post" action="">
                    <?php
                    $id = $_GET['id'];
                    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbservice WHERE id =$id "));
                    ?>
                    <input type="hidden" name="id" values="<?php echo $row['id']; ?>">
                    <label for="service-name">Service name:</label>
                    <input type="text" id="service-name" name="service-name" value="<?php echo $row['servicename']; ?>">

                    <label for="service-description">Service description:</label>
                    <textarea id="service-description"
                        name="service-description"><?php echo $row['servicedesc']; ?></textarea>

                    <label for="service-price">Service price:</label>
                    <input type="number" id="service-price" name="service-price"
                        value="<?php echo $row['serviceprice']; ?>">
                    <button class="add" name="update">Update</button>
                </form>
            </div>
        </div>

    </section>
</body>
<script src="script.js"></script>

</html>