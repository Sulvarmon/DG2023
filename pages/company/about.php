<?php
session_start();
$title = "ჩვენს შესახებ";

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
    $hrefs = ["../../home","./about"];
    $titles = $languageArray['small menu about'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['about us'] ?></div>
    <div class="about_cont container p3 bg1">
        <div class="about_img_cont o0 to1"></div>
        <div class="about_cont_text mt4">
            <p class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['about us texts'][0] ?></p>
            <br>
            <ul class="pl4">
                <?php
                $listItems1 =  $languageArray['about us texts'][1];
                for ($i = 0; $i < 4; $i++) {
                    echo '<li class="o0"><span class=" '.$languageArray['font-family'][1].'">' . $listItems1[$i] . '</span></li>';
                }
                ?>
            </ul>
            <br>
            <p class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['about us texts'][2] ?></p>
            <br>
            <ul class="pl4">
                <?php
                $listItems2 =  $languageArray['about us texts'][3];
                for ($i = 0; $i < 3; $i++) {
                    echo '<li class="o0"><span class=" '.$languageArray['font-family'][1].'">' . $listItems2[$i] . '</span></li>';
                }
                ?>
            </ul>
            <br>
            <p class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['about us texts'][4] ?></p>
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