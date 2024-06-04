<?php

if (!defined('visits')) {
    die("No Access");
}

define("conn", true);
include("conn.php");

if (!isset($_SESSION[$lastWord])) { // თითოეულ გვერდზე შემოსვლის დადგენა
    $dbArray = [];

    $sql = "SELECT * FROM pages_visits";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($dbArray, $row);
        }
    }

    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]['page'] == $lastWord) {
            $newValue = $dbArray[$i]['visits'] + 1;
            $sql = "UPDATE pages_visits SET visits = '$newValue' WHERE page = '$lastWord'";
            mysqli_query($conn, $sql);
        }
    }

    $_SESSION[$lastWord] = true;
}


if (!isset($_SESSION['ipVisists'])) { 
    // get the real IP address of the visitor

    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $userIP = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IPs passing through proxies
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Check for the remote address (direct connection)
    else {
        $userIP = $_SERVER['REMOTE_ADDR'];
    }

    $ipExists = false;
    $dbArray = [];

    $sql = "SELECT * FROM ip_visits";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($dbArray, $row);
        }
    }

    // შემოწმება, არის თუ არა ვიზიტორე უკვე ბაზაში
    for ($i = 0; $i < count($dbArray); $i++) {
        if ($dbArray[$i]['ip'] == $userIP) {
            $newValue = $dbArray[$i]['visits'] + 1;
            $sql = "UPDATE ip_visits SET visits = '$newValue' WHERE ip = '$userIP'";
            mysqli_query($conn, $sql);
            $ipExists = true;
            break;
        }
    }

    if (!$ipExists) {
        echo $userIP;
        $sql = "INSERT INTO ip_visits (ip, visits) VALUES ('$userIP', 1)";
        mysqli_query($conn, $sql);
    }

    $_SESSION['ipVisists'] = true;
}

mysqli_close($conn);

exit;
