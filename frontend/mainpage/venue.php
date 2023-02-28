<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive tour and travel agency website design tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"></script>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./style.css">

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
            <span>V</span>
            <span>E</span>
            <span>n</span>
            <span>u</span>
            <span>e</span>
        </h1>
        <div class="box-container">
            <?php
            $type = mysqli_real_escape_string($conn, $_GET['type']);
            $rows_per_page = 9;

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $start = ($page - 1) * $rows_per_page;
            $query = "SELECT * FROM map JOIN banquet ON map.admin_id = banquet.admin_id WHERE banquet.status = 'active' AND banquet.type = '$type'";
            $rows = mysqli_query($conn, $query);
            $total_rows = mysqli_query($conn, "SELECT COUNT(*) as total FROM map JOIN banquet ON map.admin_id = banquet.admin_id WHERE banquet.status = 'active' AND banquet.type = '$type'");
            $total_rows = mysqli_fetch_assoc($total_rows)['total'];
            $total_pages = ceil($total_rows / $rows_per_page);
            $count = mysqli_num_rows($rows);
            if ($count > 0) {
                foreach ($rows as $rows) :
                    if ($rows['status'] !== 'pending' && $rows['status'] !== 'deactive') {

                        $address_parts = explode(',', $rows['address']);
                        $address = trim($address_parts[0]);
            ?>
            <div class="box">
                <img src="../../user-admin/uploads/<?php echo $rows["image"]; ?>" alt="">
                <div class="content">
                    <h3><?php echo $rows["banquetname"]; ?> <p><?php echo $rows["capacity"]; ?> Guests</p>
                    </h3>

                    <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                    <p><?php echo $rows["details"]; ?></p>

                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <!-- <div class="price"> $90.00 <span>$120.00</span> </div> -->
                    <a href="../../landingpage/home.php?page_id=<?php echo $rows["admin_id"]; ?>" class="btn">View
                        More</a>
                </div>
            </div>
            <?php
                    }

                endforeach;
            } else {
                ?>
            <img style="padding-left:32rem;" src="./images/errorresult.png">

            <?php
            }
            ?>
        </div>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?type=<?php echo $type; ?>&page=<?php echo $i; ?>&rows_per_page=<?php echo $rows_per_page; ?>"
                <?php if ($page == $i) : ?> class="active" <?php endif; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </section>
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