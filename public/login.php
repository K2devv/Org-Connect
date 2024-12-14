<?php
// Database connection and session setup
session_start();

$host = 'localhost';
$dbname = 'orgconnect';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $StudentID = trim($_POST['StudentID']);
        $password = trim($_POST['password']);

        // Fetch user data from database based on StudentID
        $stmt = $pdo->prepare("SELECT * FROM users WHERE StudentID = :StudentID");
        $stmt->execute(['StudentID' => $StudentID]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // User authenticated, store session data
            $_SESSION['user'] = $user;
            
            // Successful login, send response to frontend
            header("Location: listOrgs.php");
            exit;
        } else {
            // Incorrect credentials, send a JSON response
            echo json_encode([
                "status" => "error",
                "message" => "Invalid Student ID or password."
            ]);
        }
    }
} catch (PDOException $e) {
    // Database error, send a JSON response
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
