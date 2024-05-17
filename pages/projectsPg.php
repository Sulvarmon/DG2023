<?php

$title = "პროექტები";
$icon = "../img/logo.png";
$langLink1 = "./en/index-en";
$langLink2 = "./ru/index-ru";
$css = "../styles.css";
$js = "../app.js";
$eng = "../img/eng.png";
$ru = "../img/ru.png";
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
    $hrefs = ["../home", "./projectsPg"];
    $titles = $languageArray['small menu projectsPg'];
    include "../reusable/smallMenu.php";
    ?>

    <div class="title_of_page dfjcac container <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['projects'] ?></div>
    <div class="bg1 p2 container">

        <?php
        $date = $languageArray['projects dates'];
        $itemNumber = 6;
        $titles = $languageArray['projects titles'];
        $texts = $languageArray['projects texts'];
        $img = "../img/proj";
        $gridHrefs = array("./projects/poti-apartment","./projects/berth-7","./projects/berth-15","./projects/container-terminal","./projects/lego-blocks","./projects/pay-terminal");
        include "../reusable/grid.php";
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