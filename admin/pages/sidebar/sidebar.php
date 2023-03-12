<?php
$admin_id = $_SESSION['admin_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE id = $admin_id"));
?>
<div class="logo-details">
    <i class='bx bxl-xing bx-flip-horizontal' style='color:#e01111'></i>

    <span class="logo_name"><?php echo $user["name"] ?></span>
</div>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <span class="link_name">Packages</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Package Manager</a></li>
            <li><a href="../PackageManager/addpackage.php">Add Packages</a></li>
            <li><a href="../PackageManager/managepackage.php">Manage Packages</a></li>

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
                <i class='bx bx-bookmarks'></i>
                <span class="link_name">Booking</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Booking</a></li>
            <li><a href="../Booking/pendingbooking.php">New Booking</a></li>
            <li><a href="../Booking/approvedbooking.php">Approved Booking</a></li>
            <li><a href="../Booking/cancelledbooking.php">Cancelled booking</a></li>
            <li><a href="../Booking/newbooking.php">All booking</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-bowl-hot'></i>
                <span class="link_name">Food</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Food</a></li>
            <li><a href="../Food/addfood.php">Add food</a></li>
            <li><a href="../Food/view.php">View</a></li>

        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a href="#">
                <i class='bx bx-question-mark'></i>
                <span class="link_name">Queries</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Queries</a></li>
            <li><a href="../queries/newqueries.php">Unread queries</a></li>
            <li><a href="#">read quries</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bxs-calendar-event'></i>
            <span class="link_name">Event</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="../calender/index.php">Event</a></li>
        </ul>
    </li>
    <!-- <li>
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