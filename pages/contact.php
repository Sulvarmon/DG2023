<?php

$title = "კონტაქტი";
$icon = "../img/logo.png";
$langLink1 = "./en/index-en";
$langLink2 = "./ru/index-ru";
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
$fb = "https://www.facebook.com/";
$language = "../language";

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php"); 
$words = explode("\\", $filename); 
$lastWord = trim(end($words)); 

include "../head.php";
include "../header.php";
include "../reusable/side-phone.php";
include "../reusable/side-contacts.php";

?>

<div>
    
<?php
    $numberOfDeepnes = 1;
    $hrefs = ["../home", "./contact"];
    $titles =  $languageArray['small menu contacts'];
    include "../reusable/smallMenu.php";
    ?>
    <div class="title_of_page dfjcac container <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts'] ?></div>
    <div class="contact_cont container p2 bg1">
        <div class="dfjcac gap3 fww p5">
            <div class="contact_cont_item o0 to1 dfcjcas gap3 p3 bg1">
                <div class="ls1 tac <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][1] ?></div>
                <div class="dfjcac gap2"><i class="icon_view usn fa-solid fa-phone-volume"></i><span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][2] ?></span></div>
                <div class="dfjcac gap2"><i class="icon_view fa-solid fa-location-dot"></i><span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][3] ?></span></div>
                <div class="dfjcac gap2"><i class="icon_view fa-solid fa-envelope"></i><span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][4] ?></span></div>
                <a href="https://www.facebook.com/" target="_blank" class="dfjcac gap2"><i class="contacts_fb icon_view fa-brands fa-facebook-f"></i><span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][10] ?></span></a>
            </div>
            <div class="contact_cont_item o0 to1 p3 bg1">
                <div class="tac mb4 ls5 <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][7] ?></div>                
                <form class="mail_form_cont dfjlac fww gap5">
                    <div class="sender_name_and_mail_cont">
                        <div class="sender_name dfcjcas gap1">
                            <span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][5] ?></span>
                            <input class="p2 border br4" type="text" name="flname" autocomplete="on">
                        </div>
                        <div class="sender_mail dfcjcas gap1">
                            <span class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['contacts page'][6] ?></span>
                            <input class="p2 border br4" type="email" name="email" autocomplete="on">
                        </div>
                    </div>
                    <div class="textarea_and_submit dfcjcas gap2 mt2">
                        <textarea class="p2 border br1 <?php echo $languageArray['font-family'][1] ?>" rows="10" cols="20" name="comment" placeholder=<?php echo $languageArray['contacts page'][8] ?>></textarea>
                        <div class="fubmit_mail_btn main_btn cp <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts page'][9] ?></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="contact_cont_item o0 to1 map_cont p2 dfjcac">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1467.08397232512!2d41.69163!3d42.165871!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sge!4v1713263073032!5m2!1sen!2sge" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
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