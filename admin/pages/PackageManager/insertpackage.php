<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}
$services = $_POST['services'];
$package_name = $_POST['package_name'];
$total_price = 0;
$service_name = array();
if (empty($package_name)) {
    echo "Empty Field";
} else {
    foreach ($services as $service) {
        $result = mysqli_query($conn, "SELECT servicename, serviceprice FROM tbservice WHERE id = $service");
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);
            $service_name = $rows['servicename'];
            $service_price = $rows['serviceprice'];
            $total_price += $service_price;
            $service_names[] = $service_name;
        }
    }
    print_r($total_price);
    print_r($service_names);
    $services_str = implode(',', $service_names);
    $sql = mysqli_query($conn, "Insert into packages VALUES('','$package_name','$total_price','$admin_id','$services_str')");
}
