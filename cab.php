<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cab Booking System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    label {
      display: block;
      margin: 10px 0 5px;
    }
    input[type="text"], select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .button:hover {
      background-color: #218838;
    }
    .status {
      text-align: center;
      margin-top: 20px;
      color: #555;
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
    <h2>Book a Cab</h2>
    <label for="customerName">Customer Name</label>
    <input type="text" id="customerName" placeholder="Enter your name">
    
    <label for="pickupLocation">Pickup Location</label>
    <input type="text" id="pickupLocation" placeholder="Enter pickup location">
    
    <label for="dropLocation">Drop Location</label>
    <input type="text" id="dropLocation" placeholder="Enter drop location">
    
    <label for="cabSelect">Select Cab</label>
    <select id="cabSelect">
      <option value="1">Cab 1 - John Doe</option>
      <option value="2">Cab 2 - Jane Smith</option>
      <option value="3">Cab 3 - Bob Brown</option>
    </select>
    
    <button class="button" onclick="bookCab()">Book Cab</button>
    
    <div class="status" id="status"></div>
  </div>

  <script>
    // Sample list of cabs with prices
    const cabs = [
      { id: 1, driver: "John Doe", price: 50, available: true },
      { id: 2, driver: "Jane Smith", price: 80, available: true },
      { id: 3, driver: "Bob Brown", price: 100, available: true }
    ];

    // Book Cab function
    function bookCab() {
      const customerName = document.getElementById('customerName').value;
      const pickupLocation = document.getElementById('pickupLocation').value;
      const dropLocation = document.getElementById('dropLocation').value;
      const cabId = document.getElementById('cabSelect').value;

      if (!customerName || !pickupLocation || !dropLocation) {
        document.getElementById('status').innerText = "Please fill in all fields.";
        return;
      }

      // Find the selected cab by ID
      const selectedCab = cabs.find(cab => cab.id === parseInt(cabId));
      if (selectedCab && selectedCab.available) {
        selectedCab.available = false; // Mark cab as unavailable
        document.getElementById('status').innerText = `Cab booked successfully! Driver: ${selectedCab.driver}. Total Price: $${selectedCab.price}`;
      } else {
        document.getElementById('status').innerText = "Selected cab is not available.";
      }

      // Clear input fields
      document.getElementById('customerName').value = '';
      document.getElementById('pickupLocation').value = '';
      document.getElementById('dropLocation').value = '';
    }
  </script>
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