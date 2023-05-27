<?php

require 'functions.php';

if (!is_logged_in()) {
	redirect('login.php');
}

$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

$row = db_query("select * from users where id = :id limit 1", ['id' => $id]);

if ($row) {
	$row = $row[0];
}

// Include Razorpay API library and configuration
require('config.php');
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// Retrieve the submitted form data
$name = $_POST['name'];
$amount = $_POST['amount'];

// Initialize Razorpay API
$api = new Api($keyId, $keySecret);

// Create an order
$orderData = [
    'receipt'         => 3456,
    'amount'          => $amount * 100,
    'currency'        => 'INR',
    'payment_capture' => 1
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;

// Retrieve the submitted form data
$id = $row['id']; // Get user ID from the session or other source
$fname=$row['firstname'];
$lname=$row['lastname'];
$email=$row['email'];
$amount = $_POST['amount'];
$transec_date = date("Y-m-d H:i:s");

// Insert the donation information into the donations table
$query = "INSERT INTO donation (id, fname, lname, email, amount, transec_date) VALUES (:id, :fname, :lname, :email, :amount, :transec_date)";
$data = array(
    ':id' => $id,
    ':fname' => $fname,
    ':lname' => $lname,
    ':email' => $email,
    ':amount' => $amount,
    ':transec_date' => $transec_date
);

$result = db_query($query, $data);

echo '<script>document.getElementById("razorpay_order_id").value = "' . $razorpayOrderId . '";</script>';

// Redirect the user to the Razorpay payment portal
$redirect_url = "https://pages.razorpay.com/pl_LejMXARsg7uUU3/view";
header("Location: " . $redirect_url);
exit;
?>
