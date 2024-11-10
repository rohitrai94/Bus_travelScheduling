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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Buses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
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
        <h1>Bus Information</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Bus Image</th>
                    <th>Starting Time</th>
                    <th>Dropping Time</th>
                    <?php for ($i = 1; $i <= 20; $i++): ?>
                        <th>Route <?php echo $i; ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['bus_name']; ?></td>
                            <td><img src="<?php echo $row['bus_image']; ?>" alt="Bus Image" style="width: 100px;"></td>
                            <td><?php echo $row['starting_time']; ?></td>
                            <td><?php echo $row['dropping_time']; ?></td>
                            <?php for ($i = 1; $i <= 20; $i++): ?>
                                <td><?php echo $row['route'.$i]; ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="25">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
