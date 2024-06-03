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
        setcookie('language', 'geo', [
            'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
            'path' => '/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None'
        ]);
        break;
    case 'lan':
        setcookie('language', 'eng', [
            'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
            'path' => '/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None'
        ]);
        break;
    case 'язык':
        setcookie('language', 'rus', [
            'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
            'path' => '/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None'
        ]);
        break;
    default:
        setcookie('language', 'geo', [
            'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
            'path' => '/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None'
        ]);
        break;
}

setcookie('theme', $theme, [
    'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'None'
]);

$_SESSION['showCookiesDiv'] = false;

exit;
