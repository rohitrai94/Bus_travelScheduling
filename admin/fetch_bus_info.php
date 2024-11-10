<?php
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

// Fetch bus information
$sql = "SELECT * FROM buses";
$result = $conn->query($sql);

$buses = [];

if ($result->num_rows > 0) {
    // Store each row of data in an array
    while($row = $result->fetch_assoc()) {
        $buses[] = $row;
    }
} else {
    echo "No records found";
}

$conn->close();
?>
