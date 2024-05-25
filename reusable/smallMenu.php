<?php

echo'<div class="container small_navigation">';
    echo'<div class="dfjlac fww gap1 ">';
        echo'<a href='.$hrefs[0].' class="fs1 '.$languageArray['font-family'][0].'">'.$titles[0].'</a>';
        for ($i=0; $i < $numberOfDeepnes; $i++) { 
            $j = $i+1;
            echo'<i class="fa-solid fa-angles-right fs1 cd"></i>';
            echo'<a href='.$hrefs[$j].' class="fs1 '.$languageArray['font-family'][0].'">'.$titles[$j].'</a>';
        }
    echo'</div>';  
echo'</div>';