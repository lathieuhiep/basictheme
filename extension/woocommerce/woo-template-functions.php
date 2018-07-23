<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action( 'after_setup_theme', 'basictheme_shop_setup' );

function basictheme_shop_setup() {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* Start limit product */
add_filter('loop_shop_per_page', 'basictheme_show_products_per_page');

function basictheme_show_products_per_page() {
    global $basictheme_options;

    $basictheme_product_limit = $basictheme_options['basictheme_product_limit'];

    return $basictheme_product_limit;

}
/* End limit product */

/* Start Change number or products per row */
add_filter('loop_shop_columns', 'basictheme_loop_columns_product');

function basictheme_loop_columns_product() {
    global $basictheme_options;

    $basictheme_products_per_row = $basictheme_options['basictheme_products_per_row'];

    return $basictheme_products_per_row;
}
/* End Change number or products per row */

/* Start Sidebar Shop */
if ( ! function_exists( 'basictheme_woo_get_sidebar' ) ) :

    function basictheme_woo_get_sidebar() {

        if( is_active_sidebar( 'basictheme-sidebar-wc' ) ):
    ?>

            <aside class="col-md-3">
                <?php dynamic_sidebar( 'basictheme-sidebar-wc' ); ?>
            </aside>

    <?php
        endif;
    }

endif;
/* End Sidebar Shop */

/*
* Lay Out Shop
*/

if ( ! function_exists( 'basictheme_woo_before_main_content' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function basictheme_woo_before_main_content() {
        global $basictheme_options;
        $basictheme_sidebar_woo_position = $basictheme_options['basictheme_sidebar_woo'];

    ?>

        <div class="site-shop">
            <div class="container">
                <div class="row">

                <?php
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked basictheme_woo_sidebar - 10
                 */
        
                if ( $basictheme_sidebar_woo_position == 'left' ) :
                    do_action( 'basictheme_woo_sidebar' );
                endif;
                ?>

                    <div class="<?php echo is_active_sidebar( 'basictheme-sidebar-wc' ) && $basictheme_sidebar_woo_position != 'hide' ? 'col-md-9' : 'col-md-12'; ?>">

    <?php

    }

endif;

if ( ! function_exists( 'basictheme_woo_after_main_content' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function basictheme_woo_after_main_content() {
        global $basictheme_options;
        $basictheme_sidebar_woo_position = $basictheme_options['basictheme_sidebar_woo'];
    ?>

                    </div><!-- .col-md-9 -->

                    <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked basictheme_woo_sidebar - 10
                     */

                    if ( $basictheme_sidebar_woo_position == 'right' ) :
                        do_action( 'basictheme_woo_sidebar' );
                    endif;
                    ?>

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-shop -->

    <?php

    }

endif;

if ( ! function_exists( 'basictheme_woo_before_shop_loop_open' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked basictheme_woo_before_shop_loop_open - 5
     */
    function basictheme_woo_before_shop_loop_open() {

    ?>

        <div class="site-shop__result-count-ordering d-flex align-items-center justify-content-between">

    <?php
    }

endif;

if ( ! function_exists( 'basictheme_woo_before_shop_loop_close' ) ) :
    /**
     * Before Shop Loop
     * woocommerce_before_shop_loop hook.
     *
     * @hooked basictheme_woo_before_shop_loop_close - 35
     */
    function basictheme_woo_before_shop_loop_close() {

    ?>

        </div><!-- .site-shop__result-count-ordering -->

    <?php
    }

endif;

/*
* Single Shop
*/

if ( ! function_exists( 'basictheme_woo_before_single_product' ) ) :

    /**
     * Before Content Single  product
     *
     * woocommerce_before_single_product hook.
     *
     * @hooked basictheme_woo_before_single_product - 5
     */

    function basictheme_woo_before_single_product() {

    ?>

        <div class="site-shop-single">

    <?php

    }

endif;

if ( ! function_exists( 'basictheme_woo_after_single_product' ) ) :

    /**
     * After Content Single  product
     *
     * woocommerce_after_single_product hook.
     *
     * @hooked basictheme_woo_after_single_product - 30
     */

    function basictheme_woo_after_single_product() {

    ?>

        </div><!-- .site-shop-single -->

    <?php

    }

endif;

if ( !function_exists( 'basictheme_woo_before_single_product_summary_open_warp' ) ) :

    /**
     * Before single product summary
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked basictheme_woo_before_single_product_summary_open_warp - 1
     */

    function basictheme_woo_before_single_product_summary_open_warp() {

    ?>

        <div class="site-shop-single__warp">

    <?php

    }

endif;

if ( !function_exists( 'basictheme_woo_after_single_product_summary_close_warp' ) ) :

    /**
     * After single product summary
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked basictheme_woo_after_single_product_summary_close_warp - 5
     */

    function basictheme_woo_after_single_product_summary_close_warp() {

    ?>

        </div><!-- .site-shop-single__warp -->

    <?php

    }

endif;

if ( ! function_exists( 'basictheme_woo_before_single_product_summary_open' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked basictheme_woo_before_single_product_summary_open - 5
     */

    function basictheme_woo_before_single_product_summary_open() {

    ?>

        <div class="site-shop-single__gallery-box">

    <?php

    }

endif;

if ( ! function_exists( 'basictheme_woo_before_single_product_summary_close' ) ) :

    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked basictheme_woo_before_single_product_summary_close - 30
     */

    function basictheme_woo_before_single_product_summary_close() {

    ?>

        </div><!-- .site-shop-single__gallery-box -->

    <?php

    }

endif;