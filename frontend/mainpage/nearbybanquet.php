<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Check if the user has granted permission to access their device's location
if (isset($_GET['lat']) && isset($_GET['lng'])) {
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    // Execute a query to select the banquet house locations from the map table
    $sql = "SELECT m.*, b.*, AVG(r.rating) AS average_rating,
    (3959 * acos(cos(radians($lat)) * cos(radians(m.lat)) * cos(radians(m.lng) - radians($lng)) + sin(radians($lat)) * sin(radians(m.lat)))) AS distance 
FROM map m
JOIN banquet b ON m.admin_id = b.admin_id 
LEFT JOIN review r ON m.admin_id = r.admin_id
WHERE b.status = 'active'
GROUP BY m.admin_id
HAVING distance < 5
ORDER BY distance
LIMIT 0, 20;";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
?>
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
<div class="box-container">
    <?php
            // Output the banquet house locations within a certain range
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['status'] !== 'pending' && $row['status'] !== 'deactive') {
                    if ($i >= 3) {
                        break;
                    }
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
                                for ($j = 0; $j < $full_stars; $j++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                                if ($half_star == 0.5) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                }
                                for ($j = 0; $j < $empty_stars; $j++) {
                                    echo '<i class="far fa-star"></i>';
                                }
                                ?>

            </div>
            <a href="../landingpage/home.php?page_id=<?php echo $row["admin_id"]; ?>" class="btn">View More</a>
        </div>
    </div>
    <?php
                    $i++;
                }
            }
        }
    }
    if ($count > 3) {
        ?>
    <button class="view-more" onclick="location.href='./viewall/viewall.php';">View All</button>
    <?php
    }

    ?>