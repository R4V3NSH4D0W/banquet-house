<?php
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila");

if($_SESSION['type']=="user")
  include('../dist/includes/header_user.php');
else
  include('../dist/includes/header_admin.php');
?>
