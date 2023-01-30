<?php
require 'config.php';
if (!empty($_SESSION["admin_id"])) {
  header("Location: index.php");
}
if (!empty($_SESSION["user_id"])) {
  header('location:banquets\index.html');
}
if (isset($_POST["signup"])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $confirmpassword =  mysqli_real_escape_string($conn, md5($_POST['confirm']));
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  } else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO user VALUES('','$name','$email','$password','user')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    } else {
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}

if (isset($_POST["signin"])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email= '$email'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      if ($row['type'] == 'admin') {

        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:index.php');
      } elseif ($row['type'] == 'user') {

        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location:banquets\index.php');
      }
    } else {
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  } else {
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
