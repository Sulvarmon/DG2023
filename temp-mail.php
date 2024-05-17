<?php

require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!isset($_POST['mailBtn'])) {
    die('No Access');
}

$flname = $_POST['flname'];
$mail = $_POST['mail'];
$text = $_POST['text'];

$headers = "From: " . $flname . " <" . $mail . ">";

if (mail($_ENV['MAIL'], "My subject", $text, $headers)) {
    echo "Mail sent successfully.";
} else {
     echo "There was an issue sending your message. Please try again later.";
}