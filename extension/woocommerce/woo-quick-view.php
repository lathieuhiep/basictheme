<?php

/*
* Start quick view product
*/
function basictheme_button_quick_view() {

?>

    <a class="btn-quick-view-product" href="#" title="<?php esc_attr_e( 'Quick view product', 'basictheme' ); ?>" data-id-product="<?php echo esc_attr( get_the_ID() ); ?>">
        <i class="fas fa-search"></i>
    </a>

<?php

}

/* Start ajax quick view product */
add_action( 'wp_ajax_nopriv_basictheme_get_quick_view_product', 'basictheme_get_quick_view_product' );
add_action( 'wp_ajax_basictheme_get_quick_view_product', 'basictheme_get_quick_view_product' );

function basictheme_get_quick_view_product() {

    $product_id   =   $_POST['product_id'];

}