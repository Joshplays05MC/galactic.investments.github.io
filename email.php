<?php
if(isset($_POST["send"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "brynley.bp@gmail.com";
    $subject = "Message from Contact Form";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Email sent'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Email could not be sent'); window.location.href = 'index.html';</script>";
    }
}
?>
