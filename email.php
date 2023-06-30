<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["send"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'brynley.bp@gmail.com';
    $mail->Password = 'zvkovilysqsezypi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('brynley.bp@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Message from Contact Form";
    $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

    if ($mail->send()) {
        echo "<script>alert('Email sent'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Email could not be sent'); window.location.href = 'index.html';</script>";
    }
}
?>
