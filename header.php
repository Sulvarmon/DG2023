<?php

if (!isset($_SESSION['languageArray'])) {
    $_SESSION['languageArray'] = include $defaultLanguage;
    $languageArray = $_SESSION['languageArray'];
} else {
    $languageArray = $_SESSION['languageArray'];
}

if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'white';
}

if (!isset($_SESSION['showCookiesDiv']) && !isset($_COOKIE['language']) && !isset($_COOKIE['theme'])) {
    $_SESSION['showCookiesDiv'] = true;
}

if (isset($_COOKIE['theme'])) {
    $_SESSION['theme'] = $_COOKIE['theme'];
}

?>

<div class="pen unfinished_website <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['unfinished website'] ?></div>

<header>
    <div class="header_cont container dfjbac pt1 pb1">
        <a href=<?php echo $home; ?> class="logo usn"></a>
        <div class="sm_menu_icon usn">
            <i class="theme sm_menu_icon_item sm_menu_icon_m fa-solid fa-bars"></i>
            <i class="theme sm_menu_icon_item sm_menu_icon_c fa-solid fa-xmark"></i>
        </div>
        <!-- sm screen -->
        <div class="db_menu p4 bg1">
            <div class="dfcjcas pb4">

                <div class="db_menu_about dfcjcas m1 usn pr">
                    <div class="dfjcac db_small_menu_about"><span class="db_menu_texts <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['company'] ?></span><i class="theme ml1 fa-solid fa-angle-down"></i></div>
                    <div class="db_menu_expand_about dn">
                        <ul class="dfcjcas gap1 ml3 mt3">
                            <li><a class="theme <?php echo $languageArray['font-family'][0] ?>" href=<?php echo $about ?>><?php echo $languageArray['about us'] ?></a></li>
                            <li><a class="theme <?php echo $languageArray['font-family'][0] ?>" href=<?php echo $team ?>><?php echo $languageArray['our team'] ?></a></li>
                        </ul>
                    </div>
                </div>

                <hr class="w5">
                <a href=<?php echo $projects; ?> class="db_menu_texts db_menu_projects m1 usn theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['projects'] ?></a>
                <hr class="w5">
                <a href=<?php echo $news; ?> class="db_menu_texts db_menu_news m1 usn theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news'] ?></a>
                <hr class="w5">

                <div class="db_menu_sector dfcjcas m1 usn pr">
                    <div class="dfjcac db_small_menu_sector"><span class="db_menu_texts <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors title'] ?></span><i class="theme ml1 fa-solid fa-angle-down"></i></div>
                    <div class="db_menu_expand_sector dn">
                        <ul class="dfcjcas gap1 ml3 mt3">
                            <li><a class="theme <?php echo $languageArray['font-family'][0] ?>" href=<?php echo $marineWorks ?>><?php echo $languageArray['marine works'] ?></a></li>
                            <li><a class="theme <?php echo $languageArray['font-family'][0] ?>" href=<?php echo $buildingMaterials ?>><?php echo $languageArray['building materials'] ?></a></li>
                            <li><a class="theme <?php echo $languageArray['font-family'][0] ?>" href=<?php echo $civilIndustrialProjects ?>><?php echo $languageArray['civil and industrial projects'] ?></a></li>
                        </ul>

                    </div>
                </div>

                <hr class="w5">
                <a href=<?php echo $contact; ?> class="db_menu_texts db_menu_contact m1 usn theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts'] ?></a>
                <hr class="w5">
                <div class="db_menu_lan m1 usn">
                    <div class="dfjlac"><span class="db_menu_texts <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language'] ?></span><i class="theme ml1 fa-solid fa-angle-down"></i></div>
                    <div class="dn">
                        <div class="dfcjcac">
                            <form class="usn mt1" action=<?php echo $language ?> method="post">
                                <button class="dfjcac gap1 cp" type="submit" name="lanBtn">
                                    <span class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language1'] ?></span>
                                    <div class="lan_flag <?php echo $languageArray['language1 flag'] ?>"></div>
                                </button>
                                <input class="dn" type="text" value=<?php echo $languageArray['language1'] ?> name="language">
                                <input class="dn" type="text" value=<?php echo $lastWord ?> name="lastWord">
                            </form>
                            <form class="usn mt1" action=<?php echo $language ?> method="post">
                                <button class="dfjcac gap1 cp" type="submit" name="lanBtn">
                                    <span class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language2'] ?></span>
                                    <div class="lan_flag <?php echo $languageArray['language2 flag'] ?>"></div>
                                </button>
                                <input class="dn" type="text" value=<?php echo $languageArray['language2'] ?> name="language">
                                <input class="dn" type="text" value=<?php echo $lastWord ?> name="lastWord">
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="w5">
                <div class="db_menu_texts db_menu_theme m1 usn theme dfcjcas gap2">
                    <span class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['theme'][1] . " " . $languageArray['theme'][2] ?></span>
                    <div class="dfjlac gap2">
                        <div class="theme_dot dfjcac pen">
                            <div class="theme_dot_inner_dark"></div>
                        </div>
                        <div class="theme_dot dfjcac cp">
                            <div class="theme_dot_inner_white"></div>
                        </div>
                    </div>
                </div>
                <hr class="w5">
                <div class="cookie_settings dfcjcas gap1 w3">
                    <div class="dfjcac gap1 cp"><span class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie'][5] ?></span><i class="cookie_arr fa-solid theme fa-angle-down ml1"></i></div>
                    <div class="cookie_settings_db dn">
                        <div class="dfcjcas gap1">
                            <div class="dfjcac gap1">
                                <div class="theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['types'][1] ?></div><input class="check_cookie lan_checked" type="checkbox">
                            </div>
                            <div class="dfjcac gap1">
                                <div class="theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['types'][2] ?></div><input class="check_cookie theme_checked" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- lg screen -->
        <div class="lg_menu dfjcac gap3">

            <div class="lg_menu_company dfjcac m1 usn p1 pr ">
                <span class="lg_menu_item theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['company'] ?></span><i class="theme ml1 fa-solid fa-angle-down lg_menu_expand_icon lg_menu_company_arr"></i>
                <div class="lg_menu_expand_cont company_db_cont p2 dn bgm">
                    <a href=<?php echo $about ?> class="menu_hover p1 wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['about us'] ?></a>
                    <a href=<?php echo $team ?> class="menu_hover p1 wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['our team'] ?></a>
                </div>
            </div>

            <a href=<?php echo $projects; ?> class="lg_menu_item lg_menu_projects m1 usn p1 menu_hover wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['projects'] ?></a>
            <a href=<?php echo $news; ?> class="lg_menu_item lg_menu_news m1 usn p1 menu_hover wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['news'] ?></a>

            <div class="lg_menu_sector dfjcac m1 usn p1 pr ">
                <span class="lg_menu_item theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['sectors title'] ?></span><i class="ml1 fa-solid theme fa-angle-down lg_menu_expand_icon lg_menu_sector_arr"></i>
                <div class="lg_menu_expand_cont  sector_db_cont p2 dn bgm">
                    <a href=<?php echo $marineWorks ?> class="menu_hover p1 wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['marine works'] ?></a>
                    <a href=<?php echo $buildingMaterials ?> class="menu_hover p1  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['building materials'] ?></a>
                    <a href=<?php echo $civilIndustrialProjects ?> class="menu_hover p1 wwn  <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['civil and industrial projects'] ?></a>
                </div>
            </div>

            <a href=<?php echo $contact; ?> class="lg_menu_item lg_menu_contact m1 usn p1 menu_hover <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['contacts'] ?></a>
        </div>
        <div class="dfjcac gap4">
            <div class="search_icon_cont icon_view icon_hover cp usn"><i class="fa-solid fa-magnifying-glass"></i></div>

            <div class="settings pr theme dn">
                <div><i class="settings_gear fa-solid fa-gear fa-xl cp"></i></div>
                <div class="l_db_settings p4 dn">
                    <div class="dfcjcac gap2">
                        <div class="theme_cont dn">
                            <div class="dfcjcac gap1 p1">
                                <div class="theme_text theme usn <?php echo $languageArray['font-family'][0] ?> "><?php echo $languageArray['theme'][1] ?></div>
                                <div class="dfjcac gap1">
                                    <div class="theme_dot dfjcac pen">
                                        <div class="theme_dot_inner_dark"></div>
                                    </div>
                                    <div class="theme_dot dfjcac cp">
                                        <div class="theme_dot_inner_white"></div>
                                    </div>
                                </div>
                                <div class="theme_text theme usn <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['theme'][2] ?></div>
                            </div>
                        </div>
                        <hr class="w5">
                        <div class="lan dn">
                            <div class="usn cp p1 dfjcac">
                                <div class="dfjcac tac theme <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language'] ?></div>
                                <i class="ml1 fa-solid theme fa-angle-down ml1"></i>
                            </div>
                            <div class="lan_expand_cont dn">
                                <div class="dfjcac bgm fww">
                                    <form class="usn p1" action=<?php echo $language ?> method="post">
                                        <button class="dfjcac gap1 cp " type="submit" name="lanBtn">
                                            <span class="menu_hover <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language1'] ?></span>
                                            <div class="lan_flag <?php echo $languageArray['language1 flag'] ?>"></div>
                                        </button>
                                        <input class="dn" type="text" value=<?php echo $languageArray['language1'] ?> name="language">
                                        <input class="dn" type="text" value=<?php echo $lastWord ?> name="lastWord">
                                    </form>
                                    <form class="usn p1" action=<?php echo $language ?> method="post">
                                        <button class="dfjcac gap1 cp " type="submit" name="lanBtn">
                                            <span class="menu_hover <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['language2'] ?></span>
                                            <div class="lan_flag <?php echo $languageArray['language2 flag'] ?>"></div>
                                        </button>
                                        <input class="dn" type="text" value=<?php echo $languageArray['language2'] ?> name="language">
                                        <input class="dn" type="text" value=<?php echo $lastWord ?> name="lastWord">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr class="w5">
                        <div class="cookie_settings dfcjcac gap1">
                            <div class="dfjcac gap1 cp"><span class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie'][5] ?></span><i class="cookie_arr fa-solid theme fa-angle-down ml1"></i></div>
                            <div class="cookie_settings_db dn">
                                <div class="dfcjcas gap1">
                                    <div class="dfjcac gap1">
                                        <div class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['types'][1] ?></div><input class="check_cookie lan_checked" type="checkbox">
                                    </div>
                                    <div class="dfjcac gap1">
                                        <div class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['types'][2] ?></div><input class="check_cookie theme_checked" type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="search_cont dn p3">
    <div class="container p4 br2">
        <div class="pr dfcjcac gap4 pt4 pb4">
            <div class="close_search p2 cp"><i class="fa-solid fa-xmark fa-xl cw"></i></div>
            <div class="cw <?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['search']['title'] ?></div>
            <form class="w3">
                <input type="search" name="dummyNameForChromeIssueError" class="search_input w5 <?php echo $languageArray['font-family'][0] ?> p2 br3" placeholder="<?php echo $languageArray['search']['placeholder'] ?>...">
            </form>
        </div>
        <ul class="searched_links dfcjcas gap2 mt3"></ul>
    </div>
