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
    <link rel="stylesheet" href="style.css">

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
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" onclick="search()" class="fas fa-search"></label>
        </form>

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

    <section class="home" id="home">

        <div class="content">
            <h3>THE BANQUET HOUSE</h3>
            <p>Where every occasion becomes a cherished memory</p>
            <a href="#" class="btn">discover more</a>
        </div> -->

        <div class="controls">
            <span class="vid-btn active" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-1.mp4"></span>
            <!-- <span class="vid-btn" data-src="images/vid-3.mp4"></span> -->
            <!-- <span class="vid-btn" data-src="images/vid-4.mp4"></span> 
            <span class="vid-btn" data-src="images/vid-5.mp4"></span> -->
        </div>

        <div class="video-container">
            <video src="images/vid-2.mp4" id="video-slider" loop autoplay muted></video>
        </div>

    </section>

    <!-- home section ends -->

    <!-- book section starts  -->

    <!-- <section class="book" id="book">

        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>

            <form action="">
                <div class="inputBox">
                    <h3>where to</h3>
                    <input type="text" placeholder="place name">
                </div>
                <div class="inputBox">
                    <h3>how many</h3>
                    <input type="number" placeholder="number of guests">
                </div>
                <div class="inputBox">
                    <h3>arrivals</h3>
                    <input type="date">
                </div>
                <div class="inputBox">
                    <h3>leaving</h3>
                    <input type="date">
                </div>
                <input type="submit" class="btn" value="book now">
            </form>

        </div>

    </section> -->

    <!-- book section ends -->
    <section class="packages" id="packages">
        <div id="search-results"></div>
    </section>
    <!-- packages section starts  -->
    <section class="packages" id="packages">
        <div id="banquets"></div>
    </section>
    <!-- collection section -->

    <section class="packages" id="packages">

        <h1 class="heading">
            <span>T</span>
            <span>O</span>
            <span>P</span>
            <span class="space"></span>
            <span>L</span>
            <span>O</span>
            <span>C</span>
            <span>A</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
        </h1>
        <div class="image-collection">
            <div class="image-item">
                <img src="./uploads/Kathmandu.jpg" alt="Image 1">
                <div class="image-text">
                    <h3>KATHMANDU</h3>
                    <!-- <p>Image 1 description goes here</p> -->
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63df75b8abb864.08054382.jpg" alt="Image 2">
                <div class="image-text">
                    <h3>POKHARA</h3>
                    <!-- <p>Image 2 description goes here</p> -->
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63f784bfe1a3e0.12268603.jpg" alt="Image 3">
                <div class="image-text">
                    <h3>DHANKUTA</h3>
                    <!-- <p>Image 3 description goes here</p> -->
                </div>
            </div>
            <!-- add more image items here -->
        </div>


    </section>
    <!-- collection section end here -->

    <section class="packages" id="packages">

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
            $rows = mysqli_query($conn, "SELECT *
            FROM map
            JOIN banquet
            ON map.admin_id = banquet.admin_id;");

            foreach ($rows as $rows) :
                $address_parts = explode(',', $rows['address']);
                $address = trim($address_parts[0]);
            ?>
            <div class="box">
                <img src="./uploads/<?php echo $rows["image"]; ?>" alt="">
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
                    <a href="../landingpage/home.php?page_id=<?php echo $rows["admin_id"]; ?>" class="btn">View More</a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </section>
    <section class="Location" id="location">
        <h1 class="heading">
            <span>L</span>
            <span>O</span>
            <span>C</span>
            <span>A</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
            <span>S</span>
        </h1>
        <div id="map" style="height: 500px;"></div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>