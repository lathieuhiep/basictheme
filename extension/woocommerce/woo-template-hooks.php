<?php

/**
 * Shop WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see basictheme_woo_before_main_content()
 * @see basictheme_woo_before_shop_loop_open()
 * @see basictheme_woo_before_shop_loop_close()
 * @see basictheme_woo_after_main_content()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'basictheme_woo_before_main_content', 10 );

add_action( 'woocommerce_before_shop_loop', 'basictheme_woo_before_shop_loop_open',  5 );
add_action( 'woocommerce_before_shop_loop', 'basictheme_woo_before_shop_loop_close',  35 );

add_action( 'basictheme_woo_sidebar', 'basictheme_woo_get_sidebar', 10 );

add_action( 'woocommerce_after_main_content', 'basictheme_woo_after_main_content', 10 );


/**
 * Single Product
 *
 * @see basictheme_woo_before_single_product()
 * @see basictheme_woo_before_single_product_summary_open_warp()
 * @see basictheme_woo_before_single_product_summary_open()
 * @see basictheme_woo_before_single_product_summary_close()
 * @see basictheme_woo_after_single_product_summary_close_warp()
 * @see basictheme_woo_after_single_product()
 *
 */

add_action( 'woocommerce_before_single_product', 'basictheme_woo_before_single_product', 5 );

add_action( 'woocommerce_before_single_product_summary', 'basictheme_woo_before_single_product_summary_open_warp',  1 );

add_action( 'woocommerce_before_single_product_summary', 'basictheme_woo_before_single_product_summary_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'basictheme_woo_before_single_product_summary_close', 30 );

add_action( 'woocommerce_after_single_product_summary', 'basictheme_woo_after_single_product_summary_close_warp', 5 );

add_action( 'woocommerce_after_single_product', 'basictheme_woo_after_single_product', 30 );

