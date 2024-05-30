<?php
?>
<div class="carousel_cont container pr <?php echo $carouselSize?>">
    <div class="carousel_arrow carousel_arrow_left usn"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="carousel_invisable_arrow carousel_invisable_arrow_left usn"></div>
    <div class="carousel_slide_cont pr">
        <?php
        for ($i = 0; $i < $carouselSliesNumber; $i++) {
            echo "<div class='carousel_slide'>";
            echo "<div><img class='pa ofcvr' src='$carouselImg[$i]' alt=''></div>";
            echo "<div class='carousel_title tac   ".$languageArray['font-family'][0]."'>$carouselTitle[$i]</div>";
            echo "<div class='carousel_text tac  ".$languageArray['font-family'][1]."'>$carouselText[$i]</div>";
            echo "<a href='$carouselHrefs[$i]' class='carousel_btn main_btn  ".$languageArray['font-family'][0]."'>".$languageArray['fully']."</a>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="carousel_thumbnails_cont usn pen pr">
        <div class="carousel_thumbnail carousel_thumbnail1 dfjcac"></div>
        <div class="carousel_thumbnail carousel_thumbnail2 dfjcac"></div>
    </div>

    <div class="carousel_arrow carousel_arrow_right usn"><i class="fa-solid fa-chevron-right"></i></div>
    <div class="carousel_invisable_arrow carousel_invisable_arrow_right usn"></div>
</div>