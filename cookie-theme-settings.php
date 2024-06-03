<?php
session_start();
if (!isset($_POST['setThemeCookie'])) {
    exit;
    header("Location: ./home");
}

$checked = $_POST['checked'] == 'true' ? true : false;

if ($checked) {
    $theme = $_SESSION['theme'];
    setcookie('theme', $theme, [
        'expires' => time() + (10 * 365 * 24 * 60 * 60), 
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);     
}else{
    setcookie('theme', 'whiite', [
        'expires' => time() - (10 * 365 * 24 * 60 * 60), 
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
    setcookie('theme', 'dark', [
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
