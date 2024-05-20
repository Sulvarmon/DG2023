<?php

if (!isset($_POST['searchSubmitBtn'])) {
    exit;
    header("location: home");
}

$geo = include "./lan-geo.php";
$eng = include "./lan-eng.php";
$ru = include "./lan-rus.php";

$projectTitlesArrGe = $geo['project page']['titles'];
$projectTitlesArrEn = $eng['project page']['titles'];
$projectTitlesArrRu = $ru['project page']['titles'];

$data = array_merge($projectTitlesArrGe, $projectTitlesArrEn, $projectTitlesArrRu);

echo json_encode($data);

exit;
