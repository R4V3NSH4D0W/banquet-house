<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Content</title>
</head>

<body>
    <?php
include 'navbar.php';
?>
    <section class="dashboard">
        <?php
include 'search.php';
?>
        <form action="" method="post">
            <div class="dash-content">
                <div class="overview">
                    <!-- featured images -->
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Featured image</span>
                    </div>
                    <div>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
                        <input type="submit" value="Add Image" name="addimage" class="btn">
                    </div>
                    <!-- services -->
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">services</span>
                    </div>
                    <!-- our price -->
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Price</span>
                    </div>
                    <div>
                        For Birthday<br>
                        <input type="number" name="price">
                    </div>

                    <!-- about us -->
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">About Us</span>
                    </div>

                </div>
        </form>
    </section>

    <script src="script.js"></script>
</body>

</html>