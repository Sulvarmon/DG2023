<?php
echo '<div class="projects_page_cont">';
    echo '<div class="pr"><img class="projects_img pa ofcnt o0 to1" src=' . $projImage . ' alt=""></div>';
    echo '<div class="dfcjlas">';
    for ($i = 0; $i < $projectsTextNumber; $i++) {

        echo "<ul class='project_texts pl4'><li class='fs4'><span class=' ".$languageArray['font-family'][1]."'>$projectsTexts1[$i]</span></li><span class='o0 to1 tal fs4  ".$languageArray['font-family'][1]."'>$projectsTexts2[$i]</span></ul>";
        echo "<hr>";
    }
    echo '</div>';
echo '</div>';
echo '<div class=" '.$languageArray['font-family'][1].' mt3">'.$projectsMainText.'</div>';
