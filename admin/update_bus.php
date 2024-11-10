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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $bus_name = $_POST['bus_name'];
    $bus_image = $_FILES['bus_image']['name'];
    $starting_time = $_POST['starting_time'];
    $dropping_time = $_POST['dropping_time'];
    $routes = [];
    for ($i = 1; $i <= 20; $i++) {
        $routes[] = "route$i = '" . $_POST['route'.$i] . "'";
    }

    $sql = "UPDATE buses SET bus_name='$bus_name', starting_time='$starting_time', dropping_time='$dropping_time', " .
        implode(', ', $routes) . " WHERE id=$id";

    if (!empty($bus_image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($bus_image);
        if (move_uploaded_file($_FILES["bus_image"]["tmp_name"], $target_file)) {
            $bus_image_path = $target_file;
            $sql = "UPDATE buses SET bus_image='$bus_image_path', bus_name='$bus_name', starting_time='$starting_time', dropping_time='$dropping_time', " .
                implode(', ', $routes) . " WHERE id=$id";
        }
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
