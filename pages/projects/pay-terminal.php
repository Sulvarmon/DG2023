<?php
session_start();
$title = "გადახდის ტერმინალი";
$icon = "../../img/logo.png";
$icon = "../../img/logo.png";
$css = "../../styles.css";
$js = "../../app.js";
$home = "../../home";
$about = "../company/about";
$team = "../company/team";
$marineWorks = "../sectors/marine-works";
$buildingMaterials = "../sectors/building-materials";
$civilIndustrialProjects = "../sectors/civil-industrial-projects";
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

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php"); 
$words = explode("\\", $filename); 
$lastWord = trim(end($words)); 

include "../../head.php";
include "../../header.php";
include "../../reusable/side-phone.php";
include "../../reusable/side-contacts.php";

#projects variables
$projectsTextNumber = 7;
$projImage = "../../img/proj5.jpg";
$projectsTexts1 =  $languageArray['project page']['dot texts'];
$projectsTexts2 = $languageArray['project page']['under dot texts'][4];
$projectsMainText = $languageArray['project page']['main texts'][4];

?>

<?php
    $numberOfDeepnes = 2;
    $hrefs = array("../../home","../projectsPg", "./pay-terminal");
    $titles = $languageArray['small menu pay-terminal'];
    include "../../reusable/smallMenu.php";
    ?>
<div class="title_of_page dfjcac container <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['project page']['titles'][4] ?></div>
<div class="container p3 bg1">
    <?php
    $reversed = false;
    include "../../reusable/next-prev-proj.php"
    ?>
    <div class="main_pg_line"></div>
    <?php
    include "../../reusable/proj-content-texts.php";
    ?>
    <div class="main_pg_line"></div>
    <?php
    $reversed = true;
    include "../../reusable/next-prev-proj.php"
    ?>
</div>

<?php

include "../../footer.php";
include "../../foot.php";

?>

<?php
 define("visits", true);
 include "../../visits-update.php";
?>