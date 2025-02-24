<?php
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

// Fetch data for the dropdowns
$sql = "SELECT id, name, mobile_no FROM users";
$result = $conn->query($sql);

$userOptionsById = '';
$userOptionsByMobile = '';
$userOptionsByName = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userOptionsById .= "<option value='{$row['id']}'>{$row['id']}</option>";
        $userOptionsByMobile .= "<option value='{$row['mobile_no']}'>{$row['mobile_no']}</option>";
        $userOptionsByName .= "<option value='{$row['name']}'>{$row['name']}</option>";
    }
}
$conn->close();
?>