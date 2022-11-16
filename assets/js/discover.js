/**
 * Product detail
 */
(function ($) {
    "use strict";

    $( document ).ready( function () {
        // Masonry
        const discoverGallery = $('.grid-discover');

        if ( discoverGallery.length ) {
            // int masonry
            const $grid = discoverGallery.masonry({
                percentPosition: true,
                horizontalOrder: true,
                columnWidth: '.grid-discover__item',
                itemSelector: '.grid-discover__item'
            });

            // layout Masonry after each image loads
            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });
        }

        // handle history back
        $('.history-back-discover').on('click', function (event) {
            event.preventDefault();
            history.back(1);
        })
    });

    $(window).scroll(function(){
        if ( $(window).scrollTop() + $(window).height()  >= $(document).height() ){
           console.log($(document).height())
        }
    });

})( jQuery );