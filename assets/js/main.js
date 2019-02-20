(function ($) {
	"use strict";
    jQuery(document).ready(function($){
        /*---------------------------------------
           Activate text according to switcher
        ----------------------------------------*/
        $(document).on('change','#switch-price',function () {
            // alert($(this).val())
            var $name_1 = $('#name_1');
            var $name_2 = $('#name_2');

            if ($name_1.hasClass('active')) {
                $name_1.removeClass('active');
                $name_2.addClass('active');
            }else{
                $name_1.addClass('active');
                $name_2.removeClass('active');
            }
        });
        /*------------------------
            Range Slider
        -------------------------*/
        var $rangeSlider = $(".range-slider");
         if ($rangeSlider.length > 1) {
             $rangeSlider.slider({
                 range: "min",
                 min: 0,
                 max: 40,
                 values: [5],
                 step: 5,
                 slide: function (event, ui) {
                     $(this).siblings('.value').text(ui.value);
                     let width = $(this).children('.ui-slider-handle').attr('style');
                     let lastval = width.slice(6, -1);
                     $(this).children('.ui-widget-header').css('width', lastval);
                     $(this).siblings('.value').css('left', lastval);
                 },
                 change: function (event, ui) {
                     let width = $(this).children('.ui-slider-handle').attr('style');
                     let lastval = width.slice(6, -1);
                     $(this).children('.ui-widget-header').css('width', lastval);
                     $(this).siblings('.value').css('left', lastval);
                 }
             });
         }
        
        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();

        /*-------------------------
            magnific popup activation
        -------------------------*/
        $('.video-play-btn,.video-popup,.small-vide-play-btn').magnificPopup({
            type: 'video'
        });
        /*------------------
            back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
        /*-------------------------
            counter section activation
        ---------------------------*/
        var counternumber = $('.count-num');
        counternumber.counterUp({
            delay: 20,
            time: 5000 
        });
        /*-------------------------------------
            Post Gallery carousel
        --------------------------------------*/
        var $postGalleryCarousel = $('.gallery-carousel');
        if ($postGalleryCarousel.length > 0) {
            $postGalleryCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                animateOut: 'flipOutY',
                animateIn: 'flipInY',
                responsive: {
                    0: {
                        items: 1,
                        nav:false
                    },
                    768: {
                        items: 1
                    },
                    960: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1920: {
                        items: 1
                    }
                }
            });
        }
        /*---------------------------
            Logo carousel
        ---------------------------*/
        var $logoCarousel = $('#logo-carousel');
        if ($logoCarousel.length > 0) {
            $logoCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    460: {
                        items: 2
                    },
                    599: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 5
                    },
                    1920: {
                        items: 5
                    }
                }
            });
        }
        /*---------------------------
            Team Member carousel
        ---------------------------*/
        var $teamCarousel = $('#team-carousel');
        if ($teamCarousel.length > 0) {
            $teamCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1920: {
                        items: 4
                    }
                }
            });
        }
        /*---------------------------
            Features carousel
        ---------------------------*/
        var $featuresCarousel = $('#features-carousel');
        if ($featuresCarousel.length > 0) {
            $featuresCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: false,
                stagePadding:100,
                center:true,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding:0
                    },
                    768: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 2
                    },
                    1024: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1920: {
                        items: 2
                    }
                }
            });
        }
        /*---------------------------
            testimonial carousel
        ---------------------------*/
        var $tesitmonialCarousel = $('#testimonial-carousel');
        if ($tesitmonialCarousel.length > 0) {
            $tesitmonialCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: true,
                navText: [$('#testimonial-nav-btn'), ''],
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    },
                    1920: {
                        items: 3
                    }
                }
            });
        }
       

    });
    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        //back to top show/hide
       var ScrollTop = $('.back-to-top');
       if ($(window).scrollTop() > 1000) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--------------------------
        sticky menu activation
       -------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 1000) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown 
                mainMenuTop.removeClass('nav-fixed');
                
            } else {
                // active sticky menu on scrollup 
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;
       
    });
           
    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(1000);
        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });

}(jQuery));	
