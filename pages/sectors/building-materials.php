<?php
session_start();
$title = "სამშენებლო მასალები";

define('variables', true);
$pageLvl = 2;
include "../../reusable/variables.php";

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php");
$words = explode("\\", $filename);
$lastWord = trim(end($words));

include "../../head.php";
include "../../header.php";
include "../../reusable/sessions-cookies.php";
include "../../reusable/side-phone.php";
include "../../reusable/side-contacts.php";

if(isset($_SESSION['theme'])){
    if ($_SESSION['theme'] == 'white') {
        echo '<div class="dn detect_theme" id="theme_white"></div>';
    }else{
        echo '<div class="dn detect_theme" id="theme_dark"></div>';  
    }
}else{
    echo '<div class="dn detect_theme" id="theme_white"></div>';
}

?>


<div>
    <?php
    $numberOfDeepnes = 1;
    $hrefs = array("../../home", "./building-materials");
    $titles = $languageArray['small menu building-materials'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors']['titles'][0] ?></div>
    <div class="container bg1 p2">
        <div class="building_materials_main_img_texts_wrapper dfjaac fww gap1">
            <div class="building_materials_main_img o0 to1"></div>
            <div>
                <p class=" <?php echo $languageArray['font-family'][1] ?>">
                    <?php echo $languageArray['sectors']['building materials']['texts'][1] ?>
                </p>
                <br>
                <p class=" <?php echo $languageArray['font-family'][1] ?>">
                    <?php echo $languageArray['sectors']['building materials']['texts'][2] ?>
                </p>
                <br>
                <p class=" <?php echo $languageArray['font-family'][1] ?>">
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