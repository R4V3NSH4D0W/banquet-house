<?php
include 'config.php';
$id = $_GET['id'];
$qry = "DELETE FROM tbservice where id=$id";
mysqli_query($conn, $qry);
header("location:manageservice.php");