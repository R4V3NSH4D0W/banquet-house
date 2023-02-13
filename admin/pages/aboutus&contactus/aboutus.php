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
    <link rel="stylesheet" href="style2.css">
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
            <span class="text">Admin Dashboard</span>
        </div>
        <div class="container">
            <div class="main-container">
                <h1>Update About Us</h1>
                <?php
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `about us` WHERE admin_id ='$admin_id' "));
                ?>
                <form id="update-form">
                    <label for="Icon-name">Page Description:</label>
                    <textarea id="aboutus"><?php if ($row === NULL || $row['description'] === NULL) {
                                                echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident quisquam unde molestiae reprehenderit optio? Nisi voluptas doloremque provident nobis minima vero sed, harum, quis animi incidunt autem maiores nesciunt consequatur?";
                                            } else {
                                                echo $row['description'];
                                            } ?></textarea>

                    <button class="add" type="submit" name="add"><i class='bx bx-plus'></i>
                        update</button>
                </form>
            </div>
        </div>


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#update-form').submit(function(e) {
            e.preventDefault();

            var data = {
                aboutus: $("#aboutus").val(),
            }
            console.log(data);
            $.ajax({
                type: "POST",
                url: "update.php",
                data: data,
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