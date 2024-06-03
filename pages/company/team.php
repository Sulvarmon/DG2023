<?php
session_start();
$title = "ჩვენი გუნდი";
$icon = "../../img/logo.png";
$css = "../../styles.css";
$js = "../../app.js";
$home = "../../home";
$about = "about";
$team = "team";
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
include "../../reusable/sessions-cookies.php";
include "../../reusable/side-phone.php";
include "../../reusable/side-contacts.php";


#stuff members variables
$stuffNumber = 3;
$stuffImages = array("../../img/deputy.jpg", "../../img/partner.jpg", "../../img/independent.jpg");
$stuffNames = $languageArray['team members'][1];
$stuffPosition = $languageArray['team positions'][1];
#end

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
    $hrefs = ["../../home", "./team"];
    $titles = $languageArray['small menu team'];
    include "../../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['our team'] ?></div>
    <div class="container team_cont_wrapper p3 bg1">
        <div class="team_photo o0 to1"></div>
        <div class="team_cont mt3">
            <p class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['team texts'][0] ?></p>
            <br>
            <p>
            <p class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['team texts'][1] ?></p>
            </p>
            <br>
            <p>
            <p class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['team texts'][2] ?></p>
            </p>
        </div>
        <div class="title_of_sections  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['team titles'][0] ?></div>
        <hr class="mb5">
        <div class="team_member_cont dfcjcac gap2 ma">
            <ul class="pl4">
                <li class="team_member_name"><span class=" <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['team members'][0] ?></span></li>
                <li class="team_member_position  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['team positions'][0] ?></li>
            </ul>
            <img class="team_member_img o0 t01" width="200" height="200" src="../../img/director.jpg" alt="">
        </div>
        <div class="title_of_sections  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['team titles'][1] ?></div>
        <hr class="mb5">
        <div class="supervision">
            <?php

            for ($i = 0; $i < $stuffNumber; $i++) {
                echo "<div class='team_member_cont dfcjcac gap2 ma'>";
                echo '<ul class="pl4">';
                echo '<li class="team_member_name"><span class="' . $languageArray['font-family'][0] . '">' . $stuffNames[$i] . '</span></li>';
                echo '<li class="team_member_position ' . $languageArray['font-family'][0] . '">' . $stuffPosition[$i] . '</li>';
                echo '</ul>';
                echo '<img class="team_member_img o0 to1" width="200" height="200" src=' . $stuffImages[$i] . ' alt="">';               
                echo '</div>';
            }
            ?>

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