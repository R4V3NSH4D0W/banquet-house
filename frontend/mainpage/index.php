<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banquet house</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.1/leaflet.markercluster.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
            <button id="login-btn" style="background: transparent;" onclick="toggleProfileModal()"><i class="fas fa-user"></i></button>

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
            <a href="../mainpage/viewall/allbanquets.php" class="btn">discover more</a>
        </div>

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
    <!-- user profile -->
    <?php if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $profile = mysqli_query($conn, "SELECT * FROM user where id=$user_id");
        $profileresult = mysqli_fetch_assoc($profile);
    ?>
        <div id="profile-modal">
            <div id="profile-modal-content">
                <div id="profile-modal-close">&times;</div>
                <div id="profile-info">
                    <h1>User <span style="color:#007aff;">Profile</span></h1>
                    <img src="./uploads/63df833b805724.66967991.jpg" alt="User Profile Image">
                    <h2><?php echo $profileresult['name'] ?></h2>
                    <a href="logout.php" id="userlogout"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
    <?php }
    ?>
    <!-- user profile ends here -->

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

    <!-- <section class="packages" id="packages">

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
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63df75b8abb864.08054382.jpg" alt="Image 2">
                <div class="image-text">
                    <h3>POKHARA</h3>
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63f784bfe1a3e0.12268603.jpg" alt="Image 3">
                <div class="image-text">
                    <h3>DHANKUTA</h3>
    
                </div>
            </div>
        </div>


    </section> -->
    <!-- collection section end here -->
    <!-- our venu section starts here -->
    <section class="packages" id="packages">

        <h1 class="heading">
            <span>O</span>
            <span>U</span>
            <span>R</span>
            <span class="space"></span>
            <span>V</span>
            <span>E</span>
            <span>N</span>
            <span>U</span>
            <span>E</span>
        </h1>
        <div class="image-collection" id="venue">
            <div class="image-item">
                <img src="./uploads/wedding.jpg" alt="Image 1" onclick="location.href='venue.php?type=wedding';">
                <div class="image-text">
                    <h3>Wedding</h3>
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/conference.jpg" alt="Image 2" onclick="location.href='venue.php?type=conference';">
                <div class="image-text">
                    <h3>Conference</h3>
                    <!-- <p>Image 2 description goes here</p> -->
                </div>
            </div>
            <div class="image-item">
                <img src="./uploads/63f784bfe1a3e0.12268603.jpg" alt="Image 3" onclick="location.href='venue.php?type=other';">
                <div class=" image-text">
                    <h3>Others</h3>
                    <!-- <p>Image 3 description goes here</p> -->
                </div>
            </div>
            <!-- add more image items here -->
        </div>


    </section>
    <!-- our venue section ends here -->


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
            $rows = mysqli_query($conn, "SELECT map.*, banquet.*, AVG(review.rating) as average_rating 
      FROM map
      JOIN banquet ON map.admin_id = banquet.admin_id
      LEFT JOIN review ON map.admin_id = review.admin_id
      WHERE banquet.status = 'active'
      GROUP BY map.admin_id
      ORDER BY map.admin_id
      LIMIT 3;");

            $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM banquet where status='active'"));
            foreach ($rows as $row) :
                if ($row['status'] !== 'pending' && $row['status'] !== 'deactive') {
                    $address_parts = explode(',', $row['address']);
                    $address = trim($address_parts[0]);
            ?>
                    <div class="box">
                        <img src="../../user-admin/uploads/<?php echo $row["image"]; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row["banquetname"]; ?> <p><?php echo $row["capacity"]; ?> Guests</p>
                            </h3>

                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                            <p><?php echo $row["details"]; ?></p>

                            <div class="stars">
                                <?php
                                // Show average rating as stars
                                $avg_rating = $row['average_rating'];
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
                            <!-- <div class="price"> $90.00 <span>$120.00</span> </div> -->
                            <a href="../landingpage/home.php?page_id=<?php echo $row["admin_id"]; ?>" class="btn">View
                                More</a>
                        </div>
                    </div>
                <?php
                }
            endforeach;
            if ($count > 3) {
                ?>
                <button class="view-more" onclick="location.href='./viewall/allbanquets.php';">View All</button>
            <?php
            }
            ?>
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
        <div id="map" style="height: 500px; margin-top: 50px; z-index:0;"></div>
    </section>
    <!-- footer section -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur adipisci expedita, est
                    facilis
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
        <h1 class="credit">created by<span> GoFFy Guys</span> | all right reserved !</h1>
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>
    <script>
        function toggleProfileModal() {
            // Check if the user is logged in
            <?php if (isset($_SESSION['user_id'])) { ?>
                var profileModal = document.getElementById("profile-modal");
                profileModal.style.display = profileModal.style.display === "block" ? "none" : "block";
            <?php } else { ?>
                var confirmLogin = confirm("You need to login to view your profile. Do you want to go to the login page?");
                if (confirmLogin) {
                    window.location.href = "../../login/index.php";
                }
            <?php } ?>
        }
    </script>

</body>

</html>