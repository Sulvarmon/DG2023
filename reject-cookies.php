<?php
session_start();
if (!isset($_POST['btn'])) {
    die("No Access");    
}

$_SESSION['showCookiesDiv'] = false;


exit;
