<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banquets</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"></script>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>BANQUET</span>HOUSE</a>

        <nav class="navbar">
            <!-- <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a> -->
        </nav>

        <div class="icons">
            <!-- <i class="fas fa-search" id="search-btn"></i> -->
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <!-- <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" onclick="search()" class="fas fa-search"></label>
        </form> -->

    </header>

    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <!-- <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form> -->

    </div>

    <!-- home section starts  -->
    <section class="packages" id="packages">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="heading">
            <span>B</span>
            <span>a</span>
            <span>n</span>
            <span>q</span>
            <span>u</span>
            <span>e</span>
            <span>t</span>
            <span>s</span>
        </h1>
        <div class="box-container">
            <?php
            $rows_per_page = 9;

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $start = ($page - 1) * $rows_per_page;
            $rows = mysqli_query($conn, "SELECT *
            FROM map
            JOIN banquet ON map.admin_id = banquet.admin_id 
            WHERE banquet.status = 'active' 
            LIMIT $start, $rows_per_page;");
            $total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM map
            JOIN banquet ON map.admin_id = banquet.admin_id
            WHERE banquet.status = 'active'");
            $total_rows = mysqli_fetch_assoc($total_rows)['total'];
            $total_pages = ceil($total_rows / $rows_per_page);
            foreach ($rows as $row) :
                if ($row['status'] !== 'pending' && $row['status'] !== 'deactive') {

                    $address_parts = explode(',', $row['address']);
                    $address = trim($address_parts[0]);

                    // Query to get the average rating for the current banquet
                    $avg_rating_query = mysqli_query($conn, "SELECT AVG(rating) as average_rating FROM review WHERE admin_id = '{$row['admin_id']}'");
                    $avg_rating = mysqli_fetch_assoc($avg_rating_query)['average_rating'];
            ?>
                    <div class="box">
                        <img src="../../../user-admin/uploads/<?php echo $row["image"]; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row["banquetname"]; ?> <p><?php echo $row["capacity"]; ?> Guests</p>
                            </h3>

                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                            <p><?php echo $row["details"]; ?></p>

                            <div class="stars">
                                <?php
                                // Show average rating as stars
                                $full_stars = floor($avg_rating);
                                $half_star = round($avg_rating - $full_stars, 1);
                                $empty_stars = 5 - $full_stars - $half_star;
                                for ($i = 0; $i < $full_stars; $i++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                                if ($half_star == 0.5) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                }
                                for ($i = 0; $i < $empty_stars; $i++) {
                                    echo '<i class="far fa-star"></i>';
                                }
                                ?>
                            </div>
                            <a href="../../landingpage/home.php?page_id=<?php echo $row["admin_id"]; ?>" class="btn">View
                                More</a>
                        </div>
                    </div>
            <?php
                }

            endforeach;
            ?>


    </section>
    <div class="pagination" style="margin-left:13rem; margin-bottom:10rem;">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>&rows_per_page=<?php echo $rows_per_page; ?>" <?php if ($page == $i) : ?> class="active" <?php endif; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <!-- footer section -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur adipisci expedita, est facilis
                    nisi qui facere nesciunt laudantium quibusdam, repellat nihil, nulla dolorem saepe debitis
                    reiciendis incidunt. Labore, autem praesentium.</p>
            </div>
            <div class="box">
                <h3>Avilabe Locations</h3>
                <a href="#">Kathmandu</a>
                <a href="#">Pokhara</a>
                <a href="#">Dharan</a>
                <a href="#">Dhankuta</a>

            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">Kathmandu</a>
                <a href="#">Pokhara</a>
                <a href="#">Dharan</a>
                <a href="#">Dhankuta</a>

            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">Twitter</a>
                <a href="#">github</a>

            </div>
        </div>
        <h1 class="credit">created by<span> Team GOF</span> | all right reserved !</h1>
    </section>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</html>