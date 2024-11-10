<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Schedule</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color:rgb(241, 241, 241);
      /* background-image: url('img000.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover; */
      /* background-color: rgba(255, 255, 255, 0.1);    */
       }
    #searchInput {
      width: 80%;
      height: 30px;
      border: none;
      border-radius: 8px;
      outline: none;
    }
    #srch {
      width: 18%;
      height: 30px;
      color: white;
      border-radius: 8px;
      background-color: #007bff;
      border: none;
      float: right;
      outline: none;
    }
    .container h1{
      text-align:center;
      font-size:50px;
      color:blue;
    }
  </style>
</head>
<body>
  <div class="container" id="show">
    <h1 class="mt-5 mb-3">BUS SCHEDULE</h1>
    <input type="text" id="searchInput" placeholder="Search for destination.." onkeyup="searchTable()">
    <button id="srch" onclick="searchTable()">Search</button>
    <table class="table table-striped" id="busTable">
      <thead>
        <tr>
          <th>Bus Name</th>
          <th>Starting Point</th>
          <th>Departure Bus Time</th>
          <th>Arrival Bus Time</th>
          <th>Dropping Point</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection
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

        // SQL query to fetch data from the database
        $sql = "SELECT * FROM buses";

        // Execute the query
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Get the last route that is not empty
                for ($i = 15; $i >= 1; $i--) {
                    $route = "route" . $i;
                    if (!empty($row[$route])) {
                        $dropping_point = $row[$route];
                        break;
                    }
                }

                echo "<tr>";
                echo "<td>".$row["bus_name"]."</td>";
                echo "<td>".$row['route1']."</td>";
                echo "<td>".$row["starting_time"]."</td>";
                echo "<td>".$row["dropping_time"]."</td>";
                echo "<td><a href='view_bus.php?id=".$row['id']."'>".$dropping_point."</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("busTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[4]; // Column index 4 contains the dropping point (destination)
          if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
              } else {
                  tr[i].style.display = "none";
              }
          }
      }
    }
  </script>
</body>
</html>
