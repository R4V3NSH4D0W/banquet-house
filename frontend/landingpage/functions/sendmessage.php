<?php
require '/programs/xampp/htdocs/banquethouses/connection/config.php';
$recaptcha_secret_key = '6LehVfUkAAAAAI7Ptd2DzWzA2hZW1CmB3I6h4X5p';
$recaptcha_response = $_POST['g-recaptcha-response'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'secret' => $recaptcha_secret_key,
    'response' => $recaptcha_response
)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$response_data = json_decode($response, true);
curl_close($ch);
if ($response_data['success']) {
    // reCAPTCHA verification was successful
    // Insert the query data into the database
    $id = $_GET["page_id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $result = mysqli_query($conn, "INSERT INTO query Values('','$name','$email','$phone','$message','$id','unread')");

    // Return a success response to the client
    http_response_code(200);
    echo "success";
} else {
    // reCAPTCHA verification failed
    http_response_code(400);
    echo "error";
}
