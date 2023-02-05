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
            <span class="text">Admin Dashboard</span>
        </div>
        <label for="images" class="drop-container">
            <!-- <span class="drop-title">Drop files here</span>
            or -->
            <form id="upload-form">
                <input type="file" name="file">
                <input type="submit" class="upload" value="Upload">
            </form>

        </label>
        <!-- end upload image section -->


        <!-- start display image section -->
        <h1>Gallary</h1>
        <div class="image-wrapper">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM images where admin_id='$admin_id'");
            foreach ($rows as $rows) :
            ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploads/<?php echo $rows['images']; ?>" alt="">
                <div class="image-details">
                    <p class="delete-button" data-file="<?php echo $rows['images']; ?>"><i class='bx bx-trash'></i></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#upload-form').submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == "File uploaded successfully.") {
                        location.reload();
                    }
                    alert(data);
                }
            });

        });
        $('.delete-button').click(function() {
            var file = $(this).data('file');

            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {
                    file: file
                },
                success: function(data) {
                    if (data === "File deleted successfully.") {
                        location.reload();

                    } else {
                        console.log(data);
                    }
                }
            });
        });
    });
    </script>

    <script src="../sidebar/script.js">
    </script>
</body>

</html>