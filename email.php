<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "brynley.bp@gmail.com"; // Your Email address
    $from = $_POST['email']; // Sender's Email address
    $name = $_POST['name'];
    $subject = "Thank you for contacting Galactic AIO";
    $message = "Dear $name,\n\nThank you for reaching out to us. We have received your message and will get back to you shortly.\n\nBest regards,\nGalactic AIO Team";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isMail();

        // Recipients
        $mail->setFrom('noreply@galacticaio.com', 'Galactic AIO');
        $mail->addAddress($to);

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
