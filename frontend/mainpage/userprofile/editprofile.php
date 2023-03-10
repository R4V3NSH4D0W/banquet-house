<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM user where id=$user_id");
$fetch = mysqli_fetch_assoc($result);
$profileselect = mysqli_query($conn, "SELECT profile from profile where user_id=$user_id");
$proflieresult = mysqli_fetch_assoc($profileselect);
?>

<body>
    <div class="container">
        <button class="go-back" onclick="location.href='../index.php'"><i class="fa-solid fa-arrow-left"></i></button>
        <div class="image-container">
            <?php
      if (empty($proflieresult['profile'])) {
      ?>
            <img src="../../../profileimage/profile.png" alt="Profile Image">
            <?php
      } else {
      ?>
            <img src="../../../profileimage/<?php echo $proflieresult['profile'] ?>" alt="Profile Image">
            <?php
      }
      ?>
        </div>
        <div class="info-container">
            <h2><?php echo $fetch['name']; ?></h2>
            <p><?php echo $fetch['email']; ?></p>
        </div>
        <div class="upload-container">
            <form id="my-form">
                <div class="form-row">
                    <input type="file" id="profile-image" name="profile-image" placeholder="Profile image">
                    <input type="text" id="name" name="name" placeholder="User Name">
                </div>
                <div class="form-row">
                    <input type="password" id="old-password" name="old-password" placeholder="Enter Old Passowrd">
                    <input type="password" id="new-password" name="new-password" placeholder="Enter New Password">
                </div>
                <div class="form-row">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                </div>
                <div class="form-row">
                    <button type="submit" style="margin-top: 20px;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
const form = document.querySelector('#my-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'sendprofiledata.php');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (xhr.responseText === 'Old password is incorrectNo fields have been updated') {
                    swal({
                        title: "Error",
                        text: xhr.responseText,
                        icon: "error",
                        buttons: "OK",
                        className: "custom-alert-box",
                    });
                } else if (xhr.responseText ===
                    'Confirm Password does not matchNo fields have been updated') {
                    swal({
                        title: "Error",
                        text: xhr.responseText,
                        icon: "error",
                        buttons: "OK",
                        className: "custom-alert-box",
                    });
                } else {
                    swal({
                        title: "Success",
                        text: xhr.responseText,
                        icon: "success",
                        buttons: "OK",
                        className: "custom-alert-box",
                    }).then(() => {
                        location.reload();
                    });
                }
            }
        }
    }
    console.log(formData);
    xhr.send(formData);
});
</script>

</html>