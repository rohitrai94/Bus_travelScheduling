<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .form-group .input-group {
            display: flex;
            align-items: center;
        }
        .form-group .input-group input {
            flex: 1;
        }
        .form-group .input-group i {
            margin-right: 10px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Add Bus Information</h1>
        </div>
        <form action="save_bus.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bus_name">Bus Name:</label>
                <div class="input-group">
                    <i class="fas fa-bus"></i>
                    <input type="text" id="bus_name" name="bus_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="bus_image">Bus Image:</label>
                <div class="input-group">
                    <i class="fas fa-image"></i>
                    <input type="file" id="bus_image" name="bus_image" accept="image/*" required>
                </div>
            </div>
            <div class="form-group">
                <label for="starting_time">Starting Time:</label>
                <div class="input-group">
                    <i class="fas fa-clock"></i>
                    <input type="text" id="starting_time" name="starting_time" class="timepicker" required>
                </div>
            </div>
            <div class="form-group">
                <label for="dropping_time">Dropping Time:</label>
                <div class="input-group">
                    <i class="fas fa-clock"></i>
                    <input type="text" id="dropping_time" name="dropping_time" class="timepicker" required>
                </div>
            </div>
            <?php for ($i = 1; $i <= 20; $i++): ?>
                <div class="form-group">
                    <label for="route<?php echo $i; ?>">Route <?php echo $i; ?>:</label>
                    <input type="text" id="route<?php echo $i; ?>" name="route<?php echo $i; ?>">
                </div>
            <?php endfor; ?>
            <div class="form-group">
                <button type="submit">Add Bus</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K",
            time_24hr: false
        });
    </script>
</body>
</html>
