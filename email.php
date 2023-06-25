<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php'; // Add this line

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "brynley.bp@gmail.com"; // Your Email address
    $from = $_POST['email']; // Sender's Email address
    $name = $_POST['name'];
    $subject = "Thank you for contacting Galactic Investments";
    $message = "Dear $name,\n\nThank you for reaching out to us. We have received your message and will get back to you shortly.\n\nBest regards,\nGalactic Investments Team";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'brynley.bp@gmail.com'; // Your Gmail address
        $mail->Password = 'zvkovilysqsezypi'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465; // TCP port to connect to

        // Recipients
        $mail->setFrom('brynley.bp@gmail.com', 'Galactic Investments');
        $mail->addAddress($_POST["email]);

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->CharSet = 'UTF-8';

        $mail->send();

        echo json_encode(['status' => 'success', 'message' => 'Thank you for contacting us! We will be in touch shortly.']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'An error occurred while sending the message.']);
        exit;
    }
}
?>
