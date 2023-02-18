<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$user_id = $_SESSION['user_id'];
$id = $_GET['page_id'];
if (!isset($user_id)) {
  header('location:../../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form id="booking-form">
        <input type="hidden" name="page_id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="booking-from">Booking From:</label>
            <input type="date" id="booking-from" name="booking-from" required>
        </div>
        <div class="form-group">
            <label for="booking-to">Booking To:</label>
            <input type="date" id="booking-to" name="booking-to" required>
        </div>
        <div class="form-group">
            <label for="numer-of-guest">Number of Guests:</label>
            <input type="number" id="guest" name="guest" required>
        </div>
        <div class="form-group">
            <label for="event-type">Type of Services:</label>
            <select name="services[]" multiple>
                <?php
        $result = mysqli_query($conn, "select * from tbservice where adminid='$id'");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["id"] . '">' . $row["servicename"] . '</option>';
          }
        } else {
          echo '<option value="">No services found</option>';
        }
        ?>
            </select>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit" id="submit-btn">Submit</button>
    </form>
    <div class="image-container">
        <img src="./image/wallhaven-495o38.jpg" alt="Image Description">
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#booking-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "insertbooking.php",
            data: $('#booking-form').serialize(),
            success: function(response) {
                alert(response);
            }
        });
    });
});
</script>

</html>