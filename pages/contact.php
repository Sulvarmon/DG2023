<?php
session_start();
$title = "კონტაქტი";
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

require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();


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
    $hrefs = ["../home", "./contact"];
    $titles =  $languageArray['small menu contacts'];
    include "../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts'] ?></div>
    <div class="contact_cont container p2 bg1">
        <div class="dfjcac gap3 fww p5">
            <div class="contact_cont_item o0 to1 dfcjcas gap3">
                <div class="ls1 tac  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][1] ?></div>
                <div class="dfjlac gap2"><i class="icon_view usn fa-solid fa-phone-volume"></i><span class="contacts_icons  <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][2] ?></span></div>
                <div class="dfjlac gap2"><i class="icon_view fa-solid fa-location-dot"></i><span class="contacts_icons  <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][3] ?></span></div>
                <div class="dfjlac gap2"><i class="icon_view fa-solid fa-envelope"></i><span class="contacts_icons  <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][4] ?></span></div>
                <a href="https://www.facebook.com/" target="_blank" class="dfjcac gap2"><i class="contacts_fb icon_view fa-brands fa-facebook-f"></i><span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][10] ?></span></a>
            </div>
            <div class="contact_cont_item o0 to1">
                <div class="tac mb4 ls5  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][7] ?></div>
                <form class="dfcjcae">
                    <div class="dfjlac fww gap5 p2">
                        <div class="sender_name_and_mail_cont">
                            <div class="sender_name dfcjcas gap1">
                                <span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][5] ?></span>
                                <input class="p2 border br4" type="text" name="flname" autocomplete="on">
                            </div>
                            <div class="sender_mail dfcjcas gap1">
                                <span class=" <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][6] ?></span>
                                <input class="p2 border br4" type="email" name="email" autocomplete="on">
                            </div>
                        </div>
                        <div class="textarea_and_submit dfcjcas gap2 mt2">
                            <textarea class="p2 border br1  <?php echo $languageArray['font-family'][1] ?>" name="text" placeholder=<?php echo $languageArray['contacts page'][8] ?>></textarea>
                            <div class="dfcjlas gap2 w5">
                                <div class="g-recaptcha mt3" data-sitekey="<?php echo $_ENV['SITEKEY'] ?>"></div>
                                <div name="mailBtn" class="submit_mail_btn main_btn cp  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][9] ?></div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <div class="contact_cont_item o0 to1 map_cont p2 dfjcac">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2934.157417028751!2d41.689499184256206!3d42.16609798746906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDLCsDA5JzU4LjAiTiA0McKwNDEnMjguMyJF!5e1!3m2!1sen!2sge!4v1716137383137!5m2!1sen!2sge" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>

    <div class="mail_message">
        <div class="dfjcac"><span class="cw  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][11] ?></span></div>
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