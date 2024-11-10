<?php
session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Information System</title>
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
            text-align: center;
        }
        .container button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .container button.delete {
            background-color: #FF0000;
        }
        .container button.delete:hover {
            background-color: #CC0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bus Information System</h1>
        <a href="insert_bus.php"><button>Add Bus</button></a>
        <a href="update_bus_form.php"><button>Update Bus</button></a>
        <a href="delete_bus_form.php"><button class="delete">Delete Bus</button></a>
        <a href="admin_view_buses.php"><button>View Bus</button></a>
        <a href="view_messages.php"><button>View Messages</button></a>
    </div>
</body>
</html>