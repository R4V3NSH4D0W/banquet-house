<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$id = $_GET["page_id"];
if (!empty($_SESSION['user_id']))
    $user_id = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- css linked -->
    <link rel="stylesheet" href="css/teststyle.css">
    <link rel="stylesheet" href="css/reviewstye.css">
</head>

<body>
    <!-- Navigation Section Start -->
    <header class="navbar">
        <?php
        $result = mysqli_query($conn, "SELECT banquetname FROM banquet where admin_id='$id'");
        $name = mysqli_fetch_assoc($result);
        ?>
        <a href="#home"> <label id="owner"
                style="color: white; text-align: justify; font-weight: bold; white-space: nowrap; cursor: pointer; text-transform: capitalize;">
                <?php echo strtoupper($name['banquetname']); ?></a>
        </label>


        <!-- <img src="img/logo.png" alt="" class="logo"> -->
        <ul>
            <li><a href="../mainpage/index.php">Home</a></li>
            <li><a href="#aboutus">AboutUs</a></li>
            <li><a href="#service">services</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#review">Review</a></li>
            <li><a href="#contactus">Contact us</a></li>

        </ul>
        <!-- <img src="img/user.png" alt="" class="user-pic"> -->
    </header>
    <br>
    <br>
    <section class="header">
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
            <?php
            $aboutus = mysqli_query($conn, "SELECT description FROM `about us` where admin_id=$id");
            $aboutusresult = mysqli_fetch_assoc($aboutus);
            ?>

            <p class="text">
                <?php
                if (empty($aboutusresult)) {
                    echo 'This page has nothing to say currently. 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Inventore rerum veritatis eaque aut minima. 
                Ducimus laudantium sapiente fuga officiis assumenda iure voluptas est saepe incidunt ut velit labore,
                 ipsum repudiandae.
                ';
                } else {
                    echo $aboutusresult['description'];
                }

                ?>
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
            <h2>Our <span style="color:blue;">Gallery<span></h2>
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



    </section>
    <div id="custom-booking-container">
        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
        <button onclick="redirectToBooking()" class="custom-booking">Custom Booking</button>
        <?php
        } else {
        ?>
        <button onclick="showLoginPrompt()" class="custom-booking">Custom Booking</button>
        <?php
        }
        ?>
    </div>

    <script>
    function showLoginPrompt() {
        swal({
            title: 'Oops!',
            text: 'You need to login to access this feature.',
            icon: 'error',
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }
        }).then(function(result) {
            if (result) {
                redirectToLogin();
            }
        });
    }

    function redirectToLogin() {
        window.location.href = "http://localhost/banquethouses/login/";
    }

    function redirectToBooking() {
        const pageId =
            <?php echo isset($_GET['page_id']) ? $_GET['page_id'] : '1'; ?>;
        const url =
            `http://localhost/banquethouses/frontend/userbooking/booking.php?page_id=${pageId}`;
        window.location.href = url;
    }
    </script>
    <!-- pricing section ends here -->

    <!-- review section stats here -->
    <section class="review" id="review">
        <div class="review-title">
            <h3>Client's <span>Review</span> </h3>
        </div>
        <div class="swiper review-slider">
            <div class="swiper-wrapper review-wrapper">
                <?php
                $result = mysqli_query($conn, "SELECT user.name,review.user_id, review.comment, review.rating
                FROM review 
                JOIN user ON review.user_id = user.id  
                WHERE review.admin_id = $id
                ");
                while ($row = mysqli_fetch_assoc($result)) :
                    $profile_id = $row['user_id'];
                    $profileresult = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM profile where user_id=$profile_id"));
                ?>
                <div class="swiper-slide box">
                    <?php
                        if (empty($profileresult['profile'])) {
                        ?>
                    <img src="../../profileimage/no-user-profile-picture-24185395.jpg">
                    <?php
                        } else {

                        ?>
                    <img src="../../profileimage/<?php echo $profileresult['profile']; ?>">
                    <?php
                        }

                        ?>

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
    <section class="service" id="contactus">
        <div class="title">
            <h1>Contact <span>Us</span> </h1>
        </div>
    </section>
    <!-- contact us section starts here -->
    <div class="contact-us-section">
        <div class="form-container">
            <form class="contact-field">
                <div class="form-group">

                    <?php
                    if (!empty($user_id)) {
                        $userinfo = mysqli_query($conn, "SELECT * FROM user where id=$user_id ");
                        $userresult = mysqli_fetch_assoc($userinfo);
                    }
                    if (empty($user_id)) {
                    ?>
                    <input type="text" id="name" name="name" placeholder="Enter Your Name">
                    <?php
                    } else {
                    ?>
                    <input type="text" id="name" name="name" placeholder="Enter Your Name"
                        value="<?php echo strtolower($userresult['name']); ?>">
                    <?php
                    } ?>
                </div>
                <div class="form-group">
                    <?php if (empty($user_id)) { ?>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email">
                    <?php } else { ?>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email"
                        value="<?php echo $userresult['email']; ?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" require>
                </div>
                <div class="form-group">
                    <textarea id="text-message" name="message" placeholder="Your message .." required></textarea>
                </div>
                <input type="hidden" id="page-id" name="page_id" value="YOUR_PAGE_ID">
                <button type="submit" id="bird"><i class="fa-sharp fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
        <div class="map-container" id="map">
        </div>
    </div>


    <!-- contact us section ends here -->

    <!-- footer section starts here -->
    <footer>
        <?php
        $contactus = mysqli_query($conn, "SELECT * FROM contactus 
       Where admin_id = $id;");
        $contactusresult = mysqli_fetch_assoc($contactus);
        ?>
        <div class="contact-info">
            <h4>Contact Us</h4>
            <?php
            $mapaddress = mysqli_query($conn, "SELECT * FROM map where admin_id=$id");
            $addressresult = mysqli_fetch_assoc($mapaddress);
            ?>
            <p><?php if (empty($addressresult['address'])) {
                    echo 'Address not yet added';
                } else {
                    $words = explode(",", $addressresult['address']);
                    $words = array_filter($words, function ($word) {
                        return strcasecmp(trim($word), "Undefined") !== 0;
                    });
                    $address = implode(", ", $words);
                    echo $address;
                }
                ?><br>Phone: <?php
                                if (empty($contactusresult['number'])) {
                                    echo "+977 9800000001";
                                } else {
                                    echo $contactusresult['number'];
                                }
                                ?><br>Email: <?php
                                                if (empty($contactusresult['email'])) {
                                                    echo 'Nogmailyet@gmail.com';
                                                } else {
                                                    echo $contactusresult['email'];
                                                }
                                                ?></p>
        </div>
        <div class="social-media">
            <h4>Follow Us</h4>
            <ul>
                <li><a href="https://www.facebook.com/banquethouse"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/banquethouse"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/banquethouse"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
        <div class="hours">
            <h4>Hours of Operation</h4>
            <p>Monday - Friday: 9:00am - 5:00pm<br>Saturday - Sunday: Closed</p>
        </div>
        <div class="copy-right">
            <hr>
            <p>&copy; 2023 GoFFy Guys. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- footer section ends here -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- link js -->
    <script src="js/script.js"></script>
    <script src="js/review.js"></script>
    <script>
    var map = L.map("map").setView([27.7172, 85.324], 15);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1,
    }).addTo(map);

    var marker;
    var pageurl = window.location.href;
    var pageurlparts = pageurl.split("?");
    var pageParams = new URLSearchParams(pageurlparts[1]);
    var pageNO = pageParams.get('page_id');
    var url = "get_locations.php?page_id=" + encodeURIComponent(pageNO);
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            var location = JSON.parse(xhr.responseText);
            var latitude = location.latitude;
            var longitude = location.longitude;
            var name = location.name;
            map.setView([latitude, longitude], 14);
            L.marker([latitude, longitude]).addTo(map).bindPopup(name).openPopup();
        }
    };
    xhr.send();
    //send contact us form
    const form = document.querySelector('.contact-field');
    const submitButton = document.querySelector('#bird');
    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        const nameInput = document.querySelector('#name');
        const emailInput = document.querySelector('#email');
        const phoneInput = document.querySelector('#phone');
        const messageInput = document.querySelector('#text-message');

        if (!nameInput.value || !emailInput.value || !phoneInput.value || !messageInput.value) {
            swal({
                title: "Error",
                text: "Please fill in all fields!",
                icon: "error",
                button: "OK",
            });
            return;
        }

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST',
            'http://localhost/banquethouses/frontend/landingpage/functions/sendmessage.php?page_id=' +
            encodeURIComponent(pageNO));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    swal({
                        title: "Success",
                        text: "Form submitted successfully!",
                        icon: "success",
                        button: "OK",
                    });
                    form.reset();
                } else {
                    swal({
                        title: "Error",
                        text: "Form submission failed: " + xhr.statusText,
                        icon: "error",
                        button: "OK",
                    });
                }
            }

        };

        const params = new URLSearchParams(formData);
        xhr.send(params.toString());
    });
    </script>

</body>

</html>