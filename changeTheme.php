<?php
if (!isset($_POST['changeThemeBtn'])) {
    die('No Access');
}

session_start();

$theme = $_POST['theme'];
if (isset($_COOKIE['theme'])) {
    setcookie('theme', $theme, [
        'expires' => time() + (10 * 365 * 24 * 60 * 60), // 10 years from now
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
}

$_SESSION['theme'] = $theme;