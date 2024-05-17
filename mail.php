<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer's autoload file
require 'vendor/autoload.php';

use Dotenv\Dotenv;

if (!isset($_POST['mailBtn'])) {
    die('No Access');
}

$flname = $_POST['flname'];
$email = $_POST['mail'];
$text = $_POST['text'];

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL']; // Replace with your email
    $mail->Password = $_ENV['PASSWORD']; // Get password from environment variable
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($email, $flname); // Replace with your email
    $mail->addAddress($_ENV['MAIL']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'My subject';
    $mail->Body    = $text;

    $mail->send();
    echo 'Mail sent successfully.';
} catch (Exception $e) {
    error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    echo 'There was an issue sending your message. Please try again later.';
}
?>
