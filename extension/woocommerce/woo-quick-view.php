<?php

/*
* Start quick view product
*/
function basictheme_button_quick_view() {

?>

    <a class="btn-quick-view-product" href="#" title="<?php esc_attr_e( 'Quick view product', 'basictheme' ); ?>" data-id-product="<?php echo esc_attr( get_the_ID() ); ?>" data-toggle="modal" data-target="#mode-quick-view-product">
        <i class="fas fa-search"></i>
    </a>

<?php

}

function basictheme_popup_quick_view_product() {

?>

    <div class="modal fade mode-quick-view-product" id="mode-quick-view-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="loading-body"></div>
                    <div class="quick-view-product-body"></div>
                </div>
            </div>
        </div>
    </div>

<?php

}

/* Start ajax quick view product */
add_action( 'wp_ajax_nopriv_basictheme_get_quick_view_product', 'basictheme_get_quick_view_product' );
add_action( 'wp_ajax_basictheme_get_quick_view_product', 'basictheme_get_quick_view_product' );

function basictheme_get_quick_view_product() {

    $product_id   =   $_POST['product_id'];

    var_dump($product_id);

    wp_die();

}