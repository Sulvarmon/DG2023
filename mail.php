<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer's autoload file
require 'vendor/autoload.php';

require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!isset($_POST['mailBtn'])) {
    die('No Access');
}

$flname = $_POST['flname'];
$email = $_POST['email'];
$text = $_POST['text'];
$recaptcha = $_POST['gRecaptchaResponse'];

//test captcha
if ($recaptcha == '') {
    echo 'not good';
    exit;
}

$secret = $_ENV['SERVERKEY'];
$var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptcha);
$array = json_decode($var, true);

if(!$array['success']){
    echo 'not good';
    exit;
}

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL']; // Replace with your email
    $mail->Password = $_ENV['MAILPASSWORD']; // Get password from environment variable
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($email, $flname); // Replace with your email
    $mail->addAddress($_ENV['MAIL']);
    $mail->addReplyTo($email, $flname); // Sender's email and name


    // Content
    $mail->isHTML(true);
    $mail->Subject = 'My subject';
    $mail->Body    = $text;

    $mail->send();
    echo 'good';
} catch (Exception $e) {
    // error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    echo 'not good';
}
