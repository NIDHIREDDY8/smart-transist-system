<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Search</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #dff3ff;
            margin: 0;
            padding-top: 70px;
        }

        h1 {
            color: #ff0099;
            margin: 50px;
        }

        /* Navbar Styling */
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

        /* Search Container Styling */
        .search-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            border-radius: 10px;
        }

        .search-container input[type="text"],
        .search-container button {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            font-size: 1em;
        }

        .search-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 1.1em;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: blue;
        }

        td button {
            color: red;
            font-weight: bold;
            cursor: pointer;
            border: none;
            background: none;
        }

        td button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <a href="hotel.html">Hotel Information</a>
        <a href="train.php">Train Information</a>
        <a href="cab.php">Cab</a>
        <a href="delaysf.php">Delays</a>
    </div>

    <!-- Main Title -->
    <h1>National Ticket Booking Spot</h1>

    <!-- Search Form -->
    <div class="search-container">
        <label for="fromStation">From Station:</label>
        <input type="text" id="fromStation" placeholder="Enter From Station">
        
        <label for="toStation">To Station:</label>
        <input type="text" id="toStation" placeholder="Enter To Station">
        
        <button onclick="searchTrains()">Search</button>
    </div>

    <!-- Results Table -->
    <table id="trainTable" style="display: none;">
        <thead>
            <tr>
                <th>Train Name</th>
                <th>Train Number</th>
                <th>From Station</th>
                <th>To Station</th>
                <th>Time</th>
                <th>Seats Available</th>
                <th>Fare (INR)</th>
                <th>Booking</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        function searchTrains() {
            const fromStation = document.getElementById('fromStation').value;
            const toStation = document.getElementById('toStation').value;

            // Validate input fields
            if (!fromStation || !toStation) {
                alert('Please enter both from and to stations.');
                return;
            }

            // Fetch data from PHP script
            fetch('train2.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `from_station=${fromStation}&to_station=${toStation}`
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const table = document.getElementById('trainTable');
                const tbody = table.querySelector('tbody');
                tbody.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(train => {
                        const row = `<tr>
                            <td>${train.train_name}</td>
                            <td>${train.train_number}</td>
                            <td>${train.from_station}</td>
                            <td>${train.to_station}</td>
                            <td>${train.time}</td>
                            <td>${train.seats_available}</td>
                            <td>${train.fare} RS</td>
                            <td><button>Book Now</button></td>
                        </tr>`;
                        tbody.innerHTML += row;
                    });
                    table.style.display = 'table';
                } else {
                    table.style.display = 'none';
                    alert('No trains found.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong!');
            });
        }
    </script>
</body>
</html>
s