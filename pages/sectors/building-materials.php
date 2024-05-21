<?php
session_start();
$title = "სამშენებლო მასალები";
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

?>


<div>
    <?php
    $numberOfDeepnes = 1;
    $hrefs = array("../../home", "./building-materials");
    $titles = $languageArray['small menu building-materials'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors']['titles'][0] ?></div>
    <div class="container bg1 p2">
        <div class="building_materials_main_img_texts_wrapper dfjaac fww gap1">
            <div class="building_materials_main_img o0 to1"></div>
            <div>
                <p class="<?php echo $languageArray['font-family'][1] ?>">
                    <?php echo $languageArray['sectors']['building materials']['texts'][1] ?>
                </p>
                <br>
                <p class="<?php echo $languageArray['font-family'][1] ?>">
                    <?php echo $languageArray['sectors']['building materials']['texts'][2] ?>
                </p>
                <br>
                <p class="<?php echo $languageArray['font-family'][1] ?>">
                    <?php echo $languageArray['sectors']['building materials']['texts'][3] ?>
                </p>

            </div>
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