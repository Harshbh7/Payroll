<?php
// components/order.php

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

// Fetch order data from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql); 
?>