</div>

<div class="learn_cookie_cont dn">
    <i class="expand_close fa-solid fa-xmark"></i>
    <div class="learn_cookie_content p2 dfcjlac gap2">
        <div class="theme tac"><b class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['cookie texts']['titles'][0] ?></b><i class="fa-solid fa-cookie-bite fa-xl ml2"></i></div>
        <p class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][0] ?></p>
        <div class="theme tac"><b class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['cookie texts']['titles'][1] ?></b></div>
        <p class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][1] ?></p>
        <ul class="pl3">
            <li class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][2] ?></li>
            <li class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][3] ?></li>
        </ul>
        <div class="theme tac"><b class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['cookie texts']['titles'][2] ?></b></div>
        <div class="theme tac <?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][5] ?></div>
        <div class="theme tac"><b class="<?php echo $languageArray['font-family'][0] ?>"><?php echo $languageArray['cookie']['cookie texts']['titles'][3] ?></b></div>
        <p class="<?php echo $languageArray['font-family'][1] ?>"><?php echo $languageArray['cookie']['cookie texts']['texts'][4] ?> <a class="<?php echo $languageArray['font-family'][1] ?>" target='_blank' href='https://allaboutcookies.org/'><?php echo $languageArray['cookie']['cookie texts']['texts'][6] ?></a></p>
    </div>
</div>

<?php


if ($_SESSION['showCookiesDiv']) {
    echo '<div class="cookie_cont br2 p2 wfc">';
    echo '<div class="dfcjcac gap2">';
    echo '<span class="' . $languageArray['font-family'][1] . '">' . $languageArray['cookie'][1] . '</span>';
    echo '<div class="dfjcac gap2 fww">';
    echo '<div class="allow_cookie br3 pl3 pr3 pt1 pb1 cp usn theme ' . $languageArray['font-family'][1] . '">' . $languageArray['cookie'][2] . '</div>';
    echo '<div class="reject_cookie br3 pl3 pr3 pt1 pb1 cp usn theme ' . $languageArray['font-family'][1] . '">' . $languageArray['cookie'][3] . '</div>';
    echo '<div class="learn_cookie br3 pl3 pr3 pt1 pb1 cp usn theme ' . $languageArray['font-family'][1] . '">' . $languageArray['cookie'][4] . '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>