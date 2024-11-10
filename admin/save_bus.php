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

function resetAutoIncrement($conn) {
    // Find the maximum ID in the table
    $result = $conn->query("SELECT MAX(id) AS max_id FROM buses");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'] ? $row['max_id'] + 1 : 1;

    // Reset the auto-increment to max_id + 1 or to 1 if the table is empty
    $conn->query("ALTER TABLE buses AUTO_INCREMENT = $max_id");
}

// Example deletion logic
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM buses WHERE id = $delete_id");
    resetAutoIncrement($conn);
    echo "Record deleted and auto-increment reset.";
}

// Handle file upload and insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bus_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["bus_image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    if ($_FILES["bus_image"]["size"] > 5000000) {
        die("Sorry, your file is too large.");
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (!move_uploaded_file($_FILES["bus_image"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Reset auto-increment before inserting a new record
    resetAutoIncrement($conn);

    $stmt = $conn->prepare("INSERT INTO buses (bus_name, bus_image, starting_time, dropping_time,route1, route2, route3, route4, route5, route6, route7, route8, route9, route10, route11, route12, route13,  route14, route15,  route16, route17, route18, route19, route20) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssssssssssssssssssss",
        $_POST['bus_name'],
        $target_file,
        $_POST['starting_time'],
        $_POST['dropping_time'],
        $_POST['route1'],
        $_POST['route2'],
        $_POST['route3'],
        $_POST['route4'],
        $_POST['route5'],
        $_POST['route6'],
        $_POST['route7'],
        $_POST['route8'],
        $_POST['route9'],
        $_POST['route10'],
        $_POST['route11'],
        $_POST['route12'],
        $_POST['route13'],
        $_POST['route14'],
        $_POST['route15'],
        $_POST['route16'],
        $_POST['route17'],
        $_POST['route18'],
        $_POST['route19'],
        $_POST['route20']
    );

    if ($stmt->execute()) {
        echo "New bus record created successfully";
        echo "<br><a href='listIndex.php'>View Buses</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
