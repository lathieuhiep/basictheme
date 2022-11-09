/**
 * Product detail
 */
(function ($) {
    "use strict";

    $( document ).ready( function () {
        $('.tabs-warp .nav-link').on('shown.bs.tab', function (event) {
            const eventTarget = $(event.target);
            const hasIdGallery = eventTarget.attr('id');

            if ( hasIdGallery === 'gallery-tab' ) {
                const hasCallMasonry = eventTarget.hasClass('success-masonry');

                if ( !hasCallMasonry ) {
                    // Masonry
                    const productGallery = $('.product-gallery-grid');

                    if ( productGallery.length ) {
                        // int masonry
                        const $grid = productGallery.masonry({
                            percentPosition: true,
                            columnWidth: '.grid-sizer-normal',
                            itemSelector: '.item'
                        });

                        // layout Masonry after each image loads
                        $grid.imagesLoaded().progress( function() {
                            $grid.masonry('layout');
                        });
                    }

                    eventTarget.addClass('success-masonry');
                }
            }
        })

    });

    const galleryProduct = () => {

    }

})( jQuery );