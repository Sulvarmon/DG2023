<?php
session_start();
$title = "პროექტები";

define('variables', true);
$pageLvl = 1;
include "../reusable/variables.php";


#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php"); 
$words = explode("\\", $filename); 
$lastWord = trim(end($words)); 

include "../head.php";
include "../header.php";
include "../reusable/sessions-cookies.php";
include "../reusable/side-phone.php";
include "../reusable/side-contacts.php";

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
    $hrefs = ["../home", "./projectsPg"];
    $titles = $languageArray['small menu projectsPg'];
    include "../reusable/smallMenu.php";
    ?>

    <div class="title_of_page dfjcac container  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['projects'] ?></div>
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