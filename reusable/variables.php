<?php

if (!defined('variables')) {
    die('No Access');
}

switch ($pageLvl) {
    case 0:
        $icon = "./img/logo.png";
        $css = "./styles.css";
        $js = "./app.js";
        $home = "./home";
        $about = "./pages/company/about";
        $team = "./pages/company/team";
        $marineWorks = "./pages/sectors/marine-works";
        $buildingMaterials = "./pages/sectors/building-materials";
        $civilIndustrialProjects = "./pages/sectors/civil-industrial-projects";
        $projects = "./pages/projectsPg";
        $news = "./pages/news";
        $contact = "./pages/contact";
        $language = "./language";
        if (isset($_COOKIE['language'])) {
            switch ($_COOKIE['language']) {
                case 'geo':
                    $defaultLanguage = './lan-geo.php';
                    break;
                case 'eng':
                    $defaultLanguage = './lan-eng.php';
                    break;
                case 'rus':
                    $defaultLanguage = './lan-rus.php';
                    break;
                default:
                    break;
            }
        } else {
            $defaultLanguage = './lan-geo.php';
        }

        break;
    case 1:
        $icon = "../img/logo.png";
        $css = "../styles.css";
        $js = "../app.js";
        $home = "../home";
        $about = "./company/about";
        $team = "./company/team";
        $marineWorks = "./sectors/marine-works";
        $buildingMaterials = "./sectors/building-materials";
        $civilIndustrialProjects = "./sectors/civil-industrial-projects";
        $projects = "projectsPg";
        $news = "news";
        $contact = "contact";
        $language = "../language";

        if (isset($_COOKIE['language'])) {
            switch ($_COOKIE['language']) {
                case 'geo':
                    $defaultLanguage = '../lan-geo.php';
                    break;
                case 'eng':
                    $defaultLanguage = '../lan-eng.php';
                    break;
                case 'rus':
                    $defaultLanguage = '../lan-rus.php';
                    break;
                default:
                    break;
            }
        } else {
            $defaultLanguage = '../lan-geo.php';
        }
        break;
    case 2:
        $icon = "../../img/logo.png";
        $css = "../../styles.css";
        $js = "../../app.js";
        $home = "../../home";
        $about = "../company/about";
        $team = "../company/team";
        $marineWorks = "marine-works";
        $buildingMaterials = "building-materials";
        $civilIndustrialProjects = "civil-industrial-projects";
        $projects = "../projectsPg";
        $news = "../news";
        $contact = "../contact";
        $language = "../../language";

        if (isset($_COOKIE['language'])) {
            switch ($_COOKIE['language']) {
                case 'geo':
                    $defaultLanguage = '../../lan-geo.php';
                    break;
                case 'eng':
                    $defaultLanguage = '../../lan-eng.php';
                    break;
                case 'rus':
                    $defaultLanguage = '../../lan-rus.php';
                    break;
                default:
                    break;
            }
        } else {
            $defaultLanguage = '../../lan-geo.php';
        }
        break;

    default:
        # code...
        break;
}
