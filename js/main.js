/*
  Theme Name: Shopse - Multipurpose eCommerce HTML5 Template
  Author: ka_boldbaatar
  Author URI: https://themeforest.net/user/ka_boldbaatar
  Description: Shopse - Multipurpose eCommerce HTML5 Template
  Version: 1.0
*/


$(function() {

    "use strict";

    var wind = $(window);

    /* ---------------------------------------------- /*
     * Preloader
    /* ---------------------------------------------- */

    $(window).ready(function() {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut('slow');

    });
    
    // meanmenu
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "992"
    });


    // One Page Nav
    $.scrollIt({
        upKey: 38, // key code to navigate to the next section
        downKey: 40, // key code to navigate to the previous section
        easing: 'swing', // the easing function for animation
        scrollTime: 600, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -80 // offste (in px) for fixed top navigation
    });

    // navbar scrolling background

    wind.on("scroll", function() {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".main-menu-area"),
            navbloglogo = $(".blog-nav .logo> img"),
            logo = $(".main-menu-area .logo> img");

        if (bodyScroll > 100) {
            navbar.addClass("nav-scroll");
            logo.attr('src', 'img/logo/logo.png');
        }
         else {
            navbar.removeClass("nav-scroll");
            logo.attr('src', 'img/logo/logo-footer.png');
            navbloglogo.attr('src', 'img/logo.png');
        }
    });

    // mainSlider
    function mainSlider() {
        var BasicSlider = $('.slider-active');
        BasicSlider.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: true,
            fade: true,
            arrows: false,
            responsive: [{
                breakpoint: 767,
                settings: {
                    dots: false,
                    arrows: false
                }
            }]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function() {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function() {
                    $this.removeClass($animationType);
                });
            });
        }
    }
    mainSlider();

    // product-active
    $('.product-active').owlCarousel({
        loop: true,
        margin: 30,
        items: 4,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            },
            767: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    })

    // product-active
    $('.deals').owlCarousel({
        loop: true,
        margin: 30,
        items: 3,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 2
            },
            767: {
                items: 3
            },
            992: {
                items: 3
            }
        }
    })

    // brand-active
    $(".brand-active").owlCarousel({
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        nav: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 900,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        items: 6,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                nav: true,
            }
        }

    });

    // instagram-active
    $('.instagram-active').owlCarousel({
        navText: ['<i class="icon icon-left-arrow2"></i>', '<i class="icon icon-right-arrow2"></i>'],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 5
            },
            992: {
                items: 6
            }
        }
    })
    // fashion-active
    $('.fashion-active').owlCarousel({
        navText: ['<i class="icon icon-left-arrow2"></i>', '<i class="icon icon-right-arrow2"></i>'],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 4
            },
            992: {
                items: 5
            }
        }
    })
    // porfolio-active
    $('.porfolio-active').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 900,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        items: 4,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 2,
                nav: false,
            },
            1000: {
                nav: true,
            }
        }
    })
    // Testimonials owlCarousel
    $(".testimonial-slide").owlCarousel({

        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        nav: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed: 900,
        navText: ["<i class='icon icon-left-arrow2'></i>", "<i class='icon icon-right-arrow2'></i>"],
        items: 1,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            600: {
                items: 1,
                nav: false,
            },
            1000: {
                nav: true,
            }
        }

    });

    // testimonial-2-active
    $('.testimonial-2-active').owlCarousel({
        margin: 30,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    })

    // side-active
    $('.side-active').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            560: {
                items: 1
            },
            767: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });


    // isotop
    $('.grid').imagesLoaded(function() {
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item',
            }
        });
    });

    // filter items on button click
    $('.portfolio-menu').on('click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });

    //for menu active class
    $('.portfolio-menu button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

    // scrollToTop
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '300', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: '<i class="ti-arrow-up"></i>', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

    // Elements Animation Important
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }

    // tooltip
    $('[data-toggle="tooltip"]').tooltip()

    
    /* niceSelect */
    $('select').niceSelect();

   

    // map
    function basicmap() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,
            scrollwheel: false,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(40.6700, -73.9400), // New York
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "all",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "simplified"
                }, {
                    "hue": "#ff7700"
                }]
            }, {
                "featureType": "administrative",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#1d1d1d"
                }]
            }, {
                "featureType": "administrative.province",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "administrative.province",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ed5929"
                }, {
                    "weight": "5.00"
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#787878"
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "administrative.locality",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "visibility": "on"
                }, {
                    "weight": "5.00"
                }]
            }, {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#2d2d2d"
                }]
            }, {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "visibility": "on"
                }, {
                    "weight": "5.00"
                }]
            }, {
                "featureType": "administrative.land_parcel",
                "elementType": "geometry.fill",
                "stylers": [{
                    "saturation": "64"
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#fafafa"
                }]
            }, {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#2c2c2c"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#d5d5d5"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ff0000"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ed5929"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "weight": "5.00"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ed5929"
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ed5929"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels.text",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ed5929"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#d9d9d9"
                }, {
                    "visibility": "on"
                }]
            }, {
                "featureType": "transit.station",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit.station.airport",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "simplified"
                }, {
                    "lightness": "4"
                }, {
                    "saturation": "-100"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#e1e1e1"
                }, {
                    "visibility": "on"
                }]
            }]
        };
        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('contact-map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            title: 'Cryptox'
        });
    }
    if ($('#contact-map').length != 0) {
        google.maps.event.addDomListener(window, 'load', basicmap);
    }


    /*-------------------------
      showlogin toggle function
    --------------------------*/
    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });

    /*-------------------------
      showcoupon toggle function
    --------------------------*/
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });

    /*-------------------------
      Create an account toggle function
    --------------------------*/
    $('#cbox').on('click', function() {
        $('#cbox_info').slideToggle(900);
    });

    /*-------------------------
      Create an account toggle function
    --------------------------*/
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });

    

});