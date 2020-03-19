/**
 * Quick view product
 */

( function( $ ) {

    "use strict";

    let btn_quick_view_product  =   $( '.btn-quick-view-product' ),
        mode_quick_view_product =   $( '#mode-quick-view-product' );

    btn_quick_view_product.on( 'click', function (e) {

        e.preventDefault();

        let product_id              =   $(this).data( 'id-product' ),
            quick_view_product_body =   $( '.quick-view-product-body' );

        $.ajax({

            url: woo_quick_view_product.url,
            type: 'POST',
            data: ({

                action: 'basictheme_get_quick_view_product',
                product_id: product_id

            }),

            beforeSend: function () {



            },

            success: function( data ){

                if ( data ){

                    quick_view_product_body.empty().append(data);

                }

                setTimeout( function() {



                }, 800 );

            }

        });


    } );

} )( jQuery );