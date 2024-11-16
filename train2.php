<?php
header("Content-Type: application/json");
// Database connection
$servername = "localhost";
$username = "root"; // replace with your database username
$password = "Password@53"; // replace with your database password
$dbname = "transit_planner";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}
// Fetch the input values
$from_station = $_POST['from_station'] ?? '';
$to_station = $_POST['to_station'] ?? '';

if (empty($from_station) || empty($to_station)) {
    echo json_encode(["error" => "Invalid input"]);
    exit();
}
// Prepare and execute query
$sql = "SELECT * FROM trains WHERE from_station = ? AND to_station = ? ORDER BY RAND() LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $from_station, $to_station);
$stmt->execute();
$result = $stmt->get_result();

$trains = [];
while ($row = $result->fetch_assoc()) {
    $trains[] = $row;
}
$stmt->close();
$conn->close();

// Return results as JSON
echo json_encode($trains);
?>
