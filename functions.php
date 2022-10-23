<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Required: Theme action filter
require get_parent_theme_file_path( '/includes/theme-action-filter.php' );

// Required: Theme Function
require get_parent_theme_file_path( '/includes/theme-function.php' );

// Required: Plugin Activation
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

// Required: options theme
require get_theme_file_path( 'extension/theme-option/options.php' );

// Required: Post type
require get_parent_theme_file_path( '/extension/post-type/faq.php' );

// Required: Kirki customizer
if ( class_exists('Kirki') ) {
    require get_theme_file_path( 'extension/theme-option/customizer.php' );
}

// Required: CMB2
if ( !class_exists('CMB2') ) {
    require get_parent_theme_file_path( '/extension/meta-box/cmb_post.php' );
}

// Required: Elementor
if ( did_action( 'elementor/loaded' ) ) :
    require get_parent_theme_file_path( '/extension/elementor-addon/elementor-addon.php' );
endif;

// Require Widgets
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $paint_file_widgets ) {
	require $paint_file_widgets;
}

// Require Register Sidebar
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

// Require Theme Scripts
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

