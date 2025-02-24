<?php
// components/get_user_details.php 

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search criteria from the AJAX request
$searchOption = $_GET['searchOption'];
$searchInput = $_GET['searchInput'];

// Prepare the SQL query based on search criteria
$sql = "";
if ($searchOption === 'id') {
    $sql = "SELECT * FROM users WHERE id = ?";
} elseif ($searchOption === 'mobile') {
    $sql = "SELECT * FROM users WHERE mobile_no = ?";
} elseif ($searchOption === 'name') {
    $sql = "SELECT * FROM users WHERE name = ?";
} else {
    echo json_encode([]);
    exit;
}


$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $searchInput);
$stmt->execute();
$result = $stmt->get_result();

// Check if user is found and return data
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode($user);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
