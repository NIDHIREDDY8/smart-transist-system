<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Schedule Finder</title>
    <style>
        /* Base styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Layout styling */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
        }

        /* Sidebar box styling */
        .box {
            padding: 15px;
            border-radius: 5px;
            width: 250px;
        }

        .green-box { background-color: #a3cfbb; }
        .orange-box { background-color: #ffc66b; }
        .brown-box { background-color: #c7a17a; }
        .purple-box { background-color: #bba5c8; }
        .teal-box { background-color: #95bfc4; }
        .yellow-box { background-color: #d9cdbd; }
        
        /* Train Schedule Section */
        .train-schedule {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
            border-left: 1px solid #ddd;
        }
        
        .train-schedule h2 {
            font-size: 20px;
            color: #333;
        }

        .train-schedule input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .train-schedule button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #3c8dbc;
            border: none;
            cursor: pointer;
        }

        /* Information box */
        .info-box {
            background-color: #e8e8e8;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Sidebar Boxes -->
    <div class="box green-box">
        <h3>Search Trains</h3>
        <label>From</label>
        <input type="text" placeholder="Source Station">
        <label>To</label>
        <input type="text" placeholder="Destination Station">
        <label>Date</label>
        <input type="date">
        <label>Quota</label>
        <select>
            <option>General</option>
            <!-- Other options -->
        </select>
        <button onclick="getTrains()">Get Trains</button>
    </div>
    
    <div class="box orange-box">
        <h3>Get PNR Status</h3>
        <input type="text" placeholder="PNR Number">
        <button onclick="getPNRStatus()">Get PNR Status</button>
    </div>

    <div class="box brown-box">
        <h3>Train Route / Running Status</h3>
        <input type="text" placeholder="Train Name/Number">
        <button onclick="getRoute()">Get Route</button>
        <button onclick="getRunningStatus()">Running Status</button>
    </div>

    <div class="box purple-box">
        <h3>Arrival/Departure at Station</h3>
        <input type="text" placeholder="Station Name/Code">
        <input type="radio" name="type" checked> All
        <input type="radio" name="type"> Live
        <button onclick="getArrivalDeparture()">Get Trains</button>
    </div>

    <div class="box teal-box">
        <h3>Current Booking Availability</h3>
        <label>At Station</label>
        <input type="text" placeholder="Station Name/Code">
        <label>Going To</label>
        <input type="text" placeholder="Station Name/Code">
        <button onclick="getCurrentBookingAvailability()">Get Current Booking Availability</button>
    </div>

    <div class="box yellow-box">
        <h3>Recent Search History</h3>
        <p>No Recent Search History.</p>
    </div>

    <!-- Train Schedule Section -->
    <div class="train-schedule">
        <h2>Train Schedule</h2>
        <p>Get schedule / time table of any train in Indian Railways.</p>
        <input type="text" placeholder="Train Name / Number">
        <button onclick="getTrainSchedule()">Get Schedule</button>
        
        <div class="info-box">
            <h4>About Train Time Table / Schedule</h4>
            <p>Know the time table or schedule of any train along with platform, distance, stoppage, delay, etc., information. This will help you plan your travel efficiently.</p>
        </div>
    </div>
</div>

<script>
    // JavaScript functions for button actions (placeholders for now)
    function getTrains() {
        alert('Fetching trains...');
    }

    function getPNRStatus() {
        alert('Fetching PNR status...');
    }

    function getRoute() {
        alert('Fetching train route...');
    }

    function getRunningStatus() {
        alert('Fetching running status...');
    }

    function getArrivalDeparture() {
        alert('Fetching arrival/departure information...');
    }

    function getCurrentBookingAvailability() {
        alert('Fetching current booking availability...');
    }

    function getTrainSchedule() {
        alert('Fetching train schedule...');
    }
</script>

</body>
</html>
