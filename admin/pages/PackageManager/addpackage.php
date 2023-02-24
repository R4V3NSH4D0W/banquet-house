<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../sidebar/style.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="container">
            <div class="main-container">
                <h1>ADD Packages</h1>
                <br>
                <lable>Package Name:</lable>
                <form id="myForm">
                    <input type="text" name="package_name" />
                    <label for="services">Select services:</label>
                    <select name="services[]" multiple>
                        <?php
                        $result = mysqli_query($conn, "select * from tbservice where adminid='$admin_id'");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row["id"] . '">' . $row["servicename"] . '</option>';
                            }
                        } else {
                            echo '<option value="">No services found</option>';
                        }
                        ?>

                    </select>

                    <input type="submit" value="ADD">
                </form>


            </div>
        </div>


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "insertpackage.php",
                    data: $('#myForm').serialize(),
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script>
    <script src="../sidebar/script.js">
    </script>
</body>

</html>