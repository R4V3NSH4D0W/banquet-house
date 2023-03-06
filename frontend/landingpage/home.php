<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$id = $_GET["page_id"];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- css linked -->
    <link rel="stylesheet" href="css/teststyle.css">
    <link rel="stylesheet" href="css/reviewstye.css">
</head>

<body>
    <!-- Navigation Section Start -->

    <section class="header">
        <div class="navbar">
            <?php
            $result = mysqli_query($conn, "SELECT banquetname FROM banquet where admin_id='$id'");
            $name = mysqli_fetch_assoc($result);
            ?>
            <label
                style="color: white; text-align: justify; font-weight: bold; white-space: nowrap; cursor: pointer; text-transform: capitalize;">
                <?php echo strtoupper($name['banquetname']); ?>
            </label>


            <!-- <img src="img/logo.png" alt="" class="logo"> -->
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#aboutus">AboutUs</a></li>
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
                <h1 style="text-align:center;">its time to celebrate!<br>the best event organizers</h1>
            </div>

            <!-- slider section starts here -->
            <div class="swiper-container home-slider">
                <div class="swiper-wrapper">
                    <?php
                    $rows = mysqli_query($conn, "SELECT * FROM swiperimage where admin_id='$id'");
                    foreach ($rows as $rows) :
                    ?>
                    <div class="swiper-slide"><img
                            src="../../admin/pages/featuredimage/uploads/<?php echo $rows["swiperimage"]; ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- slider section ends here -->
        </section>
    </section>

    <!-- about section starts here -->
    <section class="service" id="aboutus">
        <div class="title">
            <h1>About <span>Us</span> </h1>
        </div>
    </section>
    <div class="about-section">
        <div class="inner-container">
            <!-- <h1>About Us</h1> -->
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum,
                eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi
                neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
        </div>
    </div>

    <!-- Services Section -->
    <section class="service" id="service">
        <div class="title">
            <h1>Our <span>Services</span> </h1>
        </div>
        <div class="service-container">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM tbservice where adminid='$id'");
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


    <!-- gallary section starts here -->
    <section class="gallery" id="gallery">
        <div class="gallery-title">
            <h2>Our Celebration</h2>
        </div>
        <div class="gallery-container">
            <div class="gallery-box">
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM images where admin_id='$id' limit 8");
                foreach ($rows as $rows) :
                ?>
                <div class=" gallery-row">
                    <img src="../../admin/pages/images/uploads/<?php echo $rows['images']; ?>" alt="">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- gallary section ends here -->
    <!-- pricing section starts here -->
    <section class="pricing" id="pricing">
        <div class="title">
            <h1><span>Pricing</span> For <span>C</span>elebration</h1>
        </div>
        <div class="price-container">
            <?php
            $row = mysqli_query($conn, "SELECT * FROM packages where admin_id='$id' limit 4");
            foreach ($row as $row) :
            ?>
            <div class="price-box">
                <h3 class="price-title"><?php echo $row['packagename']; ?></h3>
                <h3 class="price-amount">NRS <?php echo $row['totalprice']; ?></h3>
                <?php
                    $services = explode(",", $row['services']);
                    foreach ($services as $service) :
                    ?>
                <ul>
                    <li><i class="fas fa-check"></i><?php echo $service; ?></li>
                </ul>
                <?php
                    endforeach;
                    ?>
                <br>
                <a href="#" class="priceBtn">Book Now</a>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="option" style="text-align:center;">
            <!-- <span>OR</span><br> -->
            <a href="../userbooking/booking.php?page_id=<?php echo $id; ?>"
                style="border: 1px solid; margin-top:3rem; margin-bottom:5rem;">custom book</a>
        </div>
    </section>

    <!-- pricing section ends here -->

    <!-- review section stats here -->
    <section class="review" id="review">
        <div class="review-title">
            <h3>Client's <span>Review</span> </h3>
        </div>
        <div class="swiper review-slider">
            <div class="swiper-wrapper review-wrapper">
                <?php
                $result = mysqli_query($conn, "SELECT user.name, review.comment, review.rating FROM review JOIN user ON review.user_id=user.id WHERE review.admin_id=$id");

                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <div class="swiper-slide box">
                    <img src="images/g-1.jpg" alt="">
                    <p>
                        <?php echo $row['comment']; ?>
                    </p>
                    <h3>
                        <?php echo $row['name']; ?>
                    </h3>
                    <div class="stars">
                        <?php
                            if ($row['rating'] == 5) {
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                            } else if ($row['rating'] == 4) {

                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                            } else if ($row['rating'] == 3) {
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                            } else if ($row['rating'] == 2) {
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                            } else {
                                echo '<i class="fas fa-solid fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                                echo ' <i class="fa-sharp fa-regular fa-star"></i>';
                            }

                            ?>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>

    <!-- review section ends here -->
    <!-- add review section -->
    <section id="addreview">
        <button id="add-review-btn">Add Review</button>

        <div id="modal" class="hidden">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form>
                    <h2>Add <span style="color:#007aff;">Review</span></h2>
                    <textarea id="review-body" placeholder="Add your review here ..." name="review-body" maxlength="100"
                        rows="2" style="text-align: center;"></textarea><br>
                    <h3> <label for="review-rating" style="color:#007aff;">Rating</label></h3>
                    <div id="rating-stars">
                        <input type="radio" id="rating-5" value="5" name="rating"><label for="rating-5"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="rating-4" value="4" name="rating"><label for="rating-4"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="rating-3" value="3" name="rating"><label for="rating-3"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="rating-2" value="2" name="rating"><label for="rating-2"><i
                                class="fas fa-star"></i></label>
                        <input type="radio" id="rating-1" value="1" name="rating"><label for="rating-1"><i
                                class="fas fa-star"></i></label>
                    </div>
                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        <div id="overlay" class="hidden"></div>
    </section>
    <!-- add review section ends here -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="js/script.js"></script>
    <script src="js/review.js"></script>



</body>

</html>