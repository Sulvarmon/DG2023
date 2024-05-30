<?php
session_start();
$title = "სამოქალაქო და ინდუსტრიული პროექტები";
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

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php");
$words = explode("\\", $filename);
$lastWord = trim(end($words));

include "../../head.php";
include "../../header.php";
include "../../reusable/side-phone.php";
include "../../reusable/side-contacts.php";

if (isset($_SESSION['theme'])) {
    if ($_SESSION['theme'] == 'white') {
        echo '<div class="dn detect_theme" id="theme_white"></div>';
    } else {
        echo '<div class="dn detect_theme" id="theme_dark"></div>';
    }
} else {
    echo '<div class="dn detect_theme" id="theme_white"></div>';
}

?>

<div>
    <?php
    $numberOfDeepnes = 1;
    $hrefs = array("../../home", "./civil-industrial-projects");
    $titles = $languageArray['small menu civil-industrial-projects'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors']['titles'][1] ?></div>
    <div class="container bg1 p2">
        <div class="cip_first_img p2 mb3">
            <div class="pr oh"><img class="pa ofcvr" src="../../img/cip_xobi2.jpg" alt=""></div>
            <ul class="pl4">
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><b><?php echo $languageArray['sectors']['civil and industrial projects']['texts'][1] ?></b></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['civil and industrial projects']['texts'][2] ?></span></li>
            </ul>
        </div>


        <div class="cip_text">
            <p class="mb2 php <?php echo $languageArray['font-family'][1] ?>">
                <?php echo $languageArray['sectors']['civil and industrial projects']['texts'][3] ?>
            </p>
            <ul class="pl4">
                <?php

                $cipArray = $languageArray['sectors']['civil and industrial projects']['texts'][4];

                for ($i = 0; $i < 5; $i++) {
                    echo '<li><span class="' . $languageArray['font-family'][1] . '">' . $cipArray[$i] . '</span></li>';
                }
                ?>
            </ul>
        </div>

        <hr class="mt5 mb5">

        <div class="cip_section_wrapper">
            <?php
            $cipTitles = $languageArray['sectors']['civil and industrial projects']['texts'][5];
            $cipImgs = array("../../img/cip_tbilisi0.jpg", "../../img/cip_xobi0.jpg", "../../img/cip_xobi1.png");
            $cipTexts = $languageArray['sectors']['civil and industrial projects']['texts'][6];

            for ($i = 0; $i < 3; $i++) {
                echo '<div class="cip_section p2 ">';
                echo '<div class="cip_section_img_cont pr"><img class="pa ofcnt" src=' . $cipImgs[$i] . ' alt=""></div>';
                echo '<div class="cip_section_text_cont">';
                echo '<div class="dfjlac gap1"><i class="fa-solid fa-location-dot"></i><span class="' . $languageArray['font-family'][1] . '"><b>' . $cipTitles[$i] . '</b></span></div>';
                echo '<div><span class="' . $languageArray['font-family'][1] . '">' . $cipTexts[$i] . '</span></div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>

</div>

<?php

include "../../footer.php";
include "../../foot.php";

?>

<?php
define("visits", true);
include "../../visits-update.php";
?>