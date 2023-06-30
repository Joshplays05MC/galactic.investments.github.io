<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'brynley.bp@gmail.com'; // Your Gmail address
$mail->Password = 'zvkovilysqsezypi'; // Your Gmail app password
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to
// Sender information
$mail->setFrom('noreply@galactic.investments.com', 'Galactic Investments');

// Receiver address and name
$mail->addAddress('R', 'RECEPIENT_NAME');

// Add CC or BCC
// $mail->addCC('email@mail.com');
// $mail->addBCC('user@mail.com');


$mail->isHTML(true);

$mail->Subject = 'PHPMailer SMTP test';
$mail->Body    = "<h4>PHPMailer the awesome Package</h4>
<b>PHPMailer is working fine for sending mail</b>
<p>This is a tutorial to guide you on PHPMailer integration</p>";

// Send mail
if (!$mail->send()) {
    echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
