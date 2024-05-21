<?php
session_start();
$title = "სიახლეები";
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

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php"); 
$words = explode("\\", $filename); 
$lastWord = trim(end($words)); 

include "../head.php";
include "../header.php";
include "../reusable/side-phone.php";
include "../reusable/side-contacts.php";

#გრდიდის საერთო ცვლადები

$projectsTextNumber = 4;
$projectsTexts1 = $languageArray['news page']['dot texts'];

#ბოლო

?>
<?php
    $numberOfDeepnes = 1;
    $hrefs = ["../home", "./news"];
    $titles = $languageArray['small menu news'];
    include "../reusable/smallMenu.php";
    ?>

<div class="title_of_page dfjcac container <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news'] ?></div>
<div class="container news_cont p3 bg1">
    <hr>
    <div class="title_of_subsections mb5 <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news page']['titles'][0] ?></div>
    <?php
    $projectsTexts2 = $languageArray['news page']['under dot texts'][0];
    $projectsMainText = $languageArray['news page']['main texts'][0];
    $projImage = "../img/news0.jpg";
    include "../reusable/proj-content-texts.php";
    ?>

    <hr>
    <div class="title_of_subsections mb5 <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news page']['titles'][1] ?></div>
    <?php
    $projectsTexts2 = $languageArray['news page']['under dot texts'][1];
    $projectsMainText = $languageArray['news page']['main texts']["1"];
    $projImage = "../img/news1.jpg";
    include "../reusable/proj-content-texts.php";
    ?>

    <hr>
    <div class="title_of_subsections mb5 <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news page']['titles'][2] ?></div>
    <?php
    $projectsTexts2 = $languageArray['news page']['under dot texts'][2];
    $projectsMainText = $languageArray['news page']['main texts'][2];
    $projImage = "../img/news2.jpg";
    include "../reusable/proj-content-texts.php";
    ?>
</div>


</div>

<?php

include "../footer.php";
include "../foot.php";

?>

<?php
 define("visits", true);
 include "../visits-update.php";
?>