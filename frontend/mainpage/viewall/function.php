<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Check if the user has granted permission to access their device's location
if (isset($_GET['lat']) && isset($_GET['lng'])) {
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    // Execute a query to select the banquet house locations from the map table
    $sql = "SELECT *, 
    (3959 * acos(cos(radians($lat)) * cos(radians(m.lat)) * cos(radians(m.lng) - radians($lng)) + sin(radians($lat)) * sin(radians(m.lat)))) AS distance 
FROM map m
JOIN banquet b  ON m.admin_id = b.admin_id 
HAVING distance < 10 
ORDER BY distance 
LIMIT 0, 20;
";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    // Check if there are any results
    if ($count > 0) {
?>
        <div class="box-container">
            <?php
            // Output the banquet house locations within a certain range
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['status'] != 'active') continue;

                $address_parts = explode(',', $row['address']);
                $address = trim($address_parts[0]);
            ?>
                <div class="box">
                    <img src="../../../user-admin/uploads/<?php echo $row["image"]; ?>" alt="">
                    <div class="content">
                        <h3><?php echo $row["banquetname"]; ?> <p><?php echo $row["capacity"]; ?> Guests</p>
                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                            <p><?php echo $row["details"]; ?></p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <a href="../../landingpage/home.php?page_id=<?php echo $row["admin_id"]; ?>" class="btn">View More</a>

                    </div>
                </div>
    <?php
                // echo "<b>" . $row["address"] . "<br>Latitude: " . $row["banquetname"] . " Longitude: " . $row["lng"] . "<br><br>";
            }
        }
    }

    // Close the connection
    mysqli_close($conn);