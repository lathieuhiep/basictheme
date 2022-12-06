<?php
// A Custom function for get an option
if ( ! function_exists( 'basictheme_get_option' ) ) {
	function basictheme_get_option( $option = '', $default = null ) {
		$options = get_option( 'options' );

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {
// Set a unique slug-like ID
	$basictheme_prefix   = 'options';
	$basictheme_my_theme = wp_get_theme();

	// Create options
	CSF::createOptions( $basictheme_prefix, array(
		'menu_title'          => esc_html__( 'Theme Options', 'basictheme' ),
		'menu_slug'           => 'theme-options',
		'menu_position'       => 2,
		'admin_bar_menu_icon' => 'dashicons-admin-generic',
		'framework_title'     => $basictheme_my_theme->get( 'Name' ) . ' ' . esc_html__( 'Options', 'basictheme' ),
		'footer_text'         => esc_html__( 'Thank you for using my theme', 'basictheme' ),
		'footer_after'        => '<pre>Contact me:<br />Zalo/Phone: 0975458209 - Skype: lathieuhiep - facebook: <a href="https://www.facebook.com/lathieuhiep" target="_blank">lathieuhiep</a></pre>',
	) );

	// Create a section general
	CSF::createSection( $basictheme_prefix, array(
		'title'  => esc_html__( 'Cài đặt chung', 'basictheme' ),
		'icon'   => 'fas fa-cog',
		'fields' => array(
			// favicon
			array(
				'id'      => 'general_opt_favicon',
				'type'    => 'media',
				'title'   => esc_html__( 'Chọn ảnh favicon', 'basictheme' ),
				'library' => 'image',
				'url'     => false
			),

			// logo
			array(
				'id'      => 'general_opt_logo',
				'type'    => 'media',
				'title'   => esc_html__( 'Chọn ảnh logo', 'basictheme' ),
				'library' => 'image',
				'url'     => false
			),

			// show loading
			array(
				'id'         => 'general_opt_loading',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Sử dụng chờ tài trang', 'basictheme' ),
				'text_on'    => esc_html__( 'Có', 'basictheme' ),
				'text_off'   => esc_html__( 'Không', 'basictheme' ),
				'text_width' => 80,
				'default'    => false
			),

			array(
				'id'         => 'general_opt_image_loading',
				'type'       => 'media',
				'title'      => esc_html__( 'Chọn ảnh chờ tài trang', 'basictheme' ),
				'subtitle'   => esc_html__( 'Sử dụng file .git', 'basictheme' ) . ' <a href="https://loading.io/" target="_blank">loading.io</a>',
				'dependency' => array( 'general_opt_loading', '==', 'true' ),
				'url'        => false
			),

			// show back to top
			array(
				'id'         => 'general_opt_back_to_top',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Sử dụng nút về đầu trang', 'basictheme' ),
				'text_on'    => esc_html__( 'Có', 'basictheme' ),
				'text_off'   => esc_html__( 'Không', 'basictheme' ),
				'text_width' => 80,
				'default'    => true
			),

		)
	) );

	//
	// Create a section social network
	CSF::createSection( $basictheme_prefix, array(
		'title'  => esc_html__( 'Mạng xã hội', 'basictheme' ),
		'icon'   => 'fab fa-hive',
		'fields' => array(
			array(
				'id'      => 'basictheme_opt_social_network',
				'type'    => 'repeater',
				'title'   => esc_html__( 'Social Network', 'basictheme' ),
				'fields'  => array(
					array(
						'id'      => 'icon',
						'type'    => 'icon',
						'title'   => esc_html__( 'Chọn icon', 'basictheme' ),
						'default' => 'fab fa-facebook-f'
					),

					array(
						'id'      => 'link',
						'type'    => 'link',
						'title'   => 'Link',
						'default' => array(
							'url'    => '#',
							'text'   => 'facebook',
							'target' => '_blank'
						),
					),

				),
				'default' => array(
					array(
						'icon' => 'fab fa-facebook-f',
						'link' => '#',
					),

					array(
						'icon' => 'fab fa-youtube',
						'link' => '#',
					),
				)
			),
		)
	) );
}