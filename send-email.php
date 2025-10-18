<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = trim($_POST["message"]);

    if (empty($message)) {
        echo "Message cannot be empty.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Change if using another email provider
        $mail->SMTPAuth = true;
        $mail->Username = 'jandebbnz@gmail.com'; // Replace with your email
        $mail->Password = 'vmel vpil bjcw wxzm'; // Use an App Password, NOT your real password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Details
        $mail->setFrom('your-email@gmail.com', 'Your Name'); // Change sender info
        $mail->addAddress('jandebbnz@gmail.com'); // Your email

        $mail->Subject = "Valentine's Response";
        $mail->Body = "Someone sent you a message:\n\n" . $message;

        $mail->send();
        echo "Your message has been sent!";
    } catch (Exception $e) {
        echo "Email failed to send. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>