<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$id = $_GET["page_id"];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$result = mysqli_query($conn, "INSERT INTO query Values('','$name','$email','$phone','$message','$id')");
