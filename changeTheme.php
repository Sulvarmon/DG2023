<?php
if (!isset($_POST['changeThemeBtn'])) {
    die('No Access');
}

session_start();

$theme = $_POST['theme'];

$_SESSION['theme'] = $theme;