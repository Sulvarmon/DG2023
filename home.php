<?php
session_start();
$title = "მთავარი გვერდი";
$icon = "./img/logo.png";
$css = "./styles.css";
$js = "./app.js";
$home = "./home";
$about = "./pages/company/about";
$team = "./pages/company/team";
$marineWorks = "./pages/sectors/marine-works";
$buildingMaterials = "./pages/sectors/building-materials";
$civilIndustrialProjects = "./pages/sectors/civil-industrial-projects";
$projects = "./pages/projectsPg";
$news = "./pages/news";
$contact = "./pages/contact";
$language = "./language";

// setcookie('language', 'eng', time() - (10 * 365 * 24 * 60 * 60), '/');
// setcookie('language', 'rus', time() - (10 * 365 * 24 * 60 * 60), '/');
// setcookie('language', 'geo', time() - (10 * 365 * 24 * 60 * 60), '/');

if (isset($_COOKIE['language'])) {
    switch ($_COOKIE['language']) {
        case 'geo':
            $defaultLanguage = './lan-geo.php';
            break;
        case 'eng':
            $defaultLanguage = './lan-eng.php';
            break;
        case 'rus':
            $defaultLanguage = './lan-rus.php';
            break;
        default:
            break;
    }
} else {
    $defaultLanguage = './lan-geo.php';
}

#ფაილის გზის დასახელების ბოლო სიტყვის გაგება .php მდე
$path = __FILE__;
$filename = basename($path, ".php");
$words = explode("\\", $filename);
$lastWord = trim(end($words));

include "head.php";
include "header.php"; // სესის ცვლადები მოქმედებს ჰედერის შემდეგ: ჰედერში არის სესია გახსნილი

$languageArray = $_SESSION['languageArray']; # უნდა იყოს აქ ჰედერის შემოტანის შემდეგ, რადგან ჰედერში იწყება სესია

#grid variables
$date = $languageArray['grid dates'];
$itemNumber = 3;
$titles = $languageArray['grid titles'];
$texts = $languageArray['grid text'];
$img = "./img/news";
$gridHrefs = array("./pages/news", "./pages/news", "./pages/news");
#end


#carousel variables
$carouselSize = "carousel_lg_cont";
$carouselTitle = $languageArray['carousel titles'];
$carouselImg = ["./img/proj3.jpg", "./img/proj4.jpg", "./img/proj0.jpg", "./img/proj1.jpg", "./img/proj2.jpg"];
$carouselHrefs = ["pages/projects/container-terminal", "pages/projects/lego-blocks", "pages/projects/poti-apartment", "pages/projects/berth-7", "pages/projects/berth-15"];
$carouselText = $languageArray['carousel text'];
$carouselSliesNumber = 5;
#end

?>
<?php include "./reusable/side-phone.php" ?>
<?php include "./reusable/side-contacts.php" ?>

<div class="home_page_image pr">
    <div class="container">
        <div class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['gd2023'] ?></div>
    </div>
    <img class="home_page_image_img usn pen" src="./img/mainImg.jpg" alt="home page image">
    <img class="home_page_image_img usn pen" src="./img/opcar2.jpg" alt="home page image">
    <img class="home_page_image_img usn pen" src="./img/opcar0.jpg" alt="home page image">
    <img class="home_page_image_img usn pen" src="./img/opcar1.jpg" alt="home page image">
</div>

<div class="container bg1 br1 p2 mt3">

    <div class="title_of_sections <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news'] ?></div>
    <?php include "./reusable/grid.php" ?>

    <div class="title_of_sections <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['important projects'] ?></div>
    <?php include "./reusable/carousel.php" ?>

    <div class="main_pg_line"></div>

    <div class="title_of_sections <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['about company'] ?></div>
    <div class="home_pg_about_section_cont p2">

        <div class="home_pg_about_section_img_wrapper"></div>
        <br>
        <div class="home_pg_about_section_text_btn dfcjcac gap3 mt2">
            <p class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['about company text'] ?></p>
            <a href="./pages/company/about" class="main_btn <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['fully'] ?></a>
        </div>

    </div>

</div>

<?php
include "footer.php";
include "foot.php";
?>

<?php
#გვერდების ნახვების დათვლა
define("visits", true);
include "visits-update.php";
?>