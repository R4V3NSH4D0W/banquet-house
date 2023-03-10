<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../../login/index.php');
    exit();
}
$food_name = $_POST['food-name'];
$food_description = $_POST['food-description'];
$food_price = $_POST['food-price'];
$food_type = $_POST['type'];

// Get the uploaded file information
$file_name = $_FILES['food-image']['name'];
$file_tmp_name = $_FILES['food-image']['tmp_name'];
$file_size = $_FILES['food-image']['size'];
$file_error = $_FILES['food-image']['error'];

// Check if file was uploaded without errors
if ($file_error === UPLOAD_ERR_OK) {
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_exts = array('jpg', 'jpeg', 'png');

    if (in_array($file_ext, $allowed_exts)) {
        // Generate a unique filename for the uploaded file
        $file_new_name = uniqid('', true) . '.' . $file_ext;
        $file_destination = 'uploads/' . $file_new_name;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($file_tmp_name, $file_destination)) {
            // Insert the food data into the database
            $sql = "INSERT INTO food values('','$food_name','$food_description','$food_price','$food_type','$file_new_name','$admin_id')";
            if (mysqli_query($conn, $sql)) {
                echo "Food added successfully";
            } else {
                echo "Error adding food";
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "Invalid file type. Allowed file types are: " . implode(', ', $allowed_exts);
    }
} else {
    echo "Error uploading file: " . $file_error;
}