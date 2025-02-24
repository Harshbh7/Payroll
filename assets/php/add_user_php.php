<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Connection failed',
                text: '". $conn->connect_error ."'
            });
          </script>";
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $mobile_no = $conn->real_escape_string($_POST['mobile-no']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $pincode = $conn->real_escape_string($_POST['pin-code']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (name, username, mobile_no, email, address, pincode, city, state)
    VALUES ('$name', '$username', '$mobile_no', '$email', '$address', '$pincode', '$city', '$state')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php on success
        header("Location: ../index.php"); // Adjust path if needed
        exit();
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '". $conn->error ."'
                });
              </script>";
    }

    $conn->close();
}
?>
