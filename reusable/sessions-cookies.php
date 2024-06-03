<?php

if (isset($_SESSION['theme'])) {
    if ($_SESSION['theme'] == 'white') {
        echo '<div class="dn detect_theme" id="theme_white"></div>';
    } else {
        echo '<div class="dn detect_theme" id="theme_dark"></div>';
    }
} else {
    echo '<div class="dn detect_theme" id="theme_white"></div>';
}

if (isset($_COOKIE['language'])) {
    echo '<div class="dn detect_cookie_lan" id="lan_cookie_allowed"></div>';
} else {
    echo '<div class="dn detect_cookie_lan" id="lan_cookie_rejected"></div>';
}

if (isset($_COOKIE['theme'])) {
    echo '<div class="dn detect_cookie_theme" id="theme_cookie_allowed"></div>';
} else {
    echo '<div class="dn detect_cookie_theme" id="theme_cookie_rejected"></div>';
}

?>