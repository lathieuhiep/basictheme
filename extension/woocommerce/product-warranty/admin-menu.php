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
	echo '<h1>Đây là trang Plugin Options</h1>';
}

function show_general_setting_page()
{
	echo '<h1>Đây là trang Plugin Options - General Settings</h1>';
}
