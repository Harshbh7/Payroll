<?php
//components/add_product.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO products (productName, productDescription, productAmount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $productName, $productDescription, $productAmount);

    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productAmount = $_POST['productAmount'];

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
