<?php

//Register front end woo
add_action('wp_enqueue_scripts', 'paint_register_front_end_woo');

function paint_register_front_end_woo() {

    if ( is_shop() || is_product_category() ) :

        wp_enqueue_script( 'woo-quick-view', get_theme_file_uri( '/extension/woocommerce/assets/js/woo-quick-view.js' ), array('jquery', 'wc-add-to-cart-variation'), '', true );

        $paint_woo_quick_view_admin_url    =   admin_url( 'admin-ajax.php' );
        $paint_woo_quick_view_ajax         =   array( 'url' => $paint_woo_quick_view_admin_url );
        wp_localize_script( 'woo-quick-view', 'woo_quick_view_product', $paint_woo_quick_view_ajax );

    endif;

}