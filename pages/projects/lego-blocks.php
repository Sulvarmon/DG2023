<?php
session_start();
$title = "ლეგო-ბლოკები";

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

#projects variables
$projectsTextNumber = 7;
$projImage = "../../img/proj4.jpg";
$projectsTexts1 =  $languageArray['project page']['dot texts'];
$projectsTexts2 = $languageArray['project page']['under dot texts'][3];
$projectsMainText = $languageArray['project page']['main texts'][3];

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

<?php
    $numberOfDeepnes = 2;
    $hrefs = array("../../home","../projectsPg", "./lego-blocks");
    $titles = $languageArray['small menu lego-blocks'];
    include "../../reusable/smallMenu.php";
    ?>
<div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['project page']['titles'][3] ?></div>
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