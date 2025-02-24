<?php
// products.php

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

$sql = "SELECT id, productName, productDescription, productAmount FROM products";
$result = $conn->query($sql);
?>
