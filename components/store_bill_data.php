<?php
//components/store_bill_data.php

session_start();
date_default_timezone_set('Asia/Kolkata'); // Set the default timezone

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Store user data in session
$_SESSION['user'] = [
    'id' => $_POST['userId'],
    'name' => $_POST['userName'],
    'mobile' => $_POST['userMobile'],
    'address' => $_POST['userAddress']
];

// Store products data in session
$_SESSION['products'] = $_POST['products'];

// Prepare data for insertion into the database
$userId = $_POST['userId'];
$userName = $_POST['userName'];
$userMobile = $_POST['userMobile'];
$dateOfPurchasing = date('Y-m-d');
$timeOfPurchasing = date('H:i:s');
$totalAmount = 0;

foreach ($_POST['products'] as $product) {
    $totalAmount += $product['totalAmount'];
}

// Insert data into the orders table
$sql = "INSERT INTO orders (user_id, user_name, user_mobile, date_of_purchasing, time_of_purchasing, total_amount)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("issssi", $userId, $userName, $userMobile, $dateOfPurchasing, $timeOfPurchasing, $totalAmount);

if ($stmt->execute()) {
    // Send a success response
    echo json_encode(['status' => 'success']);
} else {
    // Send a failure response
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>




