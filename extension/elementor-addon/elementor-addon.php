<?php
// Register Category Elementor Addon
add_action( 'elementor/elements/categories_registered', 'basictheme_add_elementor_widget_categories' );
function basictheme_add_elementor_widget_categories( $elements_manager ): void {
	$elements_manager->add_category(
		'my-theme',
		[
			'title' => esc_html__( 'My Theme', 'basictheme' ),
			'icon'  => 'icon-goes-here',
		]
	);
}

// Register Widgets Elementor Addon
add_action( 'elementor/widgets/register', 'basictheme_register_widget_elementor_addon' );
function basictheme_register_widget_elementor_addon( $widgets_manager ): void {
	// include add on
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/slides.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/about-text.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-carousel.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-grid.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/testimonial-slider.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/carousel-images.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/contact-form-7.php' );
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/info-box.php' );

	// register add on
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Slides() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_About_Text() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Post_Carousel() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Post_Grid() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Testimonial_Slider() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Carousel_Images() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Contact_Form_7() );
	$widgets_manager->register( new \BasicTheme_Elementor_Addon_Info_Box() );
}

// Register Script Elementor Addon
add_action( 'elementor/frontend/after_enqueue_styles', 'basictheme_register_script_elementor_addon' );
function basictheme_register_script_elementor_addon(): void {
	wp_register_script( 'basictheme-elementor-addon', get_theme_file_uri( '/extension/elementor-addon/js/elementor-addon.js' ), array( 'jquery' ), '1.0.0', true );
}