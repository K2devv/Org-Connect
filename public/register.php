<?php
// Database connection
$host = 'localhost'; // Replace with your host
$dbname = 'orgconnect'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $Name = trim($_POST['Name']);
        $email = trim($_POST['email']);
        $studentID = trim($_POST['StudentID']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo json_encode(["status" => "error", "message" => "Passwords do not match."]);
            exit;
        }

        // Check if the user exists in the student table
        $stmt = $pdo->prepare("SELECT * FROM students WHERE name = :Name AND email = :email AND studentID = :studentID");
        $stmt->execute([
            ':Name' => $Name,
            ':email' => $email,
            ':studentID' => $studentID // Ensure the placeholder name matches the query
        ]);

        if ($stmt->rowCount() > 0) {
            // User exists, proceed to registration
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            // Insert the user into the `users` table
            $insertStmt = $pdo->prepare("INSERT INTO users (name, email, studentID, password) VALUES (:Name, :email, :studentID, :password)");
            $insertStmt->execute([
                ':Name' => $Name,
                ':email' => $email,
                ':studentID' => $studentID,
                ':password' => $hashedPassword
            ]);

            echo "<script>alert('Account created successfully. Proceed to login.');</script>";
            echo "<script>window.location.href = 'userLogin.html';</script>";
        } else {
            // User not found in the student table
            echo "<script>alert('You are not allowed to create an account. Please try again or enroll in this university first.');</script>";
            echo "<script>window.location.href = 'userLogin.html';</script>";
        }
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
