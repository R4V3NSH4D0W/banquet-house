<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banquet House</title>
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
    <!-- Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- css linked -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Section Start -->

    <section class="header">
        <div class="navbar">
            <img src="img/logo.png" alt="" class="logo">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#service">services</a></li>
                <li><a href="#gallery">Gallery</a></li>
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
                    $rows = mysqli_query($conn, "SELECT * FROM swiperimage where admin_id='5'");
                    foreach ($rows as $rows) :
                    ?>
                        <div class="swiper-slide"><img src="../../admin/pages/featuredimage/uploads/<?php echo $rows["swiperimage"]; ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </section>


    <!-- Services Section -->

    <!-- <section class="service" id="service">
        <div class="title">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tbservice where adminid='5'");
            foreach ($rows as $rows) :
            ?>
                <div class="service-box">
                    <i class="<?php echo $rows["icons"]; ?>"></i>
                    <h3><?php echo $rows["servicename"]; ?></h3>
                    <p><?php echo $rows["servicedesc"]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </section> -->

    <section class="service" id="service">
        <div class="title">
            <h1>Our <span>Services</span> </h1>
        </div>
        <div class="service-container">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tbservice where adminid='5'");
            foreach ($rows as $rows) :
            ?>
                <div class="service-box"><?php
                                            echo "<i class='" . $rows['icon'] . "'></i> "; ?>
                    <h3><?php echo $rows["servicename"]; ?></h3>
                    <p><?php echo $rows["servicedesc"]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        </div>

    </section>

    <!-- section end -->

    <section class="gallery" id="gallery">
        <div class="gallery-title">
            <h2>Our Celebration</h2>
        </div>
        <div class="gallery-container">
            <div class="gallery-box">
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM images where admin_id='5' limit 8");
                foreach ($rows as $rows) :
                ?>
                    <div class=" gallery-row">
                        <img src="../../admin/pages/images/uploads/<?php echo $rows['images']; ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>













    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="js/script.js"></script>


</body>

</html>