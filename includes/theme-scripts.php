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
	/*
	* Load css
	* */

	/* load font google */
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap', array(), null );

	/* library css */
	wp_enqueue_style( 'basictheme-library', get_theme_file_uri( '/assets/css/library.min.css' ), array(), '' );

	/* fontawesome */
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/fonts/fontawesome/css/fontawesome-brands-solid.min.css' ), array(), '6.2.1' );

	/* style */
	wp_enqueue_style( 'basictheme-style', get_stylesheet_uri(), array(), basictheme_get_version_theme() );

	/*
	* Load js
	* */

	/* library js */
	wp_enqueue_script( 'basictheme-library', get_theme_file_uri( '/assets/js/library.min.js' ), array('jquery'), '', true );

	/* comment reply */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// custom js
	wp_enqueue_script( 'basictheme-custom', get_theme_file_uri( '/assets/js/custom.min.js' ), array('jquery'), basictheme_get_version_theme(), true );
}