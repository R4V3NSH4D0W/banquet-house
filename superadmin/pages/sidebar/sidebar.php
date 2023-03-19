<?php
$super_id = $_SESSION['super_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE id = $super_id"));
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css"
    integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="logo-details">
    <i class='bx bxl-xing bx-flip-horizontal' style='color:#e01111'></i>

    <span class="logo_name"><?php echo $user["name"] ?></span>
</div>
<ul class="nav-links">
    <li>
        <a href="#">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="../dashboard/index.php">Dashboard</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="">
                <i class='bx bx-collection'></i>
                <span class="link_name">Application</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name">banquets</a></li>
            <li><a href="../request/request.php">Banquet Status</a></li>
            <li><a href="../pending/index.php">Requests</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-book-alt'></i>
                <span class="link_name">Packages</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Package Manager</a></li>
            <li><a href="">Add Packages</a></li>
            <li><a href="">Manage Packages</a></li>

        </ul>
    </li>
    <!-- <li>
        <div class="iocn-link">
            <a href="">
                <i class='bx bx-images'></i>
                <span class="link_name">Images</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name">Images</a></li>
            <li><a href="../featuredimage/fimages.php">Featured Images</a></li>
            <li><a href="../images/images.php">Gallary</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-book-open'></i>
                <span class="link_name">Pages</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Pages</a></li>
            <li><a href="../aboutus&contactus/aboutus.php">About us</a></li>
            <li><a href="../aboutus&contactus/contactus.php">Contact us</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-book-alt'></i>
                <span class="link_name">Booking</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Booking</a></li>
            <li><a href="../Booking/newbooking.php">New Booking</a></li>
            <li><a href="#">Approved Booking</a></li>
            <li><a href="#">Cancelled booking</a></li>
            <li><a href="#">All booking</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-plug'></i>
                <span class="link_name">Queries</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Queries</a></li>
            <li><a href="#">Unread queries</a></li>
            <li><a href="#">read quries</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bxs-map'></i>
            <span class="link_name">Map</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="../Map/index.php">Map</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bx-cog'></i>
            <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Setting</a></li>
        </ul>
    </li> -->
    <li>
        <div class="profile-details">
            <div class="profile-content">
                <!--<img src="image/profile.jpg" alt="profileImg">-->
            </div>
            <div class="name-job">
                <div class="profile_name">Logout</div>
                <!-- <div class="job">Desginer</div> -->
            </div>
            <a href="../services/logout.php"> <i class='bx bx-log-out'></i></a>
        </div>
    </li>
</ul>