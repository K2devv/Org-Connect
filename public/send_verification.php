<?php
// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

$conn = new mysqli('localhost', 'root', '', 'orgconnect');
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed.']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['student_id']) && !empty($_POST['student_id'])) {
        $student_id = $_POST['student_id'];

        $stmt = $conn->prepare("SELECT email FROM students WHERE StudentID = ?");
        if (!$stmt) {
            die(json_encode(['status' => 'error', 'message' => 'Query preparation failed.']));
        }
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            $verification_code = bin2hex(random_bytes(16));
            $verification_link = "http://localhost/email-verification/createPass.html?code=$verification_code";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'orgconnect123@gmail.com';
                $mail->Password = 'eqpo kfnq wpoh mdms';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('orgconnect123@gmail.com', 'Verification System');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'One-Tap Verification';
                $mail->Body = "Click the link below to verify your account:<br><br>
                               <a href='$verification_link'>$verification_link</a>";

                $mail->send();

                echo json_encode(['status' => 'success', 'message' => 'Verification email sent.']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'Email could not be sent.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Student ID not found.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student ID is required.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
$conn->close();
