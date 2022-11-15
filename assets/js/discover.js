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
                columnWidth: '.grid-discover__item',
                itemSelector: '.grid-discover__item'
            });

            // layout Masonry after each image loads
            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });
        }
    });

})( jQuery );