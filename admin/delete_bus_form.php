<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h1 {
            margin: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #FF0000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #CC0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Delete Bus Information</h1>
        </div>
        <form action="delete_bus.php" method="post">
            <div class="form-group">
                <label for="id">Bus ID:</label>
                <div class="input-group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" id="id" name="id" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Delete Bus</button>
            </div>
        </form>
    </div>
</body>
</html>
