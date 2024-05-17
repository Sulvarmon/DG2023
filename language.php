<?php
session_start();
if (isset($_POST['lanBtn'])) {
    $language = $_POST['language'];
    $lastWord = $_POST['lastWord'];
    switch ($language) {
        case 'ინგ':
        case 'eng':
        case 'анг':
            $_SESSION['languageArray'] = include "./lan-eng.php";
            break;
        case 'რუს':
        case 'rus':
        case 'рус':
            $_SESSION['languageArray'] = include "./lan-ru.php";
            break;
        case 'ქარ':
        case 'geo':
        case 'гру':
            $_SESSION['languageArray'] = include "./lan-geo.php";
            break;
        default:
            break;
    }

    #გადასამისამართებელი გვერდის განსაზღვრა

    switch ($lastWord) {
        case 'home':
            header("Location: ./home");
            exit();
            break;
        case 'contact':
            header("Location: ./pages/contact");
            exit();
            break;
        case 'news':
            header("Location: ./pages/news");
            exit();
            break;
        case 'projectsPg':
            header("Location: ./pages/projectsPg");
            exit();
            break;
        case 'about':
            header("Location: ./pages/company/about");
            exit();
            break;
        case 'team':
            header("Location: ./pages/company/team");
            exit();
            break;
        case 'berth-7':
            header("Location: ./pages/projects/berth-7");
            exit();
            break;
        case 'berth-15':
            header("Location: ./pages/projects/berth-15");
            exit();
            break;
        case 'container-terminal':
            header("Location: ./pages/projects/container-terminal");
            exit();
            break;
        case 'lego-blocks':
            header("Location: ./pages/projects/lego-blocks");
            exit();
            break;
        case 'pay-terminal':
            header("Location: ./pages/projects/pay-terminal");
            exit();
            break;
        case 'poti-apartment':
            header("Location: ./pages/projects/poti-apartment");
            exit();
            break;
        case 'building-materials':
            header("Location: ./pages/sectors/building-materials");
            exit();
            break;
        case 'civil-industrial-projects':
            header("Location: ./pages/sectors/civil-industrial-projects");
            exit();
            break;
        case 'marine-works':
            header("Location: ./pages/sectors/marine-works");
            exit();
            break;

        default:
            header("Location: ./home");
            exit();
            break;
    }
} else {
    header("Location: ./home");
    exit();
}
