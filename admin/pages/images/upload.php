<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];
$file = $_FILES['file'];

$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if (in_array($fileActualExt, $allowed)) {
  if ($fileError === 0) {
    if ($fileSize < 100000000) {
      $fileNameNew = uniqid('', true) . "." . $fileActualExt;
      $fileDestination = 'uploads/' . $fileNameNew;
      move_uploaded_file($fileTmpName, $fileDestination);

      $sql = "INSERT INTO images  VALUES ('', '$fileNameNew', '$admin_id')";

      if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "File is too big.";
    }
  } else {
    echo "There was an error uploading your file.";
  }
} else {
  echo "You cannot upload files of this type.";
}

$conn->close();
