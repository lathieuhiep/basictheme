<?php
// Register Back-End script
add_action('admin_enqueue_scripts', 'basictheme_register_back_end_scripts');
function basictheme_register_back_end_scripts(){
	/* Start Get CSS Admin */
	wp_enqueue_style( 'basictheme-admin-styles', get_theme_file_uri( '/admin/assets/css/admin-styles.css' ) );
}

// Remove jquery migrate
add_action( 'wp_default_scripts', 'basictheme_remove_jquery_migrate' );
function basictheme_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

// Register Front-End Styles
add_action('wp_enqueue_scripts', 'basictheme_register_front_end');
function basictheme_register_front_end() {
	// remove style gutenberg
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style( 'classic-theme-styles' );

	wp_dequeue_style('wc-blocks-style'); // disable woocommerce frontend block styles
	wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles

	/** Load css **/

	// font google
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap', array(), null );

	// bootstrap css
//	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/libs/bootstrap/bootstrap.min.css' ), array(), '5.2.3' );

	// fontawesome
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/libs/fontawesome/css/fontawesome-brands-solid.min.css' ), array(), '6.2.1' );

	// style theme
	wp_enqueue_style( 'basictheme-style', get_stylesheet_uri(), array(), basictheme_get_version_theme() );

	/** Load js **/

	// bootstrap js
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/libs/bootstrap/bootstrap.bundle.min.js' ), array('jquery'), '5.2.3', true );

	// comment reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// custom js
	wp_enqueue_script( 'basictheme-custom', get_theme_file_uri( '/assets/js/custom.min.js' ), array('jquery'), basictheme_get_version_theme(), true );
}