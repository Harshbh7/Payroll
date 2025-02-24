<?php
// components/get_product_details.php

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

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $sql = "SELECT id, productName, productAmount FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else if (isset($_GET['fetch_all']) && $_GET['fetch_all'] === 'true') {
    $sql = "SELECT id, productName, productAmount FROM products";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    echo json_encode($products);
} else {
    echo json_encode(['error' => 'Invalid parameters']);
}

$conn->close();

?>
