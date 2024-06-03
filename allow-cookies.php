<?php
session_start();
if (!isset($_POST['btn'])) {
    exit;
    header("Location: ./home");
}

$language = $_SESSION['languageArray']['language'];
$theme = $_SESSION['theme'];

switch ($language) {
    case 'ენა':
        setcookie('language', 'geo', time() + (10 * 365 * 24 * 60 * 60), '/');
        break;
    case 'lan':
        setcookie('language', 'eng', time() + (10 * 365 * 24 * 60 * 60), '/');
        break;
    case 'язык':
        setcookie('language', 'rus', time() + (10 * 365 * 24 * 60 * 60), '/');
        break;
    default:
        setcookie('language', 'geo', time() + (10 * 365 * 24 * 60 * 60), '/');
        break;
}

setcookie('theme', $theme, time() + (10 * 365 * 24 * 60 * 60), '/');

$_SESSION['showCookiesDiv'] = false;

exit;
