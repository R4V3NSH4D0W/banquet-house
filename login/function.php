<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "signup") {
        signup();
    } else if ($_POST["action"] == "signin") {
        signin();
    }
}

// REGISTER
function signup()
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['useremail']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm =  mysqli_real_escape_string($conn, md5($_POST['confirm']));
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "username or email already taken";
        exit;
    } else {
        if ($password == $confirm) {
            $query = "INSERT INTO user VALUES('','$name','$email','$password','user')";
            if (mysqli_query($conn, $query)) {
                return 1;
            }
        } else {
            echo "password doesnot match";
            exit;
        }
    }
}
// LOGIN
function signin()
{
    global $conn;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password1']));
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email= '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            if ($row['type'] == 'admin') {

                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                echo "Admin Login Successful";
            } elseif ($row['type'] == 'user') {

                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                echo "User Login Successful";
            }
        } else {
            echo "incorrect username or password";
            exit;
        }
    } else {
        echo 'user not registered';
        exit;
    }
}
