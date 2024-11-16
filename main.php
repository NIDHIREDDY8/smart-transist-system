<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Route Updates</title>
    <style>
        /* General Styling */
        #realTimeUpdates {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 1.2em;
            border-radius: 8px;
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div id="realTimeUpdates">Checking for real-time route updates...</div>

<script>
    let lastUpdate = 0; // Tracks the latest update time

    function fetchRouteUpdates() {
        fetch(`poll_updates.php?last_update=${lastUpdate}`)
            .then(response => response.json())
            .then(data => {
                if (data.updates.length > 0) {
                    // Display the latest updates
                    const updatesDiv = document.getElementById('realTimeUpdates');
                    data.updates.forEach(update => {
                        const updateMessage = `<p>${update.status_update} - Delay: ${update.delay_minutes} minutes</p>`;
                        updatesDiv.innerHTML += updateMessage;
                    });

                    // Update lastUpdate to the latest timestamp received
                    lastUpdate = data.updates[data.updates.length - 1].last_modified;
                }

                // Continue polling for updates
                fetchRouteUpdates();
            })
            .catch(error => console.error('Error fetching updates:', error));
    }

    // Start polling for updates once the page is loaded
    document.addEventListener("DOMContentLoaded", () => {
        fetchRouteUpdates();
    });
</script>

</body>
<?php
session_start();
header('Content-Type: application/json');  // Ensure JSON response type

error_reporting(0);  // Disable error reporting temporarily for debugging

// Route details
$start = $_SESSION['start'] ?? '';
$end = $_SESSION['end'] ?? '';
$lastUpdate = isset($_GET['last_update']) ? (int)$_GET['last_update'] : 0;

// Database connection
$conn = new mysqli('localhost', 'root', 'Password@53', 'transit_planner');
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$timeout = 30;
$elapsedTime = 0;

while ($elapsedTime < $timeout) {
    $sql = "SELECT status_update, delay_minutes, UNIX_TIMESTAMP(last_modified) AS last_modified 
            FROM route_updates 
            WHERE start_point = ? AND end_point = ? AND UNIX_TIMESTAMP(last_modified) > ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $start, $end, $lastUpdate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $updates = [];
        while ($row = $result->fetch_assoc()) {
            $updates[] = [
                'status_update' => $row['status_update'],
                'delay_minutes' => $row['delay_minutes'],
                'last_modified' => $row['last_modified']
            ];
        }
        echo json_encode(['updates' => $updates]);
        $conn->close();
        exit;
    }

    sleep(1);  // Pause before retrying
    $elapsedTime++;
}

echo json_encode(['updates' => []]);  // No updates
$conn->close();
?>



</html>
