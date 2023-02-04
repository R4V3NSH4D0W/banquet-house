<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/login.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

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
        <!-- upload image section -->
        <label for="images" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" id="images" name="images" required>
                <button onclick="submitData('upload',this);" class="upload">upload</button>
            </form>
        </label>
        <!-- end upload image section -->


        <!-- start display image section -->
        <h1>Uploaded Images</h1>
        <div class="image-wrapper">
            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/1.jpg" alt="">
                <div class="image-details">
                    <p>Image 1</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/2.png" alt="">
                <div class="image-details">
                    <p>Image 2</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/3.jpg" alt="">
                <div class="image-details">
                    <p>Image 3</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/4.jpg" alt="">
                <div class="image-details">
                    <p>Image 4</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/6.jpg" alt="">
                <div class="image-details">
                    <p>Image 5</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/5.png" alt="">
                <div class="image-details">
                    <p>Image 6</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/7.png" alt="">
                <div class="image-details">
                    <p>Image 7</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/9.jpg" alt="">
                <div class="image-details">
                    <p>Image 8</p>
                </div>
            </div>

            <div class="media">
                <div class="overlay"></div>
                <img src="./uploaded_image/8.png" alt="">
                <div class="image-details">
                    <p>Image 9</p>
                </div>
            </div>

        </div>

    </section>
    <?php
    require 'script.php';
    ?>
    <!-- <script>
    $(document).ready(function() {
        $("#submit").click(function(e) {
            e.preventDefault();

            let form_data = new FormData();
            let img = $("#myImage")[0].files;
            //check image selected or not
            if(img.length>0){

            }else{

            }
        });
    })
    </script> -->
    <script src="../sidebar/script.js">
    </script>
</body>

</html>