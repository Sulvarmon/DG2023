<?php
session_start();
if (!isset($_POST['btn'])) {
    exit;
    header("Location: ./home");
}

$_SESSION['showCookiesDiv'] = false;


exit;
