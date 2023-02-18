<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
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
            if ($filesize < 200000000) {
                $filenamenew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $filenamenew;
                move_uploaded_file($file_tmp_name, $fileDestination);
                $query = "INSERT INTO banquet values('','$filenamenew','8','KARKAKN')";
                mysqli_query($conn, $query);
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="upload" value="upload">
    </form>

</body>

</html>