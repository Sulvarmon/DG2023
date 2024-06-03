<?php
session_start();
if (!isset($_POST['themeCookieBtn'])) {
    exit;
    header("Location: ./home");
}

$allow = $_POST['allow'];
$theme = $_SESSION['theme'];

if ($allow == 'true') {
    switch ($lanCookieBtn) {
        case 'white':
            
            break;
        case 'dark':
            
            break;
        default:
            break;
    }
} 

exit;
