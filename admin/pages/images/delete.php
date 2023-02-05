<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

// Get the file name
$file = $_POST['file'];

// Delete image from database
$sql = "DELETE FROM images WHERE images = '$file'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Delete image file
    $file_path = "uploads/" . $file;
    if (unlink($file_path)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file.";
    }
} else {
    echo "Error deleting image from database.";
}
