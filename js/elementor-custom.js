(function ($) {

    /* Carousel slider */
    let ElementCarouselSlider = function ( $scope, $ ) {

        $scope.find( '.custom-owl-carousel' ).each( function () {

            let slider = $(this);

            if( elementorFrontend.isEditMode() || !slider.hasClass('owl-carousel-init') ){

                let defaults = {
                    autoplaySpeed: 800,
                    navSpeed: 800,
                    dotsSpeed: 800,
                    autoHeight: false,
                    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                };

                let config = $.extend({}, defaults, slider.data( 'settings-owl') );
                // Initialize Slider
                slider.owlCarousel( config ).addClass( 'owl-carousel-init' );
            }
        } );
    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/basictheme-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/basictheme-post-carousel.default', ElementCarouselSlider );

    } );

})( jQuery );