<?php
session_start();
if (!isset($_POST['setLanCookie'])) {
    exit;
    header("Location: ./home");
}

$checked = $_POST['checked'] == 'true' ? true : false;

if ($checked) {
    $language = $_SESSION['languageArray']['language'];
    switch ($language) {
        case 'ენა':
            setcookie('language', 'geo', [
                'expires' => time() + (10 * 365 * 24 * 60 * 60), 
                'path' => '/',
                'domain' => 'localhost',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'None'
            ]);
            break;
        case 'lan':
            setcookie('language', 'eng',[
                'expires' => time() + (10 * 365 * 24 * 60 * 60), 
                'path' => '/',
                'domain' => 'localhost',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'None'
            ]);
            break;
        case 'язык':
            setcookie('language', 'rus', [
                'expires' => time() + (10 * 365 * 24 * 60 * 60), 
                'path' => '/',
                'domain' => 'localhost',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'None'
            ]);
            break;
        default:
            setcookie('language', 'geo', [
                'expires' => time() + (10 * 365 * 24 * 60 * 60), 
                'path' => '/',
                'domain' => 'localhost',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'None'
            ]);
            break;
    }
} else {
    setcookie('language', 'eng', [
        'expires' => time() - (10 * 365 * 24 * 60 * 60), 
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
    setcookie('language', 'rus', [
        'expires' => time() - (10 * 365 * 24 * 60 * 60), 
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
    setcookie('language', 'geo', [
        'expires' => time() - (10 * 365 * 24 * 60 * 60), 
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
}

$_SESSION['showCookiesDiv'] = false;

exit;
