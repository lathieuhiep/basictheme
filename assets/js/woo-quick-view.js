/**
 * Quick view product
 */

(function ($) {
    "use strict";

    // quick view product
    let mode_quick_view_product = $('.mode-quick-view-product'),
        btn_quick_view_product = $('.btn-quick-view-product'),
        loading_body = $('.loading-body'),
        quick_view_product_body = $('.quick-view-product-body');

    btn_quick_view_product.on('click', function (e) {
        e.preventDefault();

        let product_id = $(this).data('id-product');

        $.ajax({
            url: woo_quick_view_product.url,
            type: 'POST',
            data: ({

                action: 'basictheme_get_quick_view_product',
                product_id: product_id

            }),

            success: function (data) {
                if (data) {
                    quick_view_product_body.empty().append(data);
                    loading_body.fadeOut();
                }
            },

            complete: function(){
                a(product_id);
            },
        });
    });

    let a = function (product_id) {
        let n = $("#et-quickview"),
            e = n.children("#product-" + product_id),
            t = e.find("form.cart");

        t.wc_variation_form().find(".variations select:eq(0)").change();
    }

    mode_quick_view_product.on('hidden.bs.modal', function () {

        loading_body.fadeIn();
        quick_view_product_body.empty();

    })

    // add product quick view
    quick_view_product_body.on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();

        let $form = $(this).closest('form.cart'),
            id = $(this).val(),
            product_qty = $form.find('input[name=quantity]').val() || 1,
            product_id = $form.find('input[name=product_id]').val() || id,
            variation_id = $form.find('input[name=variation_id]').val() || 0;

        console.log( {
            id: id,
            product_qty: product_qty,
            product_id: product_id,
            variation_id: variation_id
        } )
    })

})(jQuery);