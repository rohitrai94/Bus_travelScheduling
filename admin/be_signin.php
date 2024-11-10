<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_information";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_authentication WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: signin.php");
        exit;
    }
}

$conn->close();
?>
