<?php

    if (!$reversed) {
        echo '<div class="dfjcac gap5">';
        echo '<a href="#" class="prev_proj dfjcac gap1 menu_hover"><i class="fa-solid fa-angles-left"></i><span class="'.$languageArray['font-family'][0].'">'.$languageArray['project page']['previous'].'</span></a>';
        echo '<a href="#" class="next_proj dfjcac gap1 menu_hover"><span class="tar '.$languageArray['font-family'][0].'">'.$languageArray['project page']['next'].'</span><i class="fa-solid fa-angles-right"></i></a>';
        echo '</div>';
        
        echo '<div class="projects_thumbnail dfjcac p2 gap2 mt4">';
        $projHrefs = array("./poti-apartment", "./berth-7", "./berth-15", "./container-terminal", "./lego-blocks", "./pay-terminal");
        $projNumber = 6;
        for ($i = 0; $i < $projNumber; $i++) {
            $j = $i + 1;
            echo '<a href="' . $projHrefs[$i] . '" class="dfjcac p2 usn icon_view icon_hover">' . $j . '</a>';
        }
        echo '</div>';
    }else{
        echo '<div class="projects_thumbnail dfjcac p2 gap2 mb4">';
        $projHrefs = array("./poti-apartment", "./berth-7", "./berth-15", "./container-terminal", "./lego-blocks", "./pay-terminal");
        $projNumber = 6;
        for ($i = 0; $i < $projNumber; $i++) {
            $j = $i + 1;
            echo '<a href="' . $projHrefs[$i] . '" class="dfjcac p2 usn icon_view icon_hover">' . $j . '</a>';
        }
        echo '</div>';

        echo '<div class="dfjcac gap5">';
        echo '<a href="#" class="prev_proj dfjcac gap1 menu_hover"><i class="fa-solid fa-angles-left"></i><span class="'.$languageArray['font-family'][0].'">'.$languageArray['project page']['previous'].'</span></a>';
        echo '<a href="#" class="next_proj dfjcac gap1 menu_hover"><span class="tar '.$languageArray['font-family'][0].'">'.$languageArray['project page']['next'].'</span><i class="fa-solid fa-angles-right"></i></a>';
        echo '</div>';
    }



?>