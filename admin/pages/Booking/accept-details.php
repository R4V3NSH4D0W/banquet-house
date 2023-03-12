<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
$id = $_GET['id'];
$qry = mysqli_query($conn, "SELECT reservation.*, user.*, reservation.id as reservation_id FROM reservation JOIN user on user.id=reservation.user_id where user_id=$id AND admin_id=$admin_id");

$result = mysqli_fetch_assoc($qry);

?>
<div class="detail">
    <div class="detail-item">
        <span class="detail-label">Reservation ID:</span>
        <span class="detail-value"><?php echo $result['reservation_id'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Reserver:</span>
        <span class="detail-value"><?php echo $result['name'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Email:</span>
        <span class="detail-value"><?php echo $result['email'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Reservation date:</span>
        <span class="detail-value"><?php echo $result['booking-date'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">No of Guests:</span>
        <span class="detail-value"><?php echo $result['guest-count'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Appetizers:</span>
        <span class="detail-value"><?php echo $result['appetizers'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Maincourse:</span>
        <span class="detail-value"><?php echo $result['maincourse'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Hard drinks:</span>
        <span class="detail-value"><?php echo $result['hard-drinks'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Soft drinks:</span>
        <span class="detail-value"><?php echo $result['softdrinks'] ?></span>
    </div>
    <div class="detail-item <?php echo strtolower($result['status']) ?>">
        <span class="detail-label">Status:</span>
        <span class="detail-value"><?php echo $result['status'] ?></span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Total:</span>
        <span class="detail-value"><?php echo $result['total'] ?></span>
    </div>
    <!-- <div class="action-buttons">
        <button id="acceptBtn" onclick="acceptReservation(<?php echo $result['reservation_id'] ?>)">Accept</button>
        <button id="rejectBtn" onclick="rejectReservation(<?php echo $result['reservation_id'] ?>)">Reject</button>
    </div> -->
</div>