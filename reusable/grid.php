<div class="grid_cont">
    <?php
    for ($i = 0; $i < $itemNumber; $i++) {
        echo "<div class='grid_item dfcjcac bg1'>";
        echo "<a href='$gridHrefs[$i]' class='grid_img_cont usn pr'><div class='grid_dark_cover pa'></div><img class='pa ofcvr' src='$img$i.jpg' alt=''></a>";
        echo "<div class='dfcjcas gap1 pl2 pr2'><div class='grid_title wfc ".$languageArray['font-family'][0]."'>$titles[$i]</div><div class='dfjcac gap1'><i class='grid_date_icon db fa-solid fa-calendar-days'></i><div class='grid_date ".$languageArray['font-family'][0]."'>$date[$i]</div></div></div>";
        echo "<div class='grid_text pl2 pr2 ".$languageArray['font-family'][1]."'>$texts[$i]</div>";
        echo "<a href='$gridHrefs[$i]' class='grid_btn main_btn ".$languageArray['font-family'][0]."'>".$languageArray['fully']."</a>";
        echo "</div>";
    }
    ?>
</div>