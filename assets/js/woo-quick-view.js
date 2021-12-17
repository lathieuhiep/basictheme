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

        return false;
    });

    let a = function (product_id) {
        let n = $("#et-quickview"),
            e = n.children("#product-" + product_id),
            t = e.find("form.cart"),
            hasProductVariable = e.hasClass("product-type-variable"),
            i = $("#et-quickview-slider"),
            quickViewOwl = e.find('.et-quickview-owl');

        quickViewOwl.owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            autoplaySpeed: 800,
            navSpeed: 800,
            dotsSpeed: 800,
        });

        if ( hasProductVariable ) {
            t.wc_variation_form().find(".variations select:eq(0)").change();

            if ( i.length ) {
                if ( i.hasClass("owl-carousel") ) {
                    i = $(".owl-item:not(.cloned)", i).eq(0);
                }

                a = $(".item-image", i).eq(0).find("img");
                e = a.attr("src");

                if ( a.attr("data-src") ) {
                    e = a.attr("data-src");
                }

                t.on("show_variation", function (e, t) {
                    const urlImage = t.image.url;

                    if ( t.hasOwnProperty("image") && urlImage ) {
                        const indexItem = $('.et-quickview-owl').find('.owl-item:not(.cloned) img[src="'+ urlImage +'"]').closest('.item-image').data('index');

                        if ( indexItem !== undefined ) {
                            quickViewOwl.trigger('to.owl.carousel', indexItem, [800]);
                        } else {
                            if ( urlImage !== a.attr("src") ) {
                                a.attr("src", urlImage).attr("srcset", "");
                                quickViewOwl.trigger('to.owl.carousel', 0, [800]);
                            }
                        }
                    }

                }).on("reset_image", function () {
                    a.attr("src", e).attr("srcset", "");
                    quickViewOwl.trigger('to.owl.carousel', 0, [800]);
                })
            }
        }
    }

    mode_quick_view_product.on('hidden.bs.modal', function () {

        loading_body.fadeIn();
        quick_view_product_body.empty();

    })

    // add product quick view
    quick_view_product_body.on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();

        let $thisButton = $(this),
            $form = $thisButton.closest('form.cart'),
            id = $thisButton.val(),
            product_qty = $form.find('input[name=quantity]').val() || 1,
            product_id = $form.find('input[name=product_id]').val() || id,
            variation_id = $form.find('input[name=variation_id]').val() || 0;

        const data = {
            action: 'basictheme_woo_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };

        $(document.body).trigger('adding_to_cart', [$thisButton, data]);

        $.ajax({
            url: woo_quick_view_product.url,
            type: 'POST',
            data: data,
            beforeSend: function (response) {
                $thisButton.removeClass('added').addClass('loading');
            },

            complete: function (response) {
                $thisButton.addClass('added').removeClass('loading');
            },

            success: function (response) {

                if (response.error && response.product_url) {
                    window.location = response.product_url;
                } else {
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisButton]);
                }

            },

        });

        return false;
    })

})(jQuery);