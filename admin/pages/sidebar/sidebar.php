<?php
$admin_id = $_SESSION['admin_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE id = $admin_id"));
?>
<div class="logo-details">
    <i class='bx bxl-c-plus-plus'></i>
    <span class="logo_name"><?php echo $user["name"] ?></span>
</div>
<ul class="nav-links">
    <li>
        <a href="#">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Category</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="">
                <i class='bx bx-collection'></i>
                <span class="link_name">Services</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name">Services</a></li>
            <li><a href="../services/addservice.php">Add services</a></li>
            <li><a href="../services/manageservice.php">Manage services</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-book-alt'></i>
                <span class="link_name">Events</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Events</a></li>
            <li><a href="#">Add event type</a></li>
            <li><a href="#">Manage event type</a></li>

        </ul>
    </li>
    <li>
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
            <li><a href="../Booking/Newbooking/newbooking.php">New Booking</a></li>
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
            <i class='bx bx-history'></i>
            <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">History</a></li>
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
    </li>
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