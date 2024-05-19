$(window).on("load", function () {

    $("body").fadeIn(1000)

    // ცვლადები

    var langSlider = { value: true };
    var smallAbout = { value: true };
    var smallSector = { value: true };
    var slideTimer;
    var manPgOpacityCarouselCurrentCounter = { value: 1 }
    var projectsPagesTitles = ["ფოთი აპარტამენტი", "ნავმისადგომი-7", "ნავმისადგომი-15",
        "საკონტეინერო ტერმინალი", "ლეგო-ბლოკები", "გადახდის ტერმინალი"]  //ყველა პროექტის სათაურის ჩამონათვალი    
    var allPages = ['მთავარი გვერდი', 'პროექტები', 'სიახლეები', 'კონტაქტი', 'ჩვენს შესახებ',
        'ჩვენი გუნდი', 'ნავმისადგომი-7', 'ნავმისადგომი-15', 'საკონტეინერო ტერმინალი', 'ლეგო-ბლოკები', 'გადახდის ტერმინალი',
        'ფოთი აპარტამენტი', 'სამშენებლო მასალები', 'სამოქალაქო და ინდუსტრიული პროექტები', 'საზღვაო სამუშაოები',
    ]
    var projectPathsFromAllLocation = {
        distance3: ['./pages/projects/berth-7', './pages/projects/berth-15', './pages/projects/container-terminal', './pages/projects/lego-blocks', './pages/projects/pay-terminal', './pages/projects/poti-apartment',],
        distance1: ['./projects/berth-7', './projects/berth-15', './projects/container-terminal', './projects/lego-blocks', './projects/pay-terminal', './projects/poti-apartment',],
        distance2: ['../projects/berth-7', '../projects/berth-15', '../projects/container-terminal', '../projects/lego-blocks', '../projects/pay-terminal', '../projects/poti-apartment',],
        distance0: ['./berth-7', './berth-15', './container-terminal', './lego-blocks', './pay-terminal', './poti-apartment',],
    }
    //ცვლადების დასასრული

    //ფუნქციები       


    //  კლიკზე ჩამოშლა მობილურის მენიუს
    function expandMenu(clickedEl, variable, expandEl, rotateArrow) {
        $(`${clickedEl}`).click(function () { //კლიკი ელემენტზე
            if (variable.value) { // თუ კლიკი ნებადართულია, ანუ თუ მენიუ აკეცილია
                $(`${expandEl}`).slideDown(300) //ჩამოშლა მენიუს
                $(`${rotateArrow}`).css({ transform: 'rotate(0deg)' }) // მენიუს ისრის ანიმაცია
                variable.value = false // მცდარი ნიშნაავს რომ მენიუ ჩამოშლილ მდგომარეობაშია
            } else { // თუ მენიუ ჩამოშლილია
                $(`${expandEl}`).slideUp(300) // მენიუს აკეცვა
                $(`${rotateArrow}`).css({ transform: 'rotate(-90deg)' }) // მენიუს ისრის ანიმაცია
                variable.value = true // ჭეშმარიტი ნიშნავს რომ მენიუ აკეცილ მდგომარეობაშია
            }
        })
    }

    function elementIsInViewport(element) { // ადგენს ელემენტი არის თუ არა მხედველობის არეში და აბრუნებს ჭ ან მ მნიშვნელობებს.
        var windowTop = $(window).scrollTop(); // ეკრანის ზევითა საზღვრის დაშორება დოკუმენტის ზემოდან
        var windowBottom = windowTop + $(window).height(); // ეკრანის ქვევითა საზღვრის დაშორება დოკუმენტის ზემოდან
        var elemTop = $(element).offset().top;// ელემენტის ზევითა საზღვრის დაშორება დოკუმენტის ზემოდან 
        var elemBottom = elemTop + $(element).height();// ელემენტის ქვევითა საზღვრის დაშორება დოკუმენტის ზემოდან

        /**თუ ელემენტის თავი მოთავსებულია ეკრანის თავსა და ბოლოს შორის ან
         * ელემენტის ბოლო მოთავსებულია ეკრანის თავსა და ბოლოს შორის
         */
        if (((elemTop < windowBottom) && (elemTop > windowTop)) || ((elemBottom < windowBottom) && (elemBottom > windowTop))) {
            return true
        } else {
            return false
        }
    }

    function inputFieldFocusMode(element) {
        $(element).focus(function () {
            $(this).css({ border: "1px solid #b63a3a" })
        }).blur(function () {
            $(this).css({ border: "1px solid #3039b6" })
        })
    }

    $('.sm_menu_icon').click(function () {
        $('.sm_menu_icon').css('pointer-events', 'none');
        if ($('.sm_menu_icon_m').css('opacity') == 1) {
            $('.db_menu').stop().slideDown(300)
            $('.sm_menu_icon_m').css('opacity', 0)
            $('.sm_menu_icon_c').css('opacity', 1)
            $('.sm_menu_icon').css('pointer-events', 'auto');
        } else {
            $('.db_menu').stop().slideUp(300)
            $('.sm_menu_icon_m').css('opacity', 1)
            $('.sm_menu_icon_c').css('opacity', 0)
            $('.sm_menu_icon').css('pointer-events', 'auto');
        }
    })

    function menuSlides(enterEl, expandEl, rotateArrow) {
        $(`${enterEl}`).mouseenter(function () {
            $(`${expandEl}`).stop().slideDown(300);
            $(`${rotateArrow}`).css({ transform: 'rotate(0deg)' })
        }).mouseleave(function () {
            slideTimer = setTimeout(function () {
                if (!$(`${enterEl}`).is(":hover") && !$(`${expandEl}`).is(":hover")) {
                    $(`${expandEl}`).stop().slideUp(300);
                    $(`${rotateArrow}`).css({ transform: 'rotate(-90deg)' })
                }
            }, 400);
        });

        $(`${expandEl}`).mouseenter(function () {
            clearTimeout(slideTimer)
        }).mouseleave(function () {
            slideTimer = setTimeout(function () {
                if (!$(`${enterEl}`).is(":hover") && !$(`${expandEl}`).is(":hover")) {
                    $(`${expandEl}`).stop().slideUp(300);
                    $(`${rotateArrow}`).css({ transform: 'rotate(-90deg)' })
                }
            }, 400);
        });
    }

    function opacityAnimation(elementViewport, opacityElement, opacityValue = 1) {
        $(window).scroll(function () {
            if (elementIsInViewport(elementViewport)) {
                setTimeout(() => {
                    for (let i = 0; i < $(`.${opacityElement}`).length; i++) {
                        setTimeout(() => {
                            $(`.${opacityElement}:eq(${i})`).css({ opacity: opacityValue });
                        }, 500 * i);
                    }
                }, 500);
            }
        })

        if (elementIsInViewport(elementViewport)) {
            setTimeout(() => {
                for (let i = 0; i < $(`.${opacityElement}`).length; i++) {
                    setTimeout(() => {
                        $(`.${opacityElement}:eq(${i})`).css({ opacity: opacityValue });
                    }, 500 * i);
                }
            }, 500);
        }
    }

    // შემდეგი და წინა პროექრტების ჩვენება

    function nextPrevProj(nextHref, prevHref, index) { //პარამეტრები: მომდევნო ლინკი, წინა ლინკი და გვერდის ნომრის აღმნიშვნელი ცვლადი
        var numberOfThumbs = $(".projects_thumbnail>a").length; // ერთ გვერდზე არსებული ფრჩხილების სრული რაოოდენობა
        var bottomIndex = index + numberOfThumbs / 2; // ეს ინდექსი საჭიროა ქვედა ფრჩხილების რიგში უმოქმედო ფრჩხილის დასადგენად
        $(".next_proj").attr("href", nextHref) // მომდევნო ლინკის განსაზღვრა
        $(".prev_proj").attr("href", prevHref) // წინა ლინკის განსაზღვრა
        $(".projects_thumbnail>a").removeClass("disabled_thumbnail").addClass("active_thumbnail") // ფრჩხილების რესეტი
        $(`.projects_thumbnail>a:eq(${index}), .projects_thumbnail>a:eq(${bottomIndex})`).removeClass("active_thumbnail").addClass("disabled_thumbnail") // უმოქმედო ფრჩხილების განსაზღვრა
    }

    // ფუნქციების დასასრული

    menuSlides(".lg_menu_company", ".company_db_cont", ".lg_menu_company_arr")
    menuSlides(".lg_menu_sector", ".sector_db_cont", ".lg_menu_sector_arr")
    menuSlides(".lan>div:eq(0)", ".lan>div:eq(1)", ".lan>div:eq(0)>i")

    expandMenu(".db_small_menu_about", smallAbout, ".db_menu_expand_about", ".db_menu_about>div:eq(0)>i")
    expandMenu(".db_small_menu_sector", smallSector, ".db_menu_expand_sector", ".db_menu_sector>div:eq(0)>i")
    expandMenu(".db_menu_lan>div:eq(0)", langSlider, ".db_menu_lan>div:eq(1)", ".db_menu_lan>div:eq(0)>i")


    $(".search_icon_cont").click(function () {
        $(".search_cont").css("display", "block");
    })

    $(".search_cont, .close_search").click(function () {
        $(".search_cont").css("display", "none")
    })

    $(".search_cont input").click(function (e) {
        e.stopPropagation();
    })



    // carousel

    var carouselSlidesNumber = $(".carousel_slide").length;
    var carouselWidth = $(".carousel_slide_cont").width();
    var carouselHalfItemsNumber = Math.floor(carouselSlidesNumber / 2);
    var carouselSlidecounter = { value: carouselHalfItemsNumber, currentSlide: 0 }
    var carouseClickDisabled = { value: false }
    var carouseLastClick = { value: "", giveInitialValue: true }
    var thumbnailContainerWidth = parseInt($(".carousel_thumbnails_cont").width());
    var thumbnailWidth = thumbnailContainerWidth / carouselSlidesNumber;
    var thumbnailLefts = { left1: 0, left2: -thumbnailWidth }
    var movingThumbnail = { one: true, two: false }
    var carouselBtnAnimationDisabled = { value: false }


    $(".carousel_thumbnail").css("width", `${thumbnailWidth}px`) // set width of thumbnail
    $(".carousel_thumbnail1").css("left", `${thumbnailLefts.left1}px`) // set left of thumbnail1
    $(".carousel_thumbnail2").css("left", `${thumbnailLefts.left2}px`) // set left of thumbnail2

    setTimeout(() => { //after some time add transition to slides
        $(".carousel_slide").css("transition", "left 0.3s ease-in-out")
    }, 300);

    for (var i = 0; i < carouselSlidesNumber; i++) { //define initial left values of carousel_slide element 
        var left = `${i * carouselWidth - carouselHalfItemsNumber * carouselWidth}px`;//
        $(`.carousel_slide:eq(${i})`).css({ left: left })
    }

    $(".carousel_arrow_right,.carousel_invisable_arrow_right").click(function () {  //carousel right arrow clicks           
        if (!carouseClickDisabled.value) {
            carouselSlidecounter.currentSlide += 1; // increase couneter currentSlide value
            if (carouselSlidecounter.currentSlide == carouselSlidesNumber) { //reach right edge
                if (movingThumbnail.one) { // if first thmb is currently moving
                    thumbnailLefts.left1 += thumbnailWidth
                    //slide first thmb, then hide and travel it to the left side and then show it
                    $(".carousel_thumbnail1").css({ left: `${thumbnailLefts.left1}px` }).delay(300).hide(0, function () {
                        $(this).css({ left: `${-thumbnailWidth}px` }).show(0);
                    });
                    thumbnailLefts.left1 = -thumbnailWidth // reset variable for setting left prop of first thmb
                    movingThumbnail.one = false; // stop first thmb movement
                    movingThumbnail.two = true; //start second thmb movement
                } else { //if second thmb is currently moving
                    //this case is the same as first thmb movement case
                    thumbnailLefts.left2 += thumbnailWidth
                    $(".carousel_thumbnail2").css({ left: `${thumbnailLefts.left2}px` }).delay(300).hide(0, function () {
                        $(this).css({ left: `${-thumbnailWidth}px` }).show(0);
                    });
                    thumbnailLefts.left2 = -thumbnailWidth
                    movingThumbnail.one = true
                    movingThumbnail.two = false
                }
                carouselSlidecounter.currentSlide = 0; //reset couneter currentSlide value
            }

            $(".carousel_thumbnail").css({ backgroundColor: "#b63a3a" }) //red color for thmbs

            if (movingThumbnail.one) {
                thumbnailLefts.left1 += thumbnailWidth
                $(".carousel_thumbnail1").css({ left: `${thumbnailLefts.left1}px` })// slide first thmb ro the right
            } else {
                thumbnailLefts.left2 += thumbnailWidth
                $(".carousel_thumbnail2").css({ left: `${thumbnailLefts.left2}px` }) // slide second thmb ro the right
            }

            if (carouseLastClick.giveInitialValue) { //detect first click
                carouseLastClick.value = "right"; //before first click carouseLastClick.value is empty string(there is no last click done yet)
                carouseLastClick.giveInitialValue = false
            }

            if (carouseLastClick.value == "left") {
                //if left clicking counter value is x then when changed to right it should be x + carouselSlidesNumber
                carouselSlidecounter.value += carouselSlidesNumber; //change counter value to the value right click wants
                carouseLastClick.value = "right";
            }

            carouseClickDisabled.value = true; //prevent multiple fast clicks 

            for (var i = 0; i < carouselSlidesNumber; i++) { //slide carousel items to the left
                var left = parseInt($(`.carousel_slide:eq(${i})`).css("left"));
                var newLeft = `${left - carouselWidth}px`
                $(`.carousel_slide:eq(${i})`).css({ left: newLeft })
            }

            if (carouselSlidecounter.value == carouselSlidesNumber + carouselHalfItemsNumber) {
                carouselSlidecounter.value = carouselHalfItemsNumber; //reset counter
            }

            var widthOfOneSlide = $(".carousel_slide").width();
            var LastElToLeftIndex = carouselSlidecounter.value - carouselHalfItemsNumber;
            var leftProptOfLastElToLeft = parseInt($(`.carousel_slide:eq(${LastElToLeftIndex})`).css("left"));
            var newLeftProptOfLastElToLeft = (leftProptOfLastElToLeft + widthOfOneSlide * (carouselSlidesNumber - 1));
            //jump the last element to the left from the current slide to the right end of the slide container
            $(`.carousel_slide:eq(${LastElToLeftIndex})`).hide(0).css({ left: newLeftProptOfLastElToLeft }).show(0)

            // arrows animation effect
            $(".carousel_arrow_right").css({ "background-color": "#b63a3a", "padding-left": "20px" });
            setTimeout(function () {
                $(".carousel_arrow_right").css({ "backgroundColor": "rgba(0, 0, 0, .5)", "padding-left": "0px" });
            }, 300);

            setTimeout(() => {
                carouseClickDisabled.value = false;//enabling clicks after some time
            }, 400);
            carouselSlidecounter.value += 1; // increase couneter value    

            $(".carousel_arrow_right i").css({ transform: 'rotate(0deg)' })
        }
    }).mouseenter(function () {
        if ($(window).width() >= 1024) {
            $(".carousel_arrow_right i").css({ transform: 'rotate(0deg)' })
        }

    }).mouseleave(function () {
        $(".carousel_arrow_right i").css({ transform: 'rotate(90deg)' })
    })

    $(".carousel_arrow_left,.carousel_invisable_arrow_left").click(function () {  //carousel left arrow clicks                   
        if (!carouseClickDisabled.value) {
            carouselSlidecounter.currentSlide -= 1; // increase couneter currentSlide value
            if (carouselSlidecounter.currentSlide == -1) {//reach left edge
                if (movingThumbnail.one) {// if first thmb is currently moving
                    thumbnailLefts.left1 -= thumbnailWidth
                    $(".carousel_thumbnail1").css({ left: `${thumbnailLefts.left1}px` })//slide first thmb to the left
                    //hide and travel instantly second thmb to the right, then slide normally to the left
                    $(".carousel_thumbnail2").hide(0).css({ left: `${thumbnailContainerWidth}px` }).show(0, function () {
                        $(this).css({ left: `${thumbnailContainerWidth - thumbnailWidth}px` })
                    });

                    thumbnailLefts.left2 = thumbnailContainerWidth // reset variable for setting left prop of second thmb
                    movingThumbnail.one = false; // stop first thmb movement
                    movingThumbnail.two = true; //start second thmb movement
                } else {//if second thmb is currently moving
                    //this case is the same as first thmb movement case
                    thumbnailLefts.left2 -= thumbnailWidth
                    $(".carousel_thumbnail2").css({ left: `${thumbnailLefts.left2}px` })
                    $(".carousel_thumbnail1").hide(0).css({ left: `${thumbnailContainerWidth}px` }).show(0, function () {
                        $(this).css({ left: `${thumbnailContainerWidth - thumbnailWidth}px` })
                    });

                    thumbnailLefts.left1 = thumbnailContainerWidth
                    movingThumbnail.one = true
                    movingThumbnail.two = false
                }
                carouselSlidecounter.currentSlide = carouselSlidesNumber - 1; //reset couneter currentSlide value
            }

            $(".carousel_thumbnail").css({ backgroundColor: "#3039b6" }) //blue color for thmbs

            if (movingThumbnail.one) {
                thumbnailLefts.left1 -= thumbnailWidth
                $(".carousel_thumbnail1").css({ left: `${thumbnailLefts.left1}px` }) // slide first thmb ro the left
            } else {
                thumbnailLefts.left2 -= thumbnailWidth
                $(".carousel_thumbnail2").css({ left: `${thumbnailLefts.left2}px` }) // slide first thmb ro the left
            }

            if (carouseLastClick.giveInitialValue) {// detect first click
                carouseLastClick.value = "left"; //before first click carouseLastClick.value is empty string(there is no last click done yet)
                carouseLastClick.giveInitialValue = false
            }
            if (carouseLastClick.value == "right") {
                //if right clicking counter value is x then when changed to left it should be x - carouselSlidesNumber
                carouselSlidecounter.value -= carouselSlidesNumber; //change counter value to the value left click wants
                carouseLastClick.value = "left";
            }
            carouseClickDisabled.value = true; //preventing multiple fast clicks 
            for (var i = 0; i < carouselSlidesNumber; i++) { //slide carousel items to the right
                var left = parseInt($(`.carousel_slide:eq(${i})`).css("left"));
                var newLeft = `${left + carouselWidth}px`
                $(`.carousel_slide:eq(${i})`).css({ left: newLeft })
            }

            if (carouselSlidecounter.value == - carouselSlidesNumber + carouselHalfItemsNumber) {
                carouselSlidecounter.value = carouselHalfItemsNumber; //reset counter
            }

            var widthOfOneSlide = $(".carousel_slide").width();
            var LastElToRighttIndex = carouselSlidecounter.value + carouselHalfItemsNumber;
            var leftProptOfLastElToRight = parseInt($(`.carousel_slide:eq(${LastElToRighttIndex})`).css("left"));
            var newLeftProptOfLastElToRight = leftProptOfLastElToRight - widthOfOneSlide * (carouselSlidesNumber - 1);
            //jump the last element to the right from the current slide to the left end of the slide container
            $(`.carousel_slide:eq(${LastElToRighttIndex})`).hide(0).css({ left: newLeftProptOfLastElToRight }).show(0)

            // arrows animation effect
            $(".carousel_arrow_left").css({ "backgroundColor": "#3039b6", "padding-right": "20px" });
            setTimeout(function () {
                $(".carousel_arrow_left").css({ "backgroundColor": "rgba(0, 0, 0, .5)", "padding-right": "0px" });
            }, 300);


            setTimeout(() => {
                carouseClickDisabled.value = false;//enabling clicks after some time
            }, 400);
            carouselSlidecounter.value -= 1; // decrease couneter value   

            $(".carousel_arrow_left i").css({ transform: 'rotate(0deg)' })
        }
    }).mouseenter(function () {
        if ($(window).width() >= 1024) {
            $(".carousel_arrow_left i").css({ transform: 'rotate(0deg)' })
        }
    }).mouseleave(function () {
        $(".carousel_arrow_left i").css({ transform: 'rotate(-90deg)' })
    })

    // end

    $(".home_page_image_img:eq(0)").css({ opacity: 1 })

    setInterval(() => { // main page opacity carousel
        $(`.home_page_image_img:eq(${manPgOpacityCarouselCurrentCounter.value - 1})`).css({ opacity: 0 })
        $(`.home_page_image_img:eq(${manPgOpacityCarouselCurrentCounter.value})`).css({ opacity: 1 })
        manPgOpacityCarouselCurrentCounter.value += 1;
        if (manPgOpacityCarouselCurrentCounter.value > 3) {
            manPgOpacityCarouselCurrentCounter.value = 0;
        }
    }, 3000);

    //გრიდი

    // გრიდს სჭირდება ფუნქცია elementIsInViewport ანიმაციებისთვის.
    // elementIsInViewport განსაზღვრულია ფაილის დასაწყისში, რადგან სხვა ფუნქციებიც იყენებენ მას

    if ($("title").text() == "მთავარი გვერდი" || $("title").text() == "პროექტები") {// თუ იმყოფები გვერდებზე, რომლებიც იყენებენ გრიდს
        // გრიდის ელემენტების ანიმაციის ფუნქციის განსაზღვრა დიდი ზომის ეკრანებისთვის
        if ($(window).width() >= 1024) {
            function gridAnimation() {
                if (elementIsInViewport(".grid_cont")) {// გრიდის კონტეინერის გამოჩენის შემდეგ...
                    for (let i = 0; i < $(".grid_item").length; i++) {// რამდენი ელემენტის აქვს გრიდს ...
                        setTimeout(() => {//ყოველ ნახევარი წუთის შუალედით, ერთმანეთის მიყოლებით, გამოაჩინე ელემენტები
                            $(`.grid_item:eq(${i})`).css({ transform: "translateX(0)", opacity: 1, pointerEvents: "initial" });
                        }, 500 * i);
                    }
                }
            }
        } else { // გრიდის ელემენტების ანიმაციის ფუნქციის განსაზღვრა პატარა ზომის ეკრანებისთვის
            function gridAnimation() {
                for (let i = 0; i < $(`.grid_item`).length; i++) {// რამდენი ელემენტის აქვს გრიდს ...
                    if (elementIsInViewport(`.grid_item:eq(${i})`)) { // თუ მხედველობის არეში გამოჩნდება გრიდის ელემენტი
                        // დაიწყე ანიმაცია მხოლოდ ამ ელემენტზე
                        $(`.grid_item:eq(${i})`).css({ transform: "translateY(0)", opacity: 1, pointerEvents: "initial" });
                    }

                }

            }
        }
        gridAnimation() // ფუნქციის თავდაპირველი გამოძახება
        $(window).scroll(function () { // ფუნქციის გამოძახება სქროლზე
            gridAnimation()
        })
    }

    //end

    var footerAnimationDone = { value: false }

    $(window).scroll(function () {
        if (!footerAnimationDone.value) {
            if (elementIsInViewport(".footer_cont")) { //footer phone number animation
                footerAnimationDone.value = true
                setTimeout(() => {
                    $('.footer_phone>div').css({ width: "150px" });
                }, 500);
                setTimeout(() => {
                    $('.footer_phone>div').css({ fontSize: "20px", color: "#b63a3a" });
                    $(".footer_phone>i").addClass("footer_phone_shake")
                }, 1000);
                setTimeout(() => {
                    $('.footer_phone>div').css({ fontSize: "16px", color: "#3039b6", fontWeight: "bold" });
                }, 1500);
            }
        }

    })

    //პროექტების გვერდების სურათების და ტექსტების ანიმაციები

    for (let i = 0; i < projectsPagesTitles.length; i++) {
        if ($("title").text() == projectsPagesTitles[i]) {
            opacityAnimation(".projects_page_cont", "project_texts>span")
            opacityAnimation(".projects_page_cont", "projects_img")
            break
        }
    }

    /**
     * ამ გადამრთველის გარეშე კონსოლი მიჩვენებს ერორს, რადგან opacityAnimation ფუნქცია ვერ იპოვის თავის არგუმენტებს
     * თუ არ ვარ შესაბამის გვერდზე, სადაც ეს არგუმენტი არსებობს.
     */

    switch ($("title").text()) {
        case "საზღვაო სამუშაოები": // თუ ხარ ამ გვერდზე
            // opacityAnimation ფუნცქციას მიეცი ელემენტები არგუმენტებად, რომლებიც ამ გვერდზე არსებობენ
            opacityAnimation(".marine_works_text_wrapper ul", "marine_works_text_wrapper li")
            opacityAnimation(".marine_works_imgs_wrapper", "marine_works_img")
            break;
        case "მთავარი გვერდი":
            opacityAnimation(".home_pg_about_section_cont", "home_pg_about_section_img_wrapper")
            break;
        case "სამოქალაქო და ინდუსტრიული პროექტები":
            opacityAnimation(".cip_text", "cip_text li")
            opacityAnimation(".cip_section_wrapper", "cip_section_dark_cover", 0)
            break;
        case "კონტაქტი":
            opacityAnimation(".contact_cont", "contact_cont_item")
            break;
        case "ჩვენს შესახებ":
            opacityAnimation(".about_cont_text ul:eq(0)", "about_cont_text ul:eq(0) li")
            opacityAnimation(".about_cont_text ul:eq(1)", "about_cont_text ul:eq(1) li")
            opacityAnimation(".about_img_cont", "about_img_cont")
            break;
        case "სამშენებლო მასალები":
            opacityAnimation(".building_materials_main_img", "building_materials_main_img")
            break;
        case "სიახლეები":
            opacityAnimation(".projects_page_cont:eq(0)", "projects_page_cont:eq(0)>div:eq(1)>ul>span")
            opacityAnimation(".projects_page_cont:eq(1)", "projects_page_cont:eq(1)>div:eq(1)>ul>span")
            opacityAnimation(".projects_page_cont:eq(2)", "projects_page_cont:eq(2)>div:eq(1)>ul>span")
            opacityAnimation(".projects_page_cont:eq(0)", "projects_img:eq(0)")
            opacityAnimation(".projects_page_cont:eq(1)", "projects_img:eq(1)")
            opacityAnimation(".projects_page_cont:eq(2)", "projects_img:eq(2)")
            break;
        case "ჩვენი გუნდი":
            opacityAnimation(".team_photo", "team_photo")
            for (let i = 0; i < $(".team_member_cont").length; i++) {
                opacityAnimation(`.team_member_cont:eq(${i})`, `team_member_cont img:eq(${i})`)
            }
            break;
        default:
            break;
    }

    // საზღვრის ფერის ცვლილება ტექსტის და ინფუთის ველებზე ფოკუსის დროს

    inputFieldFocusMode(".sender_name input")
    inputFieldFocusMode(".sender_mail input")
    inputFieldFocusMode(".textarea_and_submit textarea")

    var lastScrollTop = 0;

    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > lastScrollTop) {
            $("header, .header_cont").css({ height: "50px" })
            $(".logo").css({ transform: "scale(0.55)" })
            $(".db_menu").css({ top: "50px" })
            $(".lg_menu_expand_cont").css({ top: "40px" })

            if ($(this).scrollTop() > 100) {
                $(".scrollTop").show(0)
            }

        } else {
            $("header, .header_cont").css({ height: "85px" })
            $(".logo").css({ transform: "scale(1)" })
            $(".db_menu").css({ top: "85px" })
            $(".lg_menu_expand_cont").css({ top: "50px" })

            if ($(this).scrollTop() < 100) {
                $(".scrollTop").hide(0)
            }

        }
        lastScrollTop = scrollTop;
    });

    /**
     * იმისდა მიხედვით თუ რომელი პროექტის გვერდზე ვარ, მომდევნო და წინა პროექტების ლინკების განსაზღვრა
     */

    switch ($("title").text()) {
        case "ფოთი აპარტამენტი": // ვარ პირველ გვერდზე
            nextPrevProj("./berth-7", "./pay-terminal", 0) // შემდეგი გვერდის განსაზღვრა
            break;
        case "ნავმისადგომი-7":
            nextPrevProj("./berth-15", "./poti-apartment", 1)
            break;
        case "ნავმისადგომი-15":
            nextPrevProj("./container-terminal", "./berth-7", 2)
            break;
        case "საკონტეინერო ტერმინალი":
            nextPrevProj("./lego-blocks", "./berth-15", 3)
            break;
        case "ლეგო-ბლოკები":
            nextPrevProj("./pay-terminal", "./container-terminal", 4)
            break;
        case "გადახდის ტერმინალი":
            nextPrevProj("./poti-apartment", "./lego-blocks", 5)
            break;

        default:
            break;
    }

    $(".scrollTop").click(function () {
        $(this).hide(0)
        $('html, body').animate({ scrollTop: 0 }, 800);
    })

    $(".search_cont>div").click(function (e) {
        e.stopPropagation();
    })

    var searchUrl = { val: '' };


    for (let i = 0; i < allPages.length; i++) {
        if ($("title").text() == allPages[i]) {
            switch (i) {
                case 0:
                    searchUrl.val = 'search'
                    break;
                case 1:
                case 2:
                case 3:
                    searchUrl.val = '../search'
                    break;
                default:
                    searchUrl.val = '../../search'
                    break;
            }
        }
    }

    $('.search_input').keydown(function (e) {
        if (e.keyCode === 13) {
            e.preventDefault();
        }
    })



    $(".search_input").keyup(function () { //ძებნა
        var inputValue = $(".search_input").val().toLowerCase().replace(/[-,.!:'"\/\d\s]/g, ''); // საძებნი ტექსტი
        if (inputValue != "") { // თუ ვერლი ცარიელი არაა
            $.ajax({
                url: searchUrl.val, // ძებნის ფაილთან დაკავშირება
                type: "post",
                data: {
                    searchSubmitBtn: true,
                },
                dataType: "json",
                success: function (data) { // მონაცემებს შეადგენს ყველა პროექტის დასახელება ყველა ენაზე. ენების თანმიმდევრობაა:
                    //ქართული, ინგლისური, რუსული
                    $(".searched_links").empty() // რესეტი მოძებნილი პროექტების კონტეინერის
                    var foundArr = []; // მოძებნილი პროექტების მასივი
                    var Allhrefs = []; // ყველა პროექტის ლინკის განაზღვრა იმისდა მიხედვით თუ რომელ გვერდზე ვარ
                    var searchedlementsHrefs = []; // მხოლოდ მოძებნილი ფროექტების ლინკები
                    for (let i = 0; i < allPages.length; i++) {// ყველა ლინკის განსაზღვრა
                        if ($("title").text() == allPages[i]) {
                            switch (i) {
                                case 0:
                                    Allhrefs = projectPathsFromAllLocation.distance3
                                    break;
                                case 1:
                                case 2:
                                case 3:
                                    Allhrefs = projectPathsFromAllLocation.distance1
                                    break;
                                case 4:
                                case 5:
                                case 12:
                                case 13:
                                case 14:
                                    Allhrefs = projectPathsFromAllLocation.distance2
                                    break;
                                default:
                                    Allhrefs = projectPathsFromAllLocation.distance0
                                    break;
                            }
                        }
                    }

                    $.each(data, function (index, element) {
                        if (element.replace(/[\s]/g, '').toLowerCase().indexOf(inputValue) != -1) {
                            foundArr.push(element);
                            indexMod6 = index % 6;
                            searchedlementsHrefs.push(Allhrefs[indexMod6]) // მოძებნილი ლინკები
                        }
                    })

                    $.each(foundArr, function (index, element) {
                        $(".searched_links").append(`<a href="${searchedlementsHrefs[index]}" class="cw menu_hover"><li class="searched">${element}</li></a>`);
                        $(".searched").addClass($("#language").attr("class"));
                    })
                }
            })
        } else {
            $(".searched_links").empty()
        }
    })



    function expandImage(element, hasTag = true) {

        $(element).css({ cursor: "zoom-in" })
        $(element).click(function () {
            var numberIfImages = 0;
            var imagesSrcArray = []



            if (hasTag) {
                var imageSrc = `url(${$(this).attr('src')})`;
                $.each($("body").find(element), function (i, e) {
                    numberIfImages += 1;
                    imagesSrcArray.push(`url(${$(e).attr('src')})`)
                })
            } else {
                var imageSrc = $(this).css('background-image');
                $.each($("body").find(element), function (i, e) {
                    numberIfImages += 1;
                    imagesSrcArray.push($(e).css("background-image"))
                })
            }



            $("body").append("<div class='expand_img_cont o0'><div class='expand_img'><div></div><div></div><i class='expand_close fa-solid fa-xmark'></i></div></div>");

            function removeImage() {
                $(".expand_img_cont, .expand_img_cont i").css({ opacity: 0, cursor: "default" })
                setTimeout(() => {
                    $(".expand_img_cont").remove();
                }, 500);
            }

            // კარუსელი
            if (numberIfImages > 1) {
                $(".expand_img").append("<i class='expand_arr_right fa-solid fa-circle-chevron-right'></i><i class='expand_arr_left fa-solid fa-circle-chevron-left'></i>");
                var carouselIndex = { val: 0 }

                $.each(imagesSrcArray, function (index, element) {
                    if (element == imageSrc) {
                        carouselIndex.val = index
                    }
                })

                $(".expand_arr_right, .expand_img>div:eq(1)").click(function () {
                    carouselIndex.val++
                    if (carouselIndex.val == numberIfImages) {
                        carouselIndex.val = 0;
                    }
                    $(".expand_arr_right").css({ top: "5px" })
                    setTimeout(() => {
                        $(".expand_arr_right").css({ top: "0" })
                    }, 100);
                    $(".expand_img").css({ backgroundImage: imagesSrcArray[carouselIndex.val] })
                })

                $(".expand_arr_left, .expand_img>div:eq(0)").click(function () {
                    carouselIndex.val--
                    if (carouselIndex.val == -1) {
                        carouselIndex.val = numberIfImages - 1;
                    }
                    $(".expand_arr_left").css({ top: "5px" })
                    setTimeout(() => {
                        $(".expand_arr_left").css({ top: "0" })
                    }, 100);
                    $(".expand_img").css({ backgroundImage: imagesSrcArray[carouselIndex.val] })
                })
            }

            setTimeout(() => {
                $(".expand_img_cont").css({ opacity: 1 }).click(function () {
                    removeImage()
                    $(".expand_arr_right", ".expand_arr_left")
                })
            }, 10);

            $(".expand_img").css({ backgroundImage: `${imageSrc}` }).click(function (e) {
                e.stopPropagation();
            })

            $(".expand_close").click(function () {
                removeImage()
            })
        });
    }



    expandImage(".projects_page_cont img")
    expandImage(".home_pg_about_section_img_wrapper", false)
    expandImage(".about_img_cont", false)
    expandImage(".marine_works_img ", false)
    expandImage(".building_materials_main_img", false)
    expandImage(".cip_section_img_cont")
    expandImage(".team_photo", false)
    expandImage(".team_member_img")

    $(".fubmit_mail_btn").click(function (e) {
        e.preventDefault();
        var submitAllowed = { val: true };
        var flname = $(".sender_name>input").val().trim();
        var email = $(".sender_mail>input").val().trim();
        var text = $(".textarea_and_submit>textarea").val().trim();
        var googleCaptcha = grecaptcha.getResponse();
        var texts = [];
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        
        switch ($(".lan>div:eq(0)>div:eq(0)").text().trim()) {
            case "ენა":
                texts = ['სახელის ველი არ უნდა იყოს ცარიელი', 'ელ.ფოსტის ველი არ უნდა იყოს ცარიელი',
                    'თქვენ არ შეგიძლიათ ცარიელი ტექსტის გაგზავნა', 'დაადასტურეთ, რომ არ ხართ რობოტი Google Captcha-ს საშუალებით',
                    'შეტყობინება წარმატებით გაიგზავნა', 'თქვენი შეტყობინების გაგზავნისას წარმოიშვა პრობლემა. გთხოვთ სცადოთ მოგვიანებით',
                'არასწორი ელ. ფოსტა. გთხოვთ შეიყვანოთ სწორი ელ. ფოსტის მისამართი']
                break;
            case "lan":
                texts = ['The name field must not be empty', 'The e-mail field must not be empty',
                    'You cannot send empty text', 'Verify you are not a robot with Google Captcha', 'Message sent successfully',
                    'There was an issue sending your message. Please try again later','Invalid email. Please enter a valid email address']
                break;
            case "язык":
                texts = ['Поле имени не должно быть пустым', 'Поле электронной почты не должно быть пустым',
                    'Вы не можете отправлять пустой текст', 'Подтвердите, что вы не робот, с помощью Google Captcha',
                    'Сообщение успешно отправлено', 'Возникла проблема с отправкой вашего сообщения. Пожалуйста, повторите попытку позже',
                'Неверный адрес электронной почты. Пожалуйста, введите действительный адрес электронной почты']
                break;

            default:
                break;
        }



        if (flname == '') {
            submitAllowed.val = false
            alert(texts[0])
        }

        if (email == '' && submitAllowed.val) {
            submitAllowed.val = false
            alert(texts[1])
        }

        if (!emailPattern.test(email) && submitAllowed.val) {
            submitAllowed.val = false
            alert(texts[6])
        }

        if (text == '' && submitAllowed.val) {
            submitAllowed.val = false
            alert(texts[2])
        }

        if (!googleCaptcha.length > 0 && submitAllowed.val) {
            submitAllowed.val = false
            alert(texts[3])
        }

        if (submitAllowed.val) {
            $(".mail_message").css({ opacity: 1, "z-index": 1000 });
            $.ajax({
                url: "../mail",
                type: "post",
                data: {
                    mailBtn: true,
                    flname: flname,
                    email: email,
                    text: text,
                    gRecaptchaResponse: googleCaptcha
                },
                success: function (data) {
                    if (data == 'good') {
                        alert(texts[4])
                        $(".sender_name>input").val('')
                        $(".sender_mail>input").val('')
                        $(".textarea_and_submit>textarea").val('')
                        $(".mail_message").css({ opacity: 0, "z-index": -1000 });
                    } else {
                        alert(texts[5])
                        $(".mail_message").css({ opacity: 0, "z-index": -1000 });
                    }

                }
            })
        }

    })

})
