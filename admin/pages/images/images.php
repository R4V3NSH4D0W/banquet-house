<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/login.php');
}

if (isset($_POST['upload'])) {
    $file = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $filesize = $_FILES['image']['size'];
    $fileerror = $_FILES['image']['error'];
    $filetype = $_FILES['image']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 2000000) {
                $filenamenew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $filenamenew;
                move_uploaded_file($file_tmp_name, $fileDestination);
                $query = "INSERT INTO images values('','$filenamenew','$admin_id')";
                if (mysqli_query($conn, $query)) {
                    echo "<script> alert('new image uploaded'); </script>";
                }
            } else {
                echo "file is to big";
            }
        } else {
            echo "There was an error uplading an file";
        }
    } else {
        echo "you can not upload file of this type!";
    }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../sidebar/style.css">
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

</head>

<body>
    <div class="sidebar close">
        <?php
        include '../sidebar/sidebar.php';
        ?>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Admin Dashboard</span>
        </div>
        <!-- upload image section -->
        <label for="images" class="drop-container">
            <span class="drop-title">Drop files here</span>
            or
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <input type="submit" value="upload" class="upload" name="upload" class="btn">
            </form>
        </label>
        <h1>Uploaded Images</h1>
        <div class="image-wrapper">
            <?php
            $row = mysqli_query($conn, "SELECT * FROM images where admin_id='$admin_id'");
            $i = 1;
            ?>
            <?php foreach ($row as $row) : ?>
            <div class="media">
                <div class="overlay"></div>
                <img src="uploads/<?php echo $row['images']; ?>" alt="">
                <div class="image-details">
                    <a href="images.php?delete=<?php echo $row['id']; ?>"
                        onclick="return confirm('delete this image');">
                        <p><i class='bx bx-trash'></i></p>
                    </a>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </section>
    <?php require 'script.php'; ?>
    <script src="../sidebar/script.js">
    </script>
</body>

</html>