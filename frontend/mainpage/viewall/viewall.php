<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>near by </title>

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
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="../index.php" class="logo"><span>BANQUET</span>HOUSE</a>

        <nav class="navbar">
            <!-- <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a> -->
        </nav>

        <!-- <div class="icons">
            <i class="fas fa-user" id="login-btn"></i>
        </div> -->

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
            <span>N</span>
            <span>E</span>
            <span>A</span>
            <span>R</span>
            <span class="space"></span>
            <span>Y</span>
            <span>O</span>
            <span>U</span>
        </h1>
        <div id="banquets"></div>

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

<!-- custom js file link  -->
<script src="../script.js"></script>
<script>
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showBanquets);
} else {
    alert("Geolocation is not supported by this browser.");
}

function showBanquets(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("banquets").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "function.php?lat=" + lat + "&lng=" + lng, true);
    xmlhttp.send();
}
</script>

</html>