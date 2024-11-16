<?php
session_start();

// Expanded arrays for custom route names and delay reasons
$routes = [
    'Ringroad', 'Fourroads', 'Maincenter', 'Northgate', 'Eastway', 'Westpark', 'Southgate',
    'Crossroad', 'Centralpark', 'Citysquare', 'Uptown', 'Downtown', 'Outerbelt', 'Riverside', 
    'Greenwich', 'Sunset Boulevard', 'Park Avenue', 'Harbor Street', 'Maple Lane', 'Oakwood Drive',
    'Lakeview Road', 'Hilltop Street', 'Old Mill Road', 'Broadway', 'Chestnut Avenue', 'Riverbank Road'
];

$reasons = [
    'Traffic congestion', 
    'Vehicle breakdown', 
    'Weather conditions', 
    'Accident on the route', 
    'Construction roadblocks', 
    'Highway closure', 
    'Driver fatigue',
    'Unexpected detours', 
    'Traffic signal failure', 
    'Roadworks', 
    'Flooded roads', 
    'Landslides', 
    'Police checkpoint', 
    'Pedestrian obstruction', 
    'Unexpected event closure', 
    'Animals on the road', 
    'Power outage on route', 
    'Bridge maintenance', 
    'Road surface damage',
    'Public event causing delays', 
    'Heavy fog', 
    'Snowstorm', 
    'Emergency vehicle interference'
];

// Randomly generate 3 delay items for the page
$delays = [];
for ($i = 0; $i < 3; $i++) {
    $route = $routes[array_rand($routes)];  // Random route name
    $delayTime = rand(5, 45);  // Random delay time between 5 and 45 minutes
    $reason = $reasons[array_rand($reasons)];  // Random delay reason
    $delays[] = ['route' => $route, 'delay' => $delayTime . ' minutes', 'reason' => $reason];
}

// Example objectives and optimization stats
$objectives = [
    'cost_reduction' => 'Reduce fuel consumption by 10% over the next year.',
    'on_time_deliveries' => 'Increase on-time deliveries by 15% in 6 months.',
    'customer_satisfaction' => 'Improve satisfaction score by 20% in 6 months.'
];

$steps = [
    'Analysis of current situation',
    'Definition of objectives',
    'Data collection and feedback',
    'Selection of technological tools',
    'Route design',
    'Team training',
    'Implementation and monitoring',
    'Feedback and adjustments'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Delay Optimization</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }
        header {
            background: linear-gradient(90deg, #3498db, #8e44ad);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* margin:50px; */
        }

        header h1 {
            font-size: 2.5em;
            margin: 50px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        header p {
            font-size: 1.2em;
            margin: 10px 0 0;
            font-weight: 400;
        }

        .container {
            width: 85%;
            margin: 30px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h2 {
            font-size: 2em;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        .steps, .objectives, .delays {
            margin-top: 30px;
        }

        .step-item, .objective-item {
            margin-bottom: 15px;
            font-size: 1.2em;
            color: #555;
            padding-left: 20px;
            position: relative;
        }

        /* Remove ticks by removing the '::before' pseudo-element */
        .step-item::before, .objective-item::before {
            content: '';
            /* No check mark anymore */
        }

        .delay-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 10px solid #e74c3c;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .delay-item:hover {
            background-color: #f2d7d5;
        }

        .delay-item span {
            font-weight: bold;
            color: #2c3e50;
        }

        .feedback-form {
            margin-top: 40px;
            text-align: center;
            background: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .feedback-form h2 {
            font-size: 2em;
            color: #2980b9;
            margin-bottom: 15px;
        }

        .feedback-form input, .feedback-form textarea {
            width: 90%;
            padding: 12px;
            font-size: 1.1em;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        .feedback-form input:focus, .feedback-form textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        .feedback-form button {
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .feedback-form button:hover {
            background-color: #2980b9;
        }

        /* Animation for page load */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            animation: fadeIn 1s ease-in-out;
        }
        .navbar {
            background-color:black;
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
            /*background-color:black;*/
            color: white;
            padding: 0 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: black;
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
<header>
    <h1>Transport Delay Optimization</h1>
    <p>Track, Optimize, and Improve Delivery Efficiency</p>
</header>

<div class="container">
    <h2>Current Transportation Delays</h2>
    <div class="delays">
        <?php foreach ($delays as $delay): ?>
            <div class="delay-item">
                <p><span>Route:</span> <?php echo $delay['route']; ?></p>
                <p><span>Delay:</span> <?php echo $delay['delay']; ?></p>
                <p><span>Reason:</span> <?php echo $delay['reason']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Optimization Objectives</h2>
    <div class="objectives">
        <?php foreach ($objectives as $key => $objective): ?>
            <div class="objective-item">
                <p><strong><?php echo ucfirst(str_replace('_', ' ', $key)); ?>:</strong> <?php echo $objective; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Route Optimization Steps</h2>
    <div class="steps">
        <ul>
            <?php foreach ($steps as $step): ?>
                <li class="step-item"><?php echo $step; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="feedback-form">
        <h2>Provide Your Feedback</h2>
        <form action="submit_feedback.php" method="POST">
            <textarea name="feedback" placeholder="Enter your feedback or suggestions here..." rows="5"></textarea><br>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</div>

</body>
<footer>
    <pre style="font-size: 20px; text-align: center; background-color: #f4f4f9; padding: 10px; margin: 0;">
Team members:
23MIS0154
23MIS0139
23MIS0109
23MIS0208
    </pre>
</footer>
</html>