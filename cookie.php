<?php

if (!isset($_POST['cookieBtn'])) {
    exit;
    header("Location: ./home");
}

session_start();

$allow = $_POST['allow'];
$language = $_SESSION['languageArray']['language'];

if ($allow == 'true') {
    $_SESSION['allowCookie'] = true;
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
            break;
    }
} else {
    $_SESSION['allowCookie'] = false;
}

exit;
