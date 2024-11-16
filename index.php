<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch input values
    $start = isset($_POST['start']) ? $_POST['start'] : '';
    $end = isset($_POST['end']) ? $_POST['end'] : '';

    if ($start && $end) {
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'transit_planner');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get distance between start and end points
        $stmt = $conn->prepare("SELECT 
                                    start_point, 
                                    end_point, 
                                    distance_km AS distance,
                                    ROUND(distance_km / 30, 2) AS bus_time_hours,
                                    ROUND(distance_km / 60, 2) AS train_time_hours,
                                    ROUND((distance_km / 900) + 2, 2) AS flight_time_hours
                                FROM distances 
                                WHERE start_point = ? AND end_point = ?");
        $stmt->bind_param('ss', $start, $end);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $output = '';
            while ($row = $result->fetch_assoc()) {
                $output .= "Route: " . $row['start_point'] . " to " . $row['end_point'] . "<br>";
                $output .= "Distance: " . $row['distance'] . " km<br>";
                $output .= "Estimated Bus Time: " . $row['bus_time_hours'] . " hours<br>";
                $output .= "Estimated Train Time: " . $row['train_time_hours'] . " hours<br>";
                $output .= "Estimated Flight Time: " . $row['flight_time_hours'] . " hours<br>";
                $environmental_impact = $row['distance'] * 0.25; 
                $output .= "Estimated Environmental Impact: " . $environmental_impact . " kg CO2<br>";
            }
            $_SESSION['route_result'] = $output;
        } else {
            $_SESSION['route_result'] = "No routes found.";
        }

        $conn->close();
    } else {
        $_SESSION['route_result'] = "Please enter both departure and arrival locations.";
    }

    // Redirect to the results page after processing
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>India Journey Planner / Transit Map</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpaperbat.com/img/476794-taj-mahal-wallpaper-hd.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: white;
        }

        /* Overlay for darker background effect */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Container styling */
        .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            text-align: center;
            margin-top: 120px;
        }

        /* Navigation bar styling */
        .navbar {
            display: flex;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px 0;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 3;
        }

        /* Navigation links styling */
        .navbar a {
            color: white;
            padding: 0 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #ddd;
        }

        /* Title styling */
        h1 {
            font-size: 2.5em;
            margin: 80px 0 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Breadcrumb-like text styling */
        .breadcrumb {
            font-size: 0.9em;
            margin-bottom: 20px;
            color: #ccc;
        }

        /* Search form styling */
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Input fields styling */
        .search-form input[type="text"] {
            padding: 10px;
            font-size: 1.1em;
            border: 1px solid #ccc;
            margin-right: 5px;
            border-radius: 5px;
            width: 45%;
            transition: border-color 0.3s ease;
        }

        .search-form input[type="text"]:focus {
            border-color: #444;
        }

        /* Search button styling */
        .search-form button {
            padding: 10px 20px;
            font-size: 1.1em;
            border: none;
            cursor: pointer;
            background-color: black;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        .search-form button:hover {
            background-color: #333;
        }

        /* Result output */
        .result {
            margin-top: 30px;
            font-size: 1.2em;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 5px;
            max-width: 800px;
            margin: 20px auto;
            white-space: pre-wrap; /* Preserve newlines in output */
        }
    </style>
</head>
<body>
<div class="overlay"></div>

<!-- Navbar -->
<div class="navbar">
<a href="hotel.html">Hotel Information</a>

    <a href="train.php">Train Information</a>
    <a href="cab.php">Cab</a>
    <a href="delaysf.php">Delays</a>
</div>

<!-- Main Content -->
<div class="container">
    <h1>India Journey Planner / Transit Map</h1>
    <p class="breadcrumb">NAVITIME Transit / India Journey Planner / Transit Map</p>

    <!-- Search Form -->
    <form id="routeForm" class="search-form" method="POST" action="new2.php">
        <input type="text" id="start" name="start" placeholder="Departure" required>
        <input type="text" id="end" name="end" placeholder="Arrival" required>
        <button type="web.php">Search</button>
    </form>

    <?php
if (isset($_SESSION['route_result'])) {
    echo '<div class="result">' . $_SESSION['route_result'] . '</div>';
    unset($_SESSION['route_result']); // Clear session data after displaying
}
?>

    
</div>

</body>
</html>