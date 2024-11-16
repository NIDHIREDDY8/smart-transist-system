<?php
session_start();

// Database connection and distance retrieval based on start and end locations
$start = $_POST['start'];
$end = $_POST['end'];

$conn = new mysqli('localhost', 'root', 'Password@53', 'transit_planner');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT distance_km AS distance FROM distances WHERE start_point = '$start' AND end_point = '$end'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $distance = $row['distance'];

    // Set timezone to IST and get the current time
    date_default_timezone_set('Asia/Kolkata');
    $currentISTTime = date('Y/m/d H:i');

    // Calculate travel durations
    $busDuration = round($distance / 30, 2);
    $trainDuration = round($distance / 60, 2);
    $flightDuration = round(($distance / 900) + 2, 2);

    // Calculate Environmental Impact (kg CO2)
    $environmentalImpact = $distance * 0.25;  // 0.25 kg CO2 per km

    $journeyOptions = [
        ['departureTime' => date('H:i'), 'arrivalTime' => date('H:i', strtotime('+'. $busDuration .' hours')), 'mode' => 'Bus', 'duration' => $busDuration],
        ['departureTime' => date('H:i'), 'arrivalTime' => date('H:i', strtotime('+'. $trainDuration .' hours')), 'mode' => 'Train', 'duration' => $trainDuration],
        ['departureTime' => date('H:i'), 'arrivalTime' => date('H:i', strtotime('+'. $flightDuration .' hours')), 'mode' => 'Flight', 'duration' => $flightDuration]
    ];
} else {
    echo "No route found between $start and $end.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journey Options</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
        }

        h1 {
            font-size: 1.5em;
            margin-bottom: 10px;
            text-align: center;
        }

        .departure {
            font-size: 0.9em;
            text-align: center;
            color: #777;
            margin-bottom: 20px;
        }

        .journey-option {
            border-top: 1px solid #ddd;
            padding: 15px 0;
        }

        .journey-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.1em;
            font-weight: bold;
        }

        .journey-header span:nth-child(2) {
            font-weight: normal;
        }

        .transfers {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .transfers span.duration {
            margin-left: 10px;
            font-size: 0.9em;
            color: #555;
        }

        .environmental-impact {
            font-size: 0.9em;
            color: #555;
            margin-top: 10px;
            font-weight: bold;
        }

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
    </style>
</head>
<body>
<div class="navbar">
<a href="hotel.html">Hotel Information</a>

    <a href="train.php">Train Information</a>
    <a href="cab.php">Cab</a>
    <a href="delaysf.php">Delays</a>
</div>
<div class="container">
    <h1><?php echo "$start to $end"; ?></h1>
    <p class="departure"><?php echo "$currentISTTime Departure"; ?></p>

    <?php foreach ($journeyOptions as $index => $option): ?>
        <div class="journey-option">
            <div class="journey-header">
                <span><?php echo ($index + 1); ?></span>
                <span><?php echo "{$option['departureTime']} - {$option['arrivalTime']}"; ?></span>
                <span><?php echo "{$option['duration']}h"; ?></span>
            </div>
            <p>Mode: <?php echo $option['mode']; ?></p>
            <div class="transfers">
                <?php if ($option['mode'] == 'Bus'): ?>
                    🚌
                <?php elseif ($option['mode'] == 'Train'): ?>
                    🚆
                <?php elseif ($option['mode'] == 'Flight'): ?>
                    ✈
                <?php endif; ?>
                <span class="duration"><?php echo "{$option['duration']}h"; ?></span>
            </div>
            <!-- Display environmental impact -->
            <p class="environmental-impact">
                Estimated Environmental Impact: <?php echo round($environmentalImpact, 2); ?> kg CO2
            </p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>