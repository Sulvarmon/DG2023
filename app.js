"use strict";
$(window).on("load", function () {
  $("body").fadeIn(1000);

  let langSlider = { value: true };
  let smallAbout = { value: true };
  let smallSector = { value: true };
  let language = { value: true };
  let settings = { value: true };
  let cookieSettings = { value: true };
  let slideTimer;
  let manPgOpacityCarouselCurrentCounter = { value: 1 };
  let projectsPagesTitles = [
    "ფოთი აპარტამენტი",
    "ნავმისადგომი-7",
    "ნავმისადგომი-15",
    "საკონტეინერო ტერმინალი",
    "ლეგო-ბლოკები",
    "გადახდის ტერმინალი",
  ]; //ყველა პროექტის სათაურის ჩამონათვალი
  let allPages = [
    "მთავარი გვერდი",
    "პროექტები",
    "სიახლეები",
    "კონტაქტი",
    "ჩვენს შესახებ",
    "ჩვენი გუნდი",
    "ნავმისადგომი-7",
    "ნავმისადგომი-15",
    "საკონტეინერო ტერმინალი",
    "ლეგო-ბლოკები",
    "გადახდის ტერმინალი",
    "ფოთი აპარტამენტი",
    "სამშენებლო მასალები",
    "სამოქალაქო და ინდუსტრიული პროექტები",
    "საზღვაო სამუშაოები",
  ];
  let projectPathsFromAllLocation = {
    distance3: [
      "./pages/projects/berth-7",
      "./pages/projects/berth-15",
      "./pages/projects/container-terminal",
      "./pages/projects/lego-blocks",
      "./pages/projects/pay-terminal",
      "./pages/projects/poti-apartment",
    ],
    distance1: [
      "./projects/berth-7",
      "./projects/berth-15",
      "./projects/container-terminal",
      "./projects/lego-blocks",
      "./projects/pay-terminal",
      "./projects/poti-apartment",
    ],
    distance2: [
      "../projects/berth-7",
      "../projects/berth-15",
      "../projects/container-terminal",
      "../projects/lego-blocks",
      "../projects/pay-terminal",
      "../projects/poti-apartment",
    ],
    distance0: [
      "./berth-7",
      "./berth-15",
      "./container-terminal",
      "./lego-blocks",
      "./pay-terminal",
      "./poti-apartment",
    ],
  };

  function expandMenu(
    clickedEl,
    variable,
    expandEl,
    rotateArrow,
    isGear = false
  ) {
    $(`${clickedEl}`).click(function () {
      if (variable.value) {
        $(`${expandEl}`).stop().slideDown(300);
        if (isGear) {
          $(`${rotateArrow}`).css({ transform: "rotate(-360deg)" });
        } else {
          $(`${rotateArrow}`).css({ transform: "rotate(0deg)" });
        }
        variable.value = false;
      } else {
        $(`${expandEl}`).stop().slideUp(300);
        if (isGear) {
          $(`${rotateArrow}`).css({ transform: "rotate(0deg)" });
        } else {
          $(`${rotateArrow}`).css({ transform: "rotate(-90deg)" });
        }

        variable.value = true;
      }
    });
  }

  function elementIsInViewport(element) {
    let windowTop = $(window).scrollTop();
    let windowBottom = windowTop + $(window).height();
    let elemTop = $(element).offset().top;
    let elemBottom = elemTop + $(element).height();

    if (
      (elemTop < windowBottom && elemTop > windowTop) ||
      (elemBottom < windowBottom && elemBottom > windowTop)
    ) {
      return true;
    } else {
      return false;
    }
  }

  function inputFieldFocusMode(element) {
    $(element)
      .focus(function () {
        $(this).css({ border: "1px solid #b63a3a" });
      })
      .blur(function () {
        $(this).css({ border: "1px solid #3039b6" });
      });
  }

  $(".sm_menu_icon").click(function () {
    $(".sm_menu_icon").css("pointer-events", "none");
    if ($(".sm_menu_icon_m").css("opacity") == 1) {
      $(".db_menu").stop().slideDown(300);
      $(".sm_menu_icon_m").css("opacity", 0);
      $(".sm_menu_icon_c").css("opacity", 1);
      $(".sm_menu_icon").css("pointer-events", "auto");
    } else {
      $(".db_menu").stop().slideUp(300);
      $(".sm_menu_icon_m").css("opacity", 1);
      $(".sm_menu_icon_c").css("opacity", 0);
      $(".sm_menu_icon").css("pointer-events", "auto");
    }
  });

  function menuSlides(enterEl, expandEl, rotateArrow) {
    $(`${enterEl}`)
      .mouseenter(function () {
        $(`${expandEl}`).stop().slideDown(300);
        $(`${rotateArrow}`).css({ transform: "rotate(0deg)" });
      })
      .mouseleave(function () {
        slideTimer = setTimeout(function () {
          if (!$(`${enterEl}`).is(":hover") && !$(`${expandEl}`).is(":hover")) {
            $(`${expandEl}`).stop().slideUp(300);
            $(`${rotateArrow}`).css({ transform: "rotate(-90deg)" });
          }
        }, 400);
      });

    $(`${expandEl}`)
      .mouseenter(function () {
        clearTimeout(slideTimer);
      })
      .mouseleave(function () {
        slideTimer = setTimeout(function () {
          if (!$(`${enterEl}`).is(":hover") && !$(`${expandEl}`).is(":hover")) {
            $(`${expandEl}`).stop().slideUp(300);
            $(`${rotateArrow}`).css({ transform: "rotate(-90deg)" });
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
    });

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

  function nextPrevProj(nextHref, prevHref, index) {
    let numberOfThumbs = $(".projects_thumbnail>a").length;
    let bottomIndex = index + numberOfThumbs / 2;
    $(".next_proj").attr("href", nextHref);
    $(".prev_proj").attr("href", prevHref);
    $(".projects_thumbnail>a")
      .removeClass("disabled_thumbnail")
      .addClass("active_thumbnail");
    $(
      `.projects_thumbnail>a:eq(${index}), .projects_thumbnail>a:eq(${bottomIndex})`
    )
      .removeClass("active_thumbnail")
      .addClass("disabled_thumbnail"); // უმოქმედო ფრჩხილების განსაზღვრა
  }

  function findFilePaths(variableName, fileName) {
    for (let i = 0; i < allPages.length; i++) {
      if ($("title").text() == allPages[i]) {
        switch (i) {
          case 0:
            variableName.val = `./${fileName}`;
            break;
          case 1:
          case 2:
          case 3:
            variableName.val = `../${fileName}`;
            break;
          default:
            variableName.val = `../../${fileName}`;
            break;
        }
      }
    }
  }

  menuSlides(".lg_menu_company", ".company_db_cont", ".lg_menu_company_arr");
  menuSlides(".lg_menu_sector", ".sector_db_cont", ".lg_menu_sector_arr");

  expandMenu(
    ".db_small_menu_about",
    smallAbout,
    ".db_menu_expand_about",
    ".db_menu_about>div:eq(0)>i"
  );
  expandMenu(
    ".db_small_menu_sector",
    smallSector,
    ".db_menu_expand_sector",
    ".db_menu_sector>div:eq(0)>i"
  );
  expandMenu(
    ".db_menu_lan>div:eq(0)",
    langSlider,
    ".db_menu_lan>div:eq(1)",
    ".db_menu_lan>div:eq(0)>i"
  );
  expandMenu(
    ".lan>div:eq(0)",
    language,
    ".lan_expand_cont",
    ".lan>div:eq(0)>i"
  );
  expandMenu(".settings", settings, ".l_db_settings", ".settings_gear", true);
  expandMenu(
    ".cookie_settings",
    cookieSettings,
    ".cookie_settings_db",
    ".cookie_arr"
  );

  $(".l_db_settings, .cookie_settings_db, .search_cont input").click(function (
    e
  ) {
    e.stopPropagation();
  });

  $(".search_icon_cont").click(function () {
    $(".search_cont").css("display", "block");
  });

  $(".search_cont, .close_search").click(function () {
    $(".search_cont").css("display", "none");
  });

  // კარუსელი
  let carouselSlidesNumber = $(".carousel_slide").length;
  let carouselWidth = Math.round(parseFloat($(".carousel_slide_cont").width()));
  let firstClick = { left: false, right: true };
  let allowClick = { val: true };
  let thumbnailContainerWidth = parseInt(
    $(".carousel_thumbnails_cont").width()
  );
  let thumbnailWidth = thumbnailContainerWidth / carouselSlidesNumber;
  let thumbnailLefts = { left1: 0, left2: -thumbnailWidth };
  let movingSubnail = { val: 1 };

  function animatedThumbnail(thumbnail) {
    $(".carousel_thumbnail").removeClass("carousel_thumbnail_animation");
    $(thumbnail).addClass("carousel_thumbnail_animation");
  }

  for (let i = 0; i < carouselSlidesNumber; i++) {
    let newLeft = `${(i - carouselSlidesNumber + 2) * carouselWidth}px`;
    $(`.carousel_slide:eq(${i})`).css({ left: newLeft });
  }

  $(".carousel_thumbnail").css("width", `${thumbnailWidth}px`); // ფრჩხილიების სიგანის დაყენება
  $(".carousel_thumbnail1").css("left", `${thumbnailLefts.left1}px`); // პირველი ფრჩხილის "მარცხენა" თვისების დაყენება
  $(".carousel_thumbnail2").css("left", `${thumbnailLefts.left2}px`); // მეორე ფრჩხილის "მარცხენა" თვისების დაყენება
  animatedThumbnail(".carousel_thumbnail1"); // პირველად ანიმირებულია პირველი ფრჩხილი

  setTimeout(() => {
    // გარკვეული დროის შემდეგ ტრანზიციის თვისების დადება
    $(".carousel_slide").css("transition", "left 0.3s");
  }, 300);

  $(".carousel_arrow_right, .carousel_invisable_arrow_right")
    .click(function () {
      // კარუსელის სლაიდების მუშაობის კოდი
      if (allowClick.val) {
        allowClick.val = false; // გასრიალების ანიმაციას უნდა დალოდება
        if (!firstClick.right) {
          // თუ არ არის კარუსელი გადაწყობილი
          for (let i = 0; i < carouselSlidesNumber; i++) {
            let left = Math.round(
              parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
            );
            // კარუსელის გადაწყობა ისე რომ მარჯვნივ იყოს მხოლოდ ერთი ელემენტი, დანარჩენი მარცხნივ
            if (left > 2 * carouselWidth) {
              // გადასროლა :
              // მაგ.: თუ მაქვს 1 2 3 4 5 |6| 7 სლაიდები და ხილულ არეშია 6 , მაშინ 1 2 3 გადაისროლება მარჯვნივ
              // ხოლო დანარჩენი გასრიალდება და მექნება: 4 |5| 6 7 1 2 3
              $(`.carousel_slide:eq(${i})`)
                .hide(0)
                .css({
                  left: left - carouselWidth * (carouselSlidesNumber + 1),
                })
                .show(0);
              continue;
            }
            let newLeft = `${
              Math.round(
                parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
              ) - carouselWidth
            }px`; //
            $(`.carousel_slide:eq(${i})`).css({ left: newLeft }); // გასრიალება
          }
          firstClick.right = true;
          firstClick.left = false;
        } else {
          // თუ კარუსელი გადაწყობილია: მაგ: 1 2 3 4 |5| 6 ხილულ არეშია 5
          for (let i = 0; i < carouselSlidesNumber; i++) {
            let left = Math.round(
              parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
            );
            if (left == -((carouselSlidesNumber - 2) * carouselWidth)) {
              // მარცხენა უკიდურესი ელემენტის გადასროლა უკიდურეს მარჯვნივ
              $(`.carousel_slide:eq(${i})`)
                .hide(0)
                .css({ left: carouselWidth })
                .show(0);
              continue;
            }
            let newLeft = `${
              Math.round(
                parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
              ) - carouselWidth
            }px`;
            $(`.carousel_slide:eq(${i})`).css({ left: newLeft }); // გასრიალება
          }
        }
        setTimeout(() => {
          allowClick.val = true;
        }, 350);

        // კარუსელის ისრის ეფექები
        $(".carousel_arrow_right i").css({ transform: "rotate(0deg)" });

        $(".carousel_arrow_right").css({
          "background-color": "#b63a3a",
          "padding-left": "20px",
        });
        setTimeout(function () {
          $(".carousel_arrow_right").css({
            backgroundColor: "rgba(0, 0, 0, .5)",
            "padding-left": "0px",
          });
        }, 300);

        // კარუსელის სუბნეილების მუშაობის კოდი
        $(".carousel_thumbnail").css({ backgroundColor: "#b63a3a" }); // წითელი ფერის მიცემა

        if (movingSubnail.val == 1) {
          $(".carousel_thumbnail2")
            .hide(0)
            .css({ left: -thumbnailWidth })
            .show(0, function () {
              if (
                Math.round(parseFloat($(".carousel_thumbnail1").css("left"))) >=
                thumbnailContainerWidth - thumbnailWidth
              ) {
                animatedThumbnail(".carousel_thumbnail2");
                movingSubnail.val = 2;
                $(".carousel_thumbnail2").css({
                  left: `${
                    Math.round(
                      parseFloat($(".carousel_thumbnail2").css("left"))
                    ) + thumbnailWidth
                  }px`,
                });
                setTimeout(() => {
                  $(".carousel_thumbnail1")
                    .hide(0)
                    .css({ left: -thumbnailWidth })
                    .show(0);
                }, 350);
              }
              $(".carousel_thumbnail1").css({
                left: `${
                  Math.round(
                    parseFloat($(".carousel_thumbnail1").css("left"))
                  ) + thumbnailWidth
                }px`,
              });
            });
        } else {
          $(".carousel_thumbnail1")
            .hide(0)
            .css({ left: -thumbnailWidth })
            .show(0, function () {
              if (
                Math.round(parseFloat($(".carousel_thumbnail2").css("left"))) >=
                thumbnailContainerWidth - thumbnailWidth
              ) {
                animatedThumbnail(".carousel_thumbnail1");
                movingSubnail.val = 1;
                $(".carousel_thumbnail1").css({
                  left: `${
                    Math.round(
                      parseFloat($(".carousel_thumbnail1").css("left"))
                    ) + thumbnailWidth
                  }px`,
                });
                setTimeout(() => {
                  $(".carousel_thumbnail2")
                    .hide(0)
                    .css({ left: -thumbnailWidth })
                    .show(0);
                }, 350);
              }
              $(".carousel_thumbnail2").css({
                left: `${
                  Math.round(
                    parseFloat($(".carousel_thumbnail2").css("left"))
                  ) + thumbnailWidth
                }px`,
              });
            });
        }
      }
    })
    .mouseenter(function () {
      if ($(window).width() >= 1024) {
        $(".carousel_arrow_right i").css({ transform: "rotate(0deg)" });
      }
    })
    .mouseleave(function () {
      $(".carousel_arrow_right i").css({ transform: "rotate(90deg)" });
    });

  $(".carousel_arrow_left, .carousel_invisable_arrow_left")
    .click(function () {
      if (allowClick.val) {
        allowClick.val = false; // გასრიალების ანიმაციას უნდა დალოდება
        if (!firstClick.left) {
          // თუ არ არის კარუსელი გადაწყობილი
          for (let i = 0; i < carouselSlidesNumber; i++) {
            let left = Math.round(
              parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
            );
            if (left < -2 * carouselWidth) {
              $(`.carousel_slide:eq(${i})`)
                .hide(0)
                .css({
                  left: left + carouselWidth * (carouselSlidesNumber + 1),
                })
                .show(0);
              continue;
            }
            let newLeft = `${
              Math.round(
                parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
              ) + carouselWidth
            }px`; //
            $(`.carousel_slide:eq(${i})`).css({ left: newLeft });
          }
          firstClick.left = true;
          firstClick.right = false;
        } else {
          for (let i = 0; i < carouselSlidesNumber; i++) {
            let left = Math.round(
              parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
            );
            if (left == (carouselSlidesNumber - 2) * carouselWidth) {
              $(`.carousel_slide:eq(${i})`)
                .hide(0)
                .css({ left: -carouselWidth })
                .show(0);
              continue;
            }
            let newLeft = `${
              Math.round(
                parseFloat($(`.carousel_slide:eq(${i})`).css("left"))
              ) + carouselWidth
            }px`; //
            $(`.carousel_slide:eq(${i})`).css({ left: newLeft });
          }
        }
        setTimeout(() => {
          allowClick.val = true;
        }, 350);

        // კარუსელის ისრების ეფექტები
        $(".carousel_arrow_left i").css({ transform: "rotate(0deg)" });

        $(".carousel_arrow_left").css({
          backgroundColor: "#3039b6",
          "padding-right": "20px",
        });
        setTimeout(function () {
          $(".carousel_arrow_left").css({
            backgroundColor: "rgba(0, 0, 0, .5)",
            "padding-right": "0px",
          });
        }, 300);

        // კარუსელის სუბნეილების მუშაობის კოდი
        $(".carousel_thumbnail").css({ backgroundColor: "#3039b6" }); // ლურჯი ფერის მიცემა

        if (movingSubnail.val == 1) {
          $(".carousel_thumbnail2")
            .hide(0)
            .css({ left: thumbnailContainerWidth })
            .show(0, function () {
              if (
                Math.round(parseFloat($(".carousel_thumbnail1").css("left"))) <=
                0
              ) {
                animatedThumbnail(".carousel_thumbnail2");
                movingSubnail.val = 2;
                $(".carousel_thumbnail2").css({
                  left: `${
                    Math.round(
                      parseFloat($(".carousel_thumbnail2").css("left"))
                    ) - thumbnailWidth
                  }px`,
                });
                setTimeout(() => {
                  $(".carousel_thumbnail1")
                    .hide(0)
                    .css({ left: thumbnailContainerWidth })
                    .show(0);
                }, 350);
              }
              $(".carousel_thumbnail1").css({
                left: `${
                  Math.round(
                    parseFloat($(".carousel_thumbnail1").css("left"))
                  ) - thumbnailWidth
                }px`,
              });
            });
        } else {
          $(".carousel_thumbnail1")
            .hide(0)
            .css({ left: thumbnailContainerWidth })
            .show(0, function () {
              if (
                Math.round(parseFloat($(".carousel_thumbnail2").css("left"))) <=
                0
              ) {
                animatedThumbnail(".carousel_thumbnail1");
                movingSubnail.val = 1;
                $(".carousel_thumbnail1").css({
                  left: `${
                    Math.round(
                      parseFloat($(".carousel_thumbnail1").css("left"))
                    ) - thumbnailWidth
                  }px`,
                });
                setTimeout(() => {
                  $(".carousel_thumbnail2")
                    .hide(0)
                    .css({ left: thumbnailContainerWidth })
                    .show(0);
                }, 350);
              }
              $(".carousel_thumbnail2").css({
                left: `${
                  Math.round(
                    parseFloat($(".carousel_thumbnail2").css("left"))
                  ) - thumbnailWidth
                }px`,
              });
            });
        }
      }
    })
    .mouseenter(function () {
      if ($(window).width() >= 1024) {
        $(".carousel_arrow_left i").css({ transform: "rotate(0deg)" });
      }
    })
    .mouseleave(function () {
      $(".carousel_arrow_left i").css({ transform: "rotate(-90deg)" });
    });
  // კარუსელის დასასრული

  $(".home_page_image_img:eq(0)").css({ opacity: 1 });

  setInterval(() => {
    $(
      `.home_page_image_img:eq(${manPgOpacityCarouselCurrentCounter.value - 1})`
    ).css({ opacity: 0 });
    $(
      `.home_page_image_img:eq(${manPgOpacityCarouselCurrentCounter.value})`
    ).css({ opacity: 1 });
    manPgOpacityCarouselCurrentCounter.value += 1;
    if (manPgOpacityCarouselCurrentCounter.value > 3) {
      manPgOpacityCarouselCurrentCounter.value = 0;
    }
  }, 3000);

  //გრიდი

  // გრიდს სჭირდება ფუნქცია elementIsInViewport ანიმაციებისთვის.
  // elementIsInViewport განსაზღვრულია ფაილის დასაწყისში, რადგან სხვა ფუნქციებიც იყენებენ მას
  if (
    $("title").text() == "მთავარი გვერდი" ||
    $("title").text() == "პროექტები"
  ) {
    // თუ იმყოფები გვერდებზე, რომლებიც იყენებენ გრიდს
    // გრიდის ელემენტების ანიმაციის ფუნქციის განსაზღვრა დიდი ზომის ეკრანებისთვის
    let gridAnimation;
    if ($(window).width() >= 1024) {
      gridAnimation = function () {
        if (elementIsInViewport(".grid_cont")) {
          // გრიდის კონტეინერის გამოჩენის შემდეგ...
          for (let i = 0; i < $(".grid_item").length; i++) {
            // რამდენი ელემენტის აქვს გრიდს ...
            setTimeout(() => {
              //ყოველ ნახევარი წუთის შუალედით, ერთმანეთის მიყოლებით, გამოაჩინე ელემენტები
              $(`.grid_item:eq(${i})`).css({
                transform: "translateX(0)",
                opacity: 1,
                pointerEvents: "initial",
              });
            }, 500 * i);
          }
        }
      };
    } else {
      // გრიდის ელემენტების ანიმაციის ფუნქციის განსაზღვრა პატარა ზომის ეკრანებისთვის
      gridAnimation = function () {
        for (let i = 0; i < $(`.grid_item`).length; i++) {
          // რამდენი ელემენტის აქვს გრიდს ...
          if (elementIsInViewport(`.grid_item:eq(${i})`)) {
            // თუ მხედველობის არეში გამოჩნდება გრიდის ელემენტი
            // დაიწყე ანიმაცია მხოლოდ ამ ელემენტზე
            $(`.grid_item:eq(${i})`).css({
              transform: "translateY(0)",
              opacity: 1,
              pointerEvents: "initial",
            });
          }
        }
      };
    }
    gridAnimation(); // ფუნქციის თავდაპირველი გამოძახება
    $(window).scroll(function () {
      // ფუნქციის გამოძახება სქროლზე
      gridAnimation();
    });
  }

  //გრიდის დასასრული

  let footerAnimationDone = { value: false };

  $(window).scroll(function () {
    if (!footerAnimationDone.value) {
      if (elementIsInViewport(".footer_cont")) {
        //footer ტელეფონის ანიმაცია
        footerAnimationDone.value = true;
        setTimeout(() => {
          $(".footer_phone>div").css({ width: "150px" });
        }, 500);
        setTimeout(() => {
          $(".footer_phone>div").css({ fontSize: "20px", color: "#b63a3a" });
          $(".footer_phone>i").addClass("footer_phone_shake");
        }, 1000);
        setTimeout(() => {
          $(".footer_phone>div").css({
            fontSize: "16px",
            color: "#3945ee",
            fontWeight: "bold",
          });
        }, 1500);
      }
    }
  });

  //პროექტების გვერდების სურათების და ტექსტების ანიმაციები

  for (let i = 0; i < projectsPagesTitles.length; i++) {
    if ($("title").text() == projectsPagesTitles[i]) {
      opacityAnimation(".projects_page_cont", "project_texts>span");
      opacityAnimation(".projects_page_cont", "projects_img");
      break;
    }
  }

  /**
   * ამ გადამრთველის გარეშე კონსოლი მიჩვენებს ერორს, რადგან opacityAnimation ფუნქცია ვერ იპოვის თავის არგუმენტებს
   * თუ არ ვარ შესაბამის გვერდზე, სადაც ეს არგუმენტი არსებობს.
   */

  switch ($("title").text()) {
    case "საზღვაო სამუშაოები": // თუ ხარ ამ გვერდზე
      // opacityAnimation ფუნცქციას მიეცი ელემენტები არგუმენტებად, რომლებიც ამ გვერდზე არსებობენ
      opacityAnimation(
        ".marine_works_text_wrapper ul",
        "marine_works_text_wrapper li"
      );
      opacityAnimation(".marine_works_imgs_wrapper", "marine_works_img");
      break;
    case "მთავარი გვერდი":
      opacityAnimation(
        ".home_pg_about_section_cont",
        "home_pg_about_section_img_wrapper"
      );
      break;
    case "სამოქალაქო და ინდუსტრიული პროექტები":
      opacityAnimation(".cip_text", "cip_text li");
      break;
    case "კონტაქტი":
      opacityAnimation(".contact_cont", "contact_cont_item");
      break;
    case "ჩვენს შესახებ":
      opacityAnimation(
        ".about_cont_text ul:eq(0)",
        "about_cont_text ul:eq(0) li"
      );
      opacityAnimation(
        ".about_cont_text ul:eq(1)",
        "about_cont_text ul:eq(1) li"
      );
      opacityAnimation(".about_img_cont", "about_img_cont");
      break;
    case "სამშენებლო მასალები":
      opacityAnimation(
        ".building_materials_main_img",
        "building_materials_main_img"
      );
      break;
    case "სიახლეები":
      opacityAnimation(
        ".projects_page_cont:eq(0)",
        "projects_page_cont:eq(0)>div:eq(1)>ul>span"
      );
      opacityAnimation(
        ".projects_page_cont:eq(1)",
        "projects_page_cont:eq(1)>div:eq(1)>ul>span"
      );
      opacityAnimation(
        ".projects_page_cont:eq(2)",
        "projects_page_cont:eq(2)>div:eq(1)>ul>span"
      );
      opacityAnimation(".projects_page_cont:eq(0)", "projects_img:eq(0)");
      opacityAnimation(".projects_page_cont:eq(1)", "projects_img:eq(1)");
      opacityAnimation(".projects_page_cont:eq(2)", "projects_img:eq(2)");
      break;
    case "ჩვენი გუნდი":
      opacityAnimation(".team_photo", "team_photo");
      for (let i = 0; i < $(".team_member_cont").length; i++) {
        opacityAnimation(
          `.team_member_cont:eq(${i})`,
          `team_member_cont img:eq(${i})`
        );
      }
      break;
    default:
      break;
  }

  // საზღვრის ფერის ცვლილება ტექსტის და ინფუთის ველებზე ფოკუსის დროს

  inputFieldFocusMode(".sender_name input");
  inputFieldFocusMode(".sender_mail input");
  inputFieldFocusMode(".textarea_and_submit textarea");

  let lastScrollTop = 0;

  $(window).scroll(function () {
    let scrollTop = $(this).scrollTop();
    if (scrollTop > lastScrollTop) {
      $("header, .header_cont").css({ height: "50px" });
      $(".logo").css({ transform: "scale(0.55)" });
      $(".db_menu").css({ top: "49px" });
      $(".lg_menu_expand_cont").css({ top: "39px" });
      $(".l_db_settings").css({ top: "34px" });

      if ($(this).scrollTop() > 100) {
        $(".scrollTop").show(0);
      }
    } else {
      $("header, .header_cont").css({ height: "85px" });
      $(".logo").css({ transform: "scale(1)" });
      $(".db_menu").css({ top: "85px" });
      $(".lg_menu_expand_cont").css({ top: "50px" });
      $(".l_db_settings").css({ top: "50px" });

      if ($(this).scrollTop() < 100) {
        $(".scrollTop").hide(0);
      }
    }
    lastScrollTop = scrollTop;
  });

  /**
   * იმისდა მიხედვით თუ რომელი პროექტის გვერდზე ვარ, მომდევნო და წინა პროექტების ლინკების განსაზღვრა
   */

  switch ($("title").text()) {
    case "ფოთი აპარტამენტი": // ვარ პირველ გვერდზე
      nextPrevProj("./berth-7", "./pay-terminal", 0); // შემდეგი გვერდის განსაზღვრა
      break;
    case "ნავმისადგომი-7":
      nextPrevProj("./berth-15", "./poti-apartment", 1);
      break;
    case "ნავმისადგომი-15":
      nextPrevProj("./container-terminal", "./berth-7", 2);
      break;
    case "საკონტეინერო ტერმინალი":
      nextPrevProj("./lego-blocks", "./berth-15", 3);
      break;
    case "ლეგო-ბლოკები":
      nextPrevProj("./pay-terminal", "./container-terminal", 4);
      break;
    case "გადახდის ტერმინალი":
      nextPrevProj("./poti-apartment", "./lego-blocks", 5);
      break;

    default:
      break;
  }

  $(".scrollTop").click(function () {
    $(this).hide(0);
    $("html, body").animate({ scrollTop: 0 }, 800);
  });

  $(".search_cont>div").click(function (e) {
    e.stopPropagation();
  });

  $(".search_input").keydown(function (e) {
    if (e.keyCode === 13) {
      e.preventDefault();
    }
  });

  //ძებნა
  $(".search_input").keyup(function () {
    let filePath = { val: "" };
    let inputValue = $(".search_input")
      .val()
      .toLowerCase()
      .replace(/[-,.!:'"\/\d\s]/g, ""); // საძებნი ტექსტი
    if (inputValue != "") {
      // თუ ვერლი ცარიელი არაა
      findFilePaths(filePath, "search");
      $.ajax({
        url: filePath.val, // ძებნის ფაილთან დაკავშირება
        type: "post",
        data: {
          searchSubmitBtn: true,
        },
        dataType: "json",
        success: function (data) {
          // მონაცემებს შეადგენს ყველა პროექტის დასახელება ყველა ენაზე. ენების თანმიმდევრობაა:
          //ქართული, ინგლისური, რუსული
          $(".searched_links").empty(); // რესეტი მოძებნილი პროექტების კონტეინერის
          let foundArr = []; // მოძებნილი პროექტების მასივი
          let Allhrefs = []; // ყველა პროექტის ლინკის განაზღვრა იმისდა მიხედვით თუ რომელ გვერდზე ვარ
          let searchedlementsHrefs = []; // მხოლოდ მოძებნილი ფროექტების ლინკები
          for (let i = 0; i < allPages.length; i++) {
            // ყველა ლინკის განსაზღვრა
            if ($("title").text() == allPages[i]) {
              switch (i) {
                case 0:
                  Allhrefs = projectPathsFromAllLocation.distance3;
                  break;
                case 1:
                case 2:
                case 3:
                  Allhrefs = projectPathsFromAllLocation.distance1;
                  break;
                case 4:
                case 5:
                case 12:
                case 13:
                case 14:
                  Allhrefs = projectPathsFromAllLocation.distance2;
                  break;
                default:
                  Allhrefs = projectPathsFromAllLocation.distance0;
                  break;
              }
            }
          }

          $.each(data, function (index, element) {
            if (
              element.replace(/[\s]/g, "").toLowerCase().indexOf(inputValue) !=
              -1
            ) {
              foundArr.push(element);
              let indexMod6 = index % 6;
              searchedlementsHrefs.push(Allhrefs[indexMod6]); // მოძებნილი ლინკები
            }
          });
          let noResult;
          let font;
          switch ($(".lan>div:eq(0)>div:eq(0)").text().trim()) {
            case "ენა":
              noResult = "შედეგები არ მოიძებნა";
              font = "_ffc";
              break;
            case "lan":
              noResult = "No results found";
              font = "_eng_ru_c";
              break;
            case "язык":
              noResult = "Результатов не найдено";
              font = "_eng_ru_c";
              break;

            default:
              break;
          }
          $.each(foundArr, function (index, element) {
            $(".searched_links").append(
              `<li class="cw"><a href="${searchedlementsHrefs[index]}" class="menu_hover ${font}">${element}</a></li>`
            );
            $(".searched_links a").addClass("cw");
            if (index != foundArr.length - 1) {
              $(".searched_links").append("<hr class='w5'>");
            }
          });
          if (searchedlementsHrefs.length == 0) {
            $(".searched_links").append(
              `<div class="cw ${font}">${noResult}</div>`
            );
          }
        },
      });
    } else {
      $(".searched_links").empty();
    }
  });

  function expandImage(element, hasImgTag = true) {
    let imageSrc;
    $(element).css({ cursor: "zoom-in" });
    $(element).click(function () {
      let numberIfImages = 0;
      let imagesSrcArray = [];

      if (hasImgTag) {
        imageSrc = `url(${$(this).attr("src")})`;
        $.each($("body").find(element), function (i, e) {
          numberIfImages += 1;
          imagesSrcArray.push(`url(${$(e).attr("src")})`);
        });
      } else {
        imageSrc = $(this).css("background-image");
        $.each($("body").find(element), function (i, e) {
          numberIfImages += 1;
          imagesSrcArray.push($(e).css("background-image"));
        });
      }

      $("body").append(
        "<div class='expand_img_cont o0'><div class='expand_img'><div></div><div></div><i class='expand_close fa-solid fa-xmark'></i></div></div>"
      );

      function removeImage() {
        $(".expand_img_cont, .expand_img_cont i").css({
          opacity: 0,
          cursor: "default",
        });
        setTimeout(() => {
          $(".expand_img_cont").remove();
        }, 500);
      }

      if (numberIfImages > 1) {
        $(".expand_img").append(
          "<i class='expand_arr_right fa-solid fa-circle-chevron-right'></i><i class='expand_arr_left fa-solid fa-circle-chevron-left'></i>"
        );
        let carouselIndex = { val: 0 };

        $.each(imagesSrcArray, function (index, element) {
          if (element == imageSrc) {
            carouselIndex.val = index;
          }
        });

        $(".expand_arr_right, .expand_img>div:eq(1)").click(function () {
          carouselIndex.val++;
          if (carouselIndex.val == numberIfImages) {
            carouselIndex.val = 0;
          }
          $(".expand_arr_right").css({ top: "5px" });
          setTimeout(() => {
            $(".expand_arr_right").css({ top: "0" });
          }, 100);
          $(".expand_img").css({
            backgroundImage: imagesSrcArray[carouselIndex.val],
          });
        });

        $(".expand_arr_left, .expand_img>div:eq(0)").click(function () {
          carouselIndex.val--;
          if (carouselIndex.val == -1) {
            carouselIndex.val = numberIfImages - 1;
          }
          $(".expand_arr_left").css({ top: "5px" });
          setTimeout(() => {
            $(".expand_arr_left").css({ top: "0" });
          }, 100);
          $(".expand_img").css({
            backgroundImage: imagesSrcArray[carouselIndex.val],
          });
        });
      }

      setTimeout(() => {
        $(".expand_img_cont")
          .css({ opacity: 1 })
          .click(function () {
            removeImage();
            $(".expand_arr_right", ".expand_arr_left");
          });
      }, 10);

      $(".expand_img")
        .css({ backgroundImage: `${imageSrc}` })
        .click(function (e) {
          e.stopPropagation();
        });

      $(".expand_close").click(function () {
        removeImage();
      });
    });
  }

  expandImage(".projects_page_cont img");
  expandImage(".home_pg_about_section_img_wrapper", false);
  expandImage(".about_img_cont", false);
  expandImage(".marine_works_img ", false);
  expandImage(".building_materials_main_img", false);
  expandImage(".cip_section_img_cont>img");
  expandImage(".team_photo", false);
  expandImage(".team_member_img");

  $(".submit_mail_btn").click(function (e) {
    e.preventDefault();
    let submitAllowed = { val: true };
    let flname = $(".sender_name>input").val().trim();
    let email = $(".sender_mail>input").val().trim();
    let text = $(".textarea_and_submit>textarea").val().trim();
    let googleCaptcha = grecaptcha.getResponse();
    let texts = [];
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    switch ($(".lan>div:eq(0)>div:eq(0)").text().trim()) {
      case "ენა":
        texts = [
          "სახელის ველი არ უნდა იყოს ცარიელი",
          "ელ.ფოსტის ველი არ უნდა იყოს ცარიელი",
          "თქვენ არ შეგიძლიათ ცარიელი ტექსტის გაგზავნა",
          "დაადასტურეთ, რომ არ ხართ რობოტი Google Captcha-ს საშუალებით",
          "შეტყობინება წარმატებით გაიგზავნა",
          "თქვენი შეტყობინების გაგზავნისას წარმოიშვა პრობლემა. გთხოვთ სცადოთ მოგვიანებით",
          "არასწორი ელ. ფოსტა. გთხოვთ შეიყვანოთ სწორი ელ. ფოსტის მისამართი",
        ];
        break;
      case "lan":
        texts = [
          "The name field must not be empty",
          "The e-mail field must not be empty",
          "You cannot send empty text",
          "Verify you are not a robot with Google Captcha",
          "Message sent successfully",
          "There was an issue sending your message. Please try again later",
          "Invalid email. Please enter a valid email address",
        ];
        break;
      case "язык":
        texts = [
          "Поле имени не должно быть пустым",
          "Поле электронной почты не должно быть пустым",
          "Вы не можете отправлять пустой текст",
          "Подтвердите, что вы не робот, с помощью Google Captcha",
          "Сообщение успешно отправлено",
          "Возникла проблема с отправкой вашего сообщения. Пожалуйста, повторите попытку позже",
          "Неверный адрес электронной почты. Пожалуйста, введите действительный адрес электронной почты",
        ];
        break;

      default:
        break;
    }

    if (flname == "") {
      submitAllowed.val = false;
      alert(texts[0]);
    }

    if (email == "" && submitAllowed.val) {
      submitAllowed.val = false;
      alert(texts[1]);
    }

    if (!emailPattern.test(email) && submitAllowed.val) {
      submitAllowed.val = false;
      alert(texts[6]);
    }

    if (text == "" && submitAllowed.val) {
      submitAllowed.val = false;
      alert(texts[2]);
    }

    if (!googleCaptcha.length > 0 && submitAllowed.val) {
      submitAllowed.val = false;
      alert(texts[3]);
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
          gRecaptchaResponse: googleCaptcha,
        },
        success: function (data) {
          if (data == "good") {
            alert(texts[4]);
            $(".sender_name>input").val("");
            $(".sender_mail>input").val("");
            $(".textarea_and_submit>textarea").val("");
            $(".mail_message").css({ opacity: 0, "z-index": -1000 });
          } else {
            alert(texts[5]);
            $(".mail_message").css({ opacity: 0, "z-index": -1000 });
          }
        },
      });
    }
  });

  $(".allow_cookie").click(function (e) {
    let filePath = { val: "" };
    e.preventDefault();
    $(".check_cookie").prop("checked", true);
    $(".cookie_cont").hide(0);
    findFilePaths(filePath, "allow-cookies");
    $.ajax({
      url: filePath.val,
      type: "post",
      data: {
        btn: "clicked",
      },
    });
  });

  $(".reject_cookie").click(function (e) {
    let filePath = { val: "" };

    e.preventDefault();
    $(".cookie_cont").hide(0);
    findFilePaths(filePath, "reject-cookies");
    $.ajax({
      url: filePath.val,
      type: "post",
      data: {
        btn: "clicked",
      },
    });
  });

  {
    // theme
    let changeClasses = [
      ".theme,.menu_hover,.title_of_page,.icon_view,span,.title_of_sections,.title_of_subsections,.grid_title,.grid_text,p,li",
    ];
    let filePath = { val: "" };

    let whiteTheme = function () {
      $(".theme_dot_inner_dark").show(0);
      $(".theme_dot_inner_white").hide(0);
      $(".theme_dot").css({ "pointer-events": "none", cursor: "default" });
      $(".theme_dot:eq(1),.theme_dot:eq(3)").css({
        "pointer-events": "auto",
        cursor: "pointer",
      });
      $(`${changeClasses}`).removeClass("theme_dark").addClass("theme_white");
      $(".icon_view").removeClass("border_white").addClass("border_dark");
      $(".cookie_cont").css({ "background-color": "rgba(255, 255, 255, 0.8)" });
      $(":root").css("--bgColor", "#e6e3e0");
      $(":root").css("--bg1", "#f0ebe9");
    };

    let darkTheme = function () {
      $(".theme_dot_inner_dark").hide(0);
      $(".theme_dot_inner_white").show(0);
      $(".theme_dot").css({ "pointer-events": "none", cursor: "default" });
      $(".theme_dot:eq(0),.theme_dot:eq(2)").css({
        "pointer-events": "auto",
        cursor: "pointer",
      });
      $(`${changeClasses}`).removeClass("theme_white").addClass("theme_dark");
      $(".icon_view").removeClass("border_dark").addClass("border_white");
      $(".cookie_cont").css({ "background-color": "rgba(0, 0, 0, 0.8)" });
      $(":root").css("--bgColor", "#343232");
      $(":root").css("--bg1", "#2e2b2a");
    };

    findFilePaths(filePath, "changeTheme");

    if ($(".detect_theme").attr("id") == "theme_white") {
      whiteTheme();
    } else {
      darkTheme();
    }

    let preventClick = { val: false };

    $(".theme_dot:eq(0),.theme_dot:eq(2)").click(function () {
      //white theme
      if (!preventClick.val) {
        preventClick.val = true;
        $.ajax({
          url: filePath.val,
          type: "post",
          data: {
            changeThemeBtn: true,
            theme: "white",
          },
        });
        $("body").hide(0);
        $("body").fadeIn(1000);
        whiteTheme();
        setTimeout(() => {
          preventClick.val = false;
        }, 1000);
      }
    });

    $(".theme_dot:eq(1),.theme_dot:eq(3)").click(function () {
      //dark theme
      if (!preventClick.val) {
        preventClick.val = true;
        $.ajax({
          url: filePath.val,
          type: "post",
          data: {
            changeThemeBtn: true,
            theme: "dark",
          },
        });
        $("body").hide(0);
        $("body").fadeIn(1000);
        darkTheme();
        setTimeout(() => {
            preventClick.val = false;
          }, 1000);
      }
    });
  }

  {
    // cookie
    $(".learn_cookie").click(function () {
      $(".learn_cookie_cont").show(0);
    });

    $(".learn_cookie_cont>i").click(function (e) {
      e.stopPropagation();
      $(".learn_cookie_cont").hide(0);
    });

    $(".learn_cookie_cont").click(function () {
      $(".learn_cookie_cont>i").click();
    });

    $(".learn_cookie_content").click(function (e) {
      e.stopPropagation();
    });
  }

  {
    if ($(".detect_cookie_lan").attr("id") == "lan_cookie_allowed") {
      $(".lan_checked").prop("checked", true);
    } else {
      $(".lan_checked").prop("checked", false);
    }

    if ($(".detect_cookie_theme").attr("id") == "theme_cookie_allowed") {
      $(".theme_checked").prop("checked", true);
    } else {
      $(".theme_checked").prop("checked", false);
    }

    $(".lan_checked").click(function () {
      let checked = $(this).prop("checked");
      let filePath = { val: "" };

      $(".cookie_cont").hide(0);
      findFilePaths(filePath, "cookie-lan-settings");
      $.ajax({
        url: filePath.val,
        type: "post",
        data: {
          setLanCookie: true,
          checked: checked,
        },
      });
    });

    $(".theme_checked").click(function () {
      let checked = $(this).prop("checked");
      let filePath = { val: "" };

      $(".cookie_cont").hide(0);
      findFilePaths(filePath, "cookie-theme-settings");
      $.ajax({
        url: filePath.val,
        type: "post",
        data: {
          setThemeCookie: true,
          checked: checked,
        },
      });
    });
  }
});
