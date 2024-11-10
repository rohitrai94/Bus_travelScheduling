<?php
session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: signin.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, message, created_at FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Messages</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td><td>" . $row["created_at"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No messages found.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>