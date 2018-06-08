var $ = jQuery.noConflict();
jQuery(document).ready(function($) {

    // if (window.matchMedia('(max-width: 480px)').matches){
    //     $('#main > .container').each(function(){
    //         $(this).find('.headline').prependTo(this);
    //     });
    //     $('#how-we-differ > .container').each(function(){
    //         $(this).find('.headline').prependTo(this);
    //     });
    // }
    $('[data-toggle="tooltip"]').tooltip();
    $('body').scrollspy({ target: '#navbarNav' });

    // $("#navbarNav").find("li").on("click", "a", function(event) {
        // $('.navbar-collapse.in').collapse('hide');
        // event.preventDefault();
    // });
    //https://www.youtube.com/watch?v=pQ2MKhksjHs
    /*-----------------------------------------------------------------------------------*/
    /* back to top
    /*-----------------------------------------------------------------------------------*/
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    /*-----------------------------------------------------------------------------------*/
    /* WOW Animation
    /*-----------------------------------------------------------------------------------*/
        wow = new WOW({
           boxClass     : 'wow', // default
           animateClass : 'animated', // default
           offset       : 100, // default
           mobile       : false, // default
           live         : true // default
        });
        wow.init();

    /*-----------------------------------------------------------------------------------*/
    /* Simple mode, it styles document scrollbar:
    /*-----------------------------------------------------------------------------------*/
    var nice = $("html").niceScroll({
           cursorcolor        : "#029c99",
           cursoropacitymin   : 0.3,
           cursorwidth        : "10px",
           // autohidemode       : false,
           background         : "rgba(255,255,255,0.5)",
           enablemousewheel   : true,
           zindex             : "999999999",
           cursorborder       : "0",
           cursorborderradius : "0",
           // autohidemode       : false,
           cursorminheight    : 30,
           horizrailenabled   :false
    });

    /*-----------------------------------------------------------------------------------*/
    /* navbar 
    /*-----------------------------------------------------------------------------------*/

    $(window).on("scroll", function () {
        $(window).height() - 65 <= $(window).scrollTop() ? $(".navbar-top").addClass("nav-scroll") : $(".navbar-top").removeClass("nav-scroll");
    });
    $.scrollIt({
        topOffset: -65
    });
    $(document).ready(function () {
        $("#navbarNav").on("click", ".nav-link", function () {
            $(window).width() < 768 && $("#navbarNav").collapse("hide")
        });
    });



var swiper = new Swiper('.gfort-swiper-slider', {
    speed: 400,
    spaceBetween: 100,
    loop: true,
    autoplay: {
        delay: 5000,
    },
    pagination: {
        el: '.swiper-pagination',
        // type: 'progressbar',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});










    // if (jQuery('.gfort-swiper-slider').length) {
    //         swiperSliderfn();
    //         swiperSliderHeightfn();
    //         // swipToSlidefn();
    // }

    // jQuery(window).resize(function () {
    //     if (jQuery('.gfort-swiper-slider').length) {
    //         jQuery('.gfort-swiper-slider').each(function () {
    //             jQuery('#' + jQuery(this).attr('id'))[0].swiper.destroy();
    //         });
    //         swiperSliderfn();
    //         swiperSliderHeightfn();
    //         // swipToSlidefn();
    //     }
    // });
});





    // function swiperSliderfn() {
    //     jQuery('.gfort-swiper-slider').each(function (index) {

    //         var grabTouchMouse,
    //             sliderDirection,
    //             el = jQuery(this),
    //             slideItemsPerView,
    //             slideItemsMDPerView,
    //             slideItemsSMPerView,
    //             slideItemsXSPerView,
    //             centeredSlidesItems,
    //             slideAnimationEffect,
    //             windowWidth = jQuery(window).outerWidth(true);

    //         /* Thumbs
    //         ----------------------------------------------------------------- */
    //         // if (el.hasClass('thumbs-swiper-slider')) {
    //         //     el.find('.swiper-pagination').addClass('swiper-pagination-tumbs');
    //         //     el.find('.swiper-pagination').removeClass('swiper-pagination');
    //         //     el.find('.swiper-pagination-tumbs span:first').addClass('active-swiper-slide');
    //         //     el.find('.swiper-pagination-tumbs span').each(function (slidesIndex) {
    //         //         jQuery(this).attr('data-gfort-swiper-slide-to', slidesIndex + 1);
    //         //     });
    //         // }

    //         /* Slider, Pagination and Arrows IDs
    //         ----------------------------------------------------------------- */
    //         el.attr('id', 'gfort-swiper-slider-' + index);
    //         el.find('.swiper-pagination').attr('id', 'gfort-swiper-pagination-' + index);
    //         el.find('.swiper-button-next').attr('id', 'gfort-swiper-button-next-' + index);
    //         el.find('.swiper-button-prev').attr('id', 'gfort-swiper-button-prev-' + index);

    //         /* Mouse Cursor
    //         ----------------------------------------------------------------- */
    //         grabTouchMouse = jQuery('#gfort-swiper-slider-' + index).hasClass('fade-swiper-slider')
    //             ? !1
    //             : !0;

    //         /* Direction
    //         ----------------------------------------------------------------- */
    //         sliderDirection = jQuery('#gfort-swiper-slider-' + index).hasClass('vertical-swiper-slider')
    //             ? 'vertical'
    //             : 'horizontal';

    //         /* Centerd Items
    //         ----------------------------------------------------------------- */
    //         centeredSlidesItems = jQuery('#gfort-swiper-slider-' + index).hasClass('center-swiper-slider')
    //             ? !0
    //             : !1;

    //         /* Animation Effect ( fade / slide )
    //         ----------------------------------------------------------------- */
    //         slideAnimationEffect = jQuery('#gfort-swiper-slider-' + index).hasClass('fade-swiper-slider')
    //             ? 'fade'
    //             : 'slide';

    //         /* Animation Effect ( coverflow )
    //         ----------------------------------------------------------------- */
    //         if (jQuery('#gfort-swiper-slider-' + index).hasClass('coverflow-swiper-slider')) {
    //             if (windowWidth < 1024) {
    //                 jQuery('#gfort-swiper-slider-' + index).removeClass('swiper-container-3d');
    //                 jQuery('#gfort-swiper-slider-' + index).find('.swiper-slide').css({transform: 'rotateY(0)'});
    //                 slideItemsPerView = '2';
    //                 slideAnimationEffect = 'slide';
    //             } else {
    //                 slideAnimationEffect = 'coverflow';
    //             }
    //         }

    //         /* Slide Items Per View ( on Large screen )
    //         ----------------------------------------------------------------- */
    //         slideItemsPerView = jQuery('#gfort-swiper-slider-' + index).attr('data-swiper-items');
    //         if (slideItemsPerView === '' || slideItemsPerView === undefined) {
    //             slideItemsPerView = 1;
    //         }

    //          Slide Items Per View ( on Medium screen )
    //         ----------------------------------------------------------------- 
    //         slideItemsMDPerView = jQuery('#gfort-swiper-slider-' + index).attr('data-swiper-md-items');
    //         if (slideItemsMDPerView === '' || slideItemsMDPerView === undefined) {
    //             slideItemsMDPerView = 2;
    //         }

    //         /* Slide Items Per View ( on Small screen )
    //         ----------------------------------------------------------------- */
    //         slideItemsSMPerView = jQuery('#gfort-swiper-slider-' + index).attr('data-swiper-sm-items');
    //         if (slideItemsSMPerView === '' || slideItemsSMPerView === undefined) {
    //             slideItemsSMPerView = 2;
    //         }

    //         /* Slide Items Per View ( on Small screen )
    //         ----------------------------------------------------------------- */
    //         slideItemsXSPerView = jQuery('#gfort-swiper-slider-' + index).attr('data-swiper-xs-items');
    //         if (slideItemsXSPerView === '' || slideItemsXSPerView === undefined) {
    //             slideItemsXSPerView = 1;
    //         }

    //         if (sliderDirection === 'horizontal') {
    //             if (windowWidth < 401) {
    //                 slideItemsPerView = 1;
    //             } else if (windowWidth < 601) {
    //                 slideItemsPerView = slideItemsPerView > 1
    //                     ? slideItemsXSPerView
    //                     : 1;
    //             } else if (windowWidth < 768) {
    //                 slideItemsPerView = slideItemsPerView > 1
    //                     ? slideItemsSMPerView
    //                     : 1;
    //             } else if (windowWidth < 1024) {
    //                 slideItemsPerView = slideItemsPerView > 1
    //                     ? slideItemsMDPerView
    //                     : 1;
    //             }
    //         } else {
    //             slideItemsPerView = 1;
    //         }

    //         /* Configurations
    //         ----------------------------------------------------------------- */
    //         // jQuery().swiper({
    //         var selector = '#gfort-swiper-slider-' + index;
    //         var mySwiper = new Swiper(selector, {
    //             loop: true,
    //             speed: 800,
    //             coverflow: {
    //                 depth: 120,
    //                 rotate: -30,
    //                 stretch: 10
    //             },
    //             autoplay: 5000,
    //             paginationClickable: true,
    //             grabCursor: grabTouchMouse,
    //             direction: sliderDirection,
    //             effect: slideAnimationEffect,
    //             simulateTouch: grabTouchMouse,
    //             slidesPerView: slideItemsPerView,
    //             centeredSlides: centeredSlidesItems,
    //             autoplayDisableOnInteraction: false,
    //             pagination: '#gfort-swiper-pagination-' + index,
    //             nextButton: '#gfort-swiper-button-next-' + index,
    //             prevButton: '#gfort-swiper-button-prev-' + index
    //         });

    //         /* Hover
    //         ----------------------------------------------------------------- */
    //         jQuery('#gfort-swiper-slider-' + index).on({
    //             mouseenter: function () {
    //                 jQuery(this)[0].swiper.autoplay.stop();
    //             },
    //             mouseleave: function () {
    //                 jQuery(this)[0].swiper.autoplay.start();
    //             }
    //         });

    //     });
    // }

    // function swiperSliderHeightfn() {
    //     jQuery('.swiper-container-horizontal').each(function() {
    //         var el = jQuery(this);
    //         el.css({
    //             height: '100%'
    //         });
    //         el.css({
    //             height: el.find('.swiper-wrapper').outerHeight(true)
    //         });
    //         if (el.height() === 0 || el.height() < 21) {
    //             el.css({
    //                 height: '100%'
    //             });
    //         }
    //     });
    // }