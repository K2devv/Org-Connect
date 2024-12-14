<?php
// Database connection
$servername = "localhost"; // Change this if needed
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "orgconnect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM organization";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data in JSON format for JavaScript or as HTML for direct display
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data); // For API-style response
} else {
    echo json_encode([]);
}

$conn->close();
?>
