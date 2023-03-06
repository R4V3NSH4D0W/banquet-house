<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$q = $conn->real_escape_string($_GET["q"]);

$sql = "SELECT *
FROM map
JOIN banquet
ON map.admin_id = banquet.admin_id WHERE banquet.banquetname LIKE '%$q%' OR map.address LIKE '%$q%'";
$result = mysqli_query($conn, $sql);
?>

<h1 class="heading">
    <span>R</span>
    <span>E</span>
    <span>S</span>
    <span>U</span>
    <span>L</span>
    <span>T</span>
</h1>
<div class="box-container">
    <?php
    if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            if ($rows['status'] !== 'pending' && $rows['status'] !== 'deactive') {
                $address_parts = explode(',', $rows['address']);
                $address = trim($address_parts[0]);
    ?>
                <div class="box">
                    <img src="../../user-admin/uploads/<?php echo $rows["image"]; ?>" alt="">
                    <div class="content">
                        <h3><?php echo $rows["banquetname"]; ?> <p><?php echo $rows["capacity"]; ?> Guests</p>
                            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $address; ?></h3>
                            <p><?php echo $rows["details"]; ?></p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>

                            <a href="../landingpage/home.php?page_id=<?php echo $rows["admin_id"]; ?>" class="btn">View More</a>

                    </div>
                </div>
        <?php
            }
        }
    } else {
        ?>
        <img style="padding-left:32rem;" src="./images/errorresult.png">
    <?php
    }
    ?>
</div>