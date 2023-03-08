<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

$name = $_POST['name'];
$oldpassword = $_POST['old-password'];
$newpassword = $_POST['new-password'];
$confirmpassword = $_POST['confirm-password'];
$user_id = $_SESSION['user_id'];

$updated_fields = array(); // Keep track of updated fields

if (!empty($name)) {
    $result = mysqli_query($conn, "UPDATE `user` SET name='$name' WHERE id=$user_id");
    $updated_fields[] = 'name';
}

if (!empty($oldpassword)) {
    // First, retrieve the original password hash from the database
    $query = mysqli_query($conn, "SELECT password FROM `user` WHERE id=$user_id");
    $row = mysqli_fetch_assoc($query);
    $original_hash = $row['password'];

    // Then, check if the old password entered by the user matches the original hash
    if (md5($oldpassword) == $original_hash) {
        // If the old password matches, update the password with the new hash
        if ($newpassword == $confirmpassword) {
            $new_hash = md5($newpassword);
            $query = mysqli_query($conn, "UPDATE `user` SET password='$new_hash' WHERE id=$user_id");
            echo "Password updated successfully!";
            $updated_fields[] = 'password';
        } else {
            echo "Confirm Password does not match";
        }
    } else {
        echo "Old password is incorrect";
    }
}
if (isset($_FILES['profile-image']) && !empty($_FILES['profile-image']['name'])) {
    $file_name = $_FILES['profile-image']['name'];
    $file_tmp = $_FILES['profile-image']['tmp_name'];
    $file_name_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_name_parts));

    $file_name_new = uniqid('', true) . '.' . $file_ext;
    $file_destination = '/programs/xampp/htdocs/banquethouses/profileimage/' . $file_name_new;

    // Check if the old image file exists and delete it
    $query = mysqli_query($conn, "SELECT profile FROM `profile` WHERE user_id=$user_id");
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $old_file = mysqli_fetch_assoc($query)['profile'];
        if (file_exists('/programs/xampp/htdocs/banquethouses/profileimage/' . $old_file)) {
            unlink('/programs/xampp/htdocs/banquethouses/profileimage/' . $old_file);
        }
        $query = mysqli_query($conn, "UPDATE `profile` SET profile='$file_name_new' WHERE user_id=$user_id");
    } else {
        // Update the database with the new file name
        $query = mysqli_query($conn, "INSERT INTO `profile`VALUES('','$file_name_new','$user_id')");
    }
    // Move the new image file to the desired directory
    move_uploaded_file($file_tmp, $file_destination);
    $updated_fields[] = 'profile';
}

if (!empty($updated_fields)) {
    // If at least one field has been updated, display success message
    $updated_fields_str = implode(', ', $updated_fields);
    echo "Updated  $updated_fields_str";
} else {
    echo "No fields have been updated";
}