<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/autoload.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Load SMTP configuration from a separate file
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form input
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (!$email || !$name || !$message) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid form data. Please check your inputs.']);
        exit;
    }

    $to = "brynley.bp@gmail.com"; // Your Email address
    $subject = "Thank you for contacting Galactic Investments";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = $smtpHost; // Read from config file
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $smtpUsername; // Read from config file
        $mail->Password = $smtpPassword; // Read from config file
        $mail->SMTPSecure = $smtpSecure; // Read from config file
        $mail->Port = $smtpPort; // Read from config file

        // Recipients
        $mail->setFrom($smtpUsername, 'Galactic Investments');
        $mail->addAddress($to);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Dear $name,<br><br>Thank you for reaching out to us. We have received your message and will get back to you shortly.<br><br>Best regards,<br>Galactic Investments Team";
        $mail->CharSet = 'UTF-8';

        $mail->send();

        echo json_encode(['status' => 'success', 'message' => 'Thank you for contacting us! We will be in touch shortly.']);
        exit;
    } catch (Exception $e) {
        // Log the error
        error_log('Email sending failed: ' . $mail->ErrorInfo);

        echo json_encode(['status' => 'error', 'message' => 'An error occurred while sending the message. Please try again later.']);
        exit;
    }
}
?>
