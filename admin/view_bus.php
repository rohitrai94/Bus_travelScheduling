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

$bus_id = $_GET['id'];
$sql = "SELECT * FROM buses WHERE id = $bus_id";
$result = $conn->query($sql);

$bus = $result->fetch_assoc();

$conn->close();

// Determine the last route dynamically
$lastRoute = '';
for ($i = 15; $i >= 1; $i--) {
    if (!empty($bus['route' . $i])) {
        $lastRoute = $bus['route' . $i];
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- SimpleLightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.0/simple-lightbox.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        body {
             background-image: url('img000.jpg');
             background-repeat: no-repeat;
             background-attachment: fixed;
             background-size: cover;
             /* filter: brightness(50%); */
        }
        .bus-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto;
        }
        .bus-header {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .time-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 10px;
            background-color: #f1f1f1;
            margin-bottom: 20px;
        }
        .time-info div {
            text-align: center;
        }
        .time-info .time {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .duration {
            font-size: 18px;
            color: #6c757d;
        }
        .bus-content {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .bus-image {
            width: 300px; /* Increased size */
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Add cursor pointer */
        }
        .bus-routes {
            flex-grow: 1;
            margin-left: 20px; /* Added margin */
        }
        .bus-routes h4 {
            margin-bottom: 15px;
            color: #007bff;
        }
        .bus-routes ul {
            list-style-type: none;
            padding: 0;
        }
        .bus-routes ul li {
            margin-bottom: 10px;
            padding-left: 15px;
            position: relative;
        }
        .bus-routes ul li::before {
            content: "•";
            color: #007bff;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 18px;
            line-height: 1.5;
        }
        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-back {
            width: 180px;
            height: 40px;
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            display: inline-block;
            line-height: 40px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="bus-container">
        <div class="bus-header">
            <h2><?php echo $bus['bus_name']; ?></h2>
        </div>
        <div class="time-info">
            <div>
                <div class="time"><?php echo $bus['starting_time']; ?></div>
                <div><?php echo $bus['route1']; ?></div>
            </div>
            <div class="duration" id="total-duration"></div>
            <div>
                <div class="time"><?php echo $bus['dropping_time']; ?></div>
                <div><?php echo $lastRoute; ?></div>
            </div>
        </div>
        <div class="bus-content">
            <a href="<?php echo $bus['bus_image']; ?>" class="lightbox">
                <img src="<?php echo $bus['bus_image']; ?>" alt="Bus Image" class="bus-image img-thumbnail">
            </a>
            <div class="bus-routes">
                <h4>Bus Route</h4>
                <ul>
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <?php if (!empty($bus['route' . $i])): ?>
                        <li><?php echo $bus['route' . $i]; ?></li>
                    <?php endif; ?>
                <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div id="map"></div>
        <div class="button-container">
            <a href="listIndex.php" class="btn-back">Back to Bus List</a>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- SimpleLightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.0/simple-lightbox.min.js"></script>
    <script>
        // Initialize SimpleLightbox
        var lightbox = new SimpleLightbox('.lightbox');

        // Initialize the map
        var map = L.map('map').setView([20.5937, 78.9629], 5); // Centered on India
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Define the route coordinates based on route names
        var routeNames = [
            "<?php echo $bus['route1']; ?>",
            "<?php echo $bus['route2']; ?>",
            "<?php echo $bus['route3']; ?>",
            "<?php echo $bus['route4']; ?>",
            "<?php echo $bus['route5']; ?>",
            "<?php echo $bus['route6']; ?>",
            "<?php echo $bus['route7']; ?>",
            "<?php echo $bus['route8']; ?>",
            "<?php echo $bus['route9']; ?>",
            "<?php echo $bus['route10']; ?>",
            "<?php echo $bus['route11']; ?>",
            "<?php echo $bus['route12']; ?>",
            "<?php echo $bus['route13']; ?>",
            "<?php echo $bus['route14']; ?>",
            "<?php echo $bus['route15']; ?>",
            // Add more route names as needed
        ];

        // Function to fetch coordinates for a location name using Nominatim API
        function fetchCoordinates(locationName) {
            return fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + locationName)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        return {
                            lat: parseFloat(data[0].lat),
                            lng: parseFloat(data[0].lon)
                        };
                    } else {
                        console.error('Coordinates not found for location: ' + locationName);
                        return null;
                    }
                })
                .catch(error => {
                    console.error('Error fetching coordinates:', error);
                    return null;
                });
        }

        // Async function to fetch all route coordinates and draw the polyline
        async function fetchAndDrawRoute() {
            var routeCoordinates = [];
            for (var i = 0; i < routeNames.length; i++) {
                var locationName = routeNames[i];
                var coordinates = await fetchCoordinates(locationName);
                if (coordinates) {
                    routeCoordinates.push(coordinates);
                }
            }
            // Draw polyline on the map
            L.polyline(routeCoordinates, {color: 'blue'}).addTo(map);
            // Fit map bounds to show the entire route
            map.fitBounds(L.latLngBounds(routeCoordinates));
        }

        // Call the function to fetch and draw the route
        fetchAndDrawRoute();

        // Function to calculate total duration between start and drop time
        function calculateDuration(startTime, endTime) {
            var start = new Date("1970-01-01T" + startTime + "Z");
            var end = new Date("1970-01-01T" + endTime + "Z");
            var duration = new Date(end - start);
            var hours = duration.getUTCHours();
            var minutes = duration.getUTCMinutes();

            return hours + "h " + minutes + "m";
        }

        // Get start and drop time from PHP variables
        var startTime = "<?php echo $bus['starting_time']; ?>";
        var dropTime = "<?php echo $bus['dropping_time']; ?>";

        // Display total duration
        document.getElementById("total-duration").textContent = calculateDuration(startTime, dropTime);

        // Initialize SimpleLightbox for bus image
        // var lightbox = new SimpleLightbox('.lightbox');

        
    </script>
</body>
</html>


           
