<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "brynley.bp@gmail.com"; // Your Email address
    $from = $_POST['email']; // Sender's Email address
    $name = $_POST['name'];
    $subject = "Thank you for contacting Galactic AIO";
    $message = "Dear $name,\n\nThank you for reaching out to us. We have received your message and will get back to you shortly.\n\nBest regards,\nGalactic AIO Team";

    $headers = "From: Galactic AIO <noreply@galacticaio.com>\r\n";
    $headers .= "Reply-To: $to\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($from, $subject, $message, $headers);

    $subject2 = "New Contact Form Submission";
    $message2 = "Name: $name\nEmail: $from\n\nMessage:\n" . $_POST['message'];

    $headers2 = "From: $from\r\n";
    $headers2 .= "Reply-To: $from\r\n";
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($to, $subject2, $message2, $headers2);

    echo json_encode(['status' => 'success', 'message' => 'Thank you for contacting us! We will be in touch shortly.']);
    exit;
}
?>
