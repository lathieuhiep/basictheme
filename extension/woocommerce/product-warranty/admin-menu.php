<?php
// Register menu
add_action('admin_menu', 'basictheme_menu_page_product_warranty');

function basictheme_menu_page_product_warranty() {

	// Register the parent menu
	add_menu_page(
		esc_html__( 'Product Warranty', 'basictheme' ), // page <title>Title</title>
		esc_html__( 'Product Warranty', 'basictheme' ), // menu link text
		'manage_options', // capability to access the page
		'product-warranty', // page URL slug
		'basictheme_show_product_warranty_content', // callback function /w content
		'dashicons-pressthis', // menu icon
		56 // priority
	);

	// Register the hidden submenu
	add_submenu_page(
		'product-warranty',
		esc_html__('Add New', 'basictheme'),
		'Add New',
		'manage_options',
		'product-warranty-new',
		'show_general_setting_page'
	);

}

// callback parent menu
function basictheme_show_product_warranty_content() {
?>

    <div id="product-warranty-list" class="wrap">
        <h1 class="wp-heading-inline">
            <?php esc_html_e('Product warranty', 'basictheme'); ?>
        </h1>

        <?php if ( current_user_can( 'manage_options' ) ) : ?>
            <a class="page-title-action" href="<?php echo esc_url( menu_page_url( 'product-warranty-new', false ) ); ?>">
                <?php esc_html_e('Add New', 'basictheme'); ?>
            </a>
        <?php endif;?>

        <hr class="wp-header-end">

    </div>

<?php
}

// callback sub menu
function show_general_setting_page()
{
?>

    <div class="warp">
        <h1 class="wp-heading-inline">
		    <?php esc_html_e('Add New Product warranty', 'basictheme'); ?>
        </h1>

        <hr class="wp-header-end">

        <form id="post" method="post" action="">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div id="titlediv">
                            <div id="titlewrap">
                                <label class="screen-reader-text" id="title-prompt-text" for="title">
                                    <?php esc_html_e('Tên khách hàng'); ?>
                                </label>

                                <input type="text" name="post_title" size="30" value="" id="title" spellcheck="true" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
}

