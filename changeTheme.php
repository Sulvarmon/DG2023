<?php
if (!isset($_POST['changeThemeBtn'])) {
    die('No Access');
}

session_start();

$theme = $_POST['theme'];
if (isset($_COOKIE['theme'])) {
    setcookie('theme', $theme, time() + (10 * 365 * 24 * 60 * 60), '/');
}

$_SESSION['theme'] = $theme;