<?php
session_start();
$title = "საზღვაო სამუშაოები";
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
    $hrefs = array("../../home","./marine-works");
    $titles = $languageArray['small menu marine-works'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors']['titles'][2] ?></div>

    <div class="container bg1 p2">
        <div class="marine_works_imgs_wrapper">
            <div class="marine_works_img marine_works_main_img"></div>
            <div class="marine_works_secondary_images_wrapper dfjaac gap2">
                <div class="marine_works_img marine_works_secondary_img"></div>
                <div class="marine_works_img marine_works_secondary_img"></div>
            </div>
        </div>


        <div class="marine_works_text_wrapper mt5">
            <hr class="mb5">
            <p class="mb3  <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][1] ?></p>
            <ul class="pl5">
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][2] ?></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][3] ?></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][4] ?></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][5] ?></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][6] ?></span></li>
                <li><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][7] ?></span></li>
            </ul>
            <p class="mt3 $languageArray['font-family'][1] ?>"><?php echo $languageArray['sectors']['marine works']['texts'][8] ?></p>
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