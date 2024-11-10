<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>