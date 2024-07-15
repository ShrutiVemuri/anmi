<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anmi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the year and month from the request
// $year = isset($_GET['year']) ? intval($_GET['year']) : 0;
// $month = isset($_GET['month']) ? intval($_GET['month']) : 0;

// Fetch data from webinars table
$sql = "SELECT * FROM webinars WHERE 1";

// if ($year > 0) {
//     $sql .= " AND YEAR(date_time_day) = $year";
// }

// if ($month > 0) {
//     $sql .= " AND MONTH(date_time_day) = $month";
// }

$result = $conn->query($sql);

$webinars = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $webinars[] = $row;
    }
}

echo json_encode($webinars);

$conn->close();
?>
