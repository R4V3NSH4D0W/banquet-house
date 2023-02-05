<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banquet House</title>

    <!-- Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    <!-- css linked -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Section Start -->

    <section class="header">
        <div class="navbar">
            <img src="img/logo.png" alt="" class="logo">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Gallery</a></li>
                <li><a href="">Pricing</a></li>
                <li><a href="">Contact us</a></li>
            </ul>
            <!-- <div class="search">
                    <span class="icon">
                        <ion-icon name="search-outline"></ion-icon>
                        <ion-icon name="close-outline"></ion-icon>
                    </span>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search Here ...">
                </div> -->

            <img src="img/user.png" alt="" class="user-pic">
        </div>
        <section class="home" id="home">

            <div class="home-section">
                <h1>its time to celebrate!<br>the best event organizers</h1>
            </div>

            <!-- slider -->

            <div class="swiper-container home-slider">
                <div class="swiper-wrapper">
                    <?php
                    require '/programs/xampp/htdocs/banquethouses/connection/config.php';
                    $rows = mysqli_query($conn, "SELECT * FROM swiperimage where admin_id='5'");

                    ?>
                    <?php
                    foreach ($rows as $rows) :
                    ?>
                        <div class="swiper-slide"><img src="uploads/<?php echo $rows["swiperimage"]; ?>" alt=""></div>
                    <?php endforeach; ?>
                    <!-- <div class="swiper-slide"><img src="images/slide-2.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/slide-3.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/slide-4.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/slide-5.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/slide-6.jpg" alt=""></div> -->
                </div>
            </div>
        </section>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="js/script.js"></script>


</body>

</html>