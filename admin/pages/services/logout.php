<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location:../../login/login.php");