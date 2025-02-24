<!-- db_config.php -->
<?php
$dsn = 'mysql:host=localhost;dbname=payroll_db';
$username = 'root'; // Change this if needed
$password = ''; // Change this if needed

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
