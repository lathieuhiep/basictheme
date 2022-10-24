<?php
// A Custom function for get an option
if ( ! function_exists( 'paint_get_option' ) ) {
	function paint_get_option( $option = '', $default = null ) {
		$options = get_option( 'options' ); // Attention: Set your unique id of the framework

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {
	// Set a unique slug-like ID
	$paint_prefix   = 'options';
	$paint_my_theme = wp_get_theme();

	// Create options
	CSF::createOptions( $paint_prefix, array(
		'menu_title'      => esc_html__( 'Theme Options', 'paint' ),
		'menu_slug'       => 'theme-options',
		'menu_position'   => 2,
		'framework_title' => $paint_my_theme->get( 'Name' ) . ' ' . esc_html__( 'Options', 'paint' ),
		'footer_text'     => esc_html__( 'Thank you for using my theme', 'paint' ),
		'footer_after'    => '<pre>Contact me:<br />Zalo/Phone: 0975458209 - Skype: lathieuhiep - facebook: <a href="https://www.facebook.com/lathieuhiep" target="_blank">lathieuhiep</a></pre>',
	) );

	// Create a section general
	CSF::createSection( $paint_prefix, array(
		'title'  => esc_html__( 'Cài đặt chung', 'paint' ),
		'fields' => array(
			// favicon
			array(
				'id'      => 'general_opt_favicon',
				'type'    => 'media',
				'title'   => esc_html__( 'Chọn ảnh favicon', 'paint' ),
				'library' => 'image',
				'url' => false
			),

			// logo
			array(
				'id'      => 'general_opt_logo',
				'type'    => 'media',
				'title'   => esc_html__( 'Chọn ảnh logo', 'paint' ),
				'library' => 'image',
				'url' => false
			),

			// show loading
			array(
				'id'       => 'general_opt_loading',
				'type'     => 'switcher',
				'title'    => esc_html__( 'Sử dụng chờ tài trang', 'paint' ),
				'text_on'  => esc_html__( 'Có', 'paint' ),
				'text_off' => esc_html__( 'Không', 'paint' ),
				'text_width' => 80,
				'default'  => false
			),

			array(
				'id'    => 'general_opt_image_loading',
				'type'  => 'media',
				'title' => esc_html__( 'Chọn ảnh chờ tài trang', 'paint' ),
				'subtitle' => esc_html__( 'Sử dụng file .git', 'paint' ) . ' <a href="https://loading.io/" target="_blank">loading.io</a>',
				'dependency' => array( 'general_opt_loading', '==', 'true' ),
				'url' => false
			),

			// show back to top
			array(
				'id'       => 'general_opt_back_to_top',
				'type'     => 'switcher',
				'title'    => esc_html__( 'Sử dụng nút về đầu trang', 'paint' ),
				'text_on'  => esc_html__( 'Có', 'paint' ),
				'text_off' => esc_html__( 'Không', 'paint' ),
				'text_width' => 80,
				'default'  => true
			),

		)
	) );

	// Create a section menu
	CSF::createSection( $paint_prefix, array(
		'title'  => esc_html__( 'Menu', 'paint' ),
		'fields' => array(
			// Sticky menu
			array(
				'id'       => 'general_option_menu_sticky',
				'type'     => 'switcher',
				'title'    => esc_html__( 'Menu cố dịnh', 'paint' ),
				'text_on'  => esc_html__( 'Có', 'paint' ),
				'text_off' => esc_html__( 'Không', 'paint' ),
				'text_width' => 80,
				'default'  => true
			),
		)
	) );

	/*
	 * Create a section templates
	 * */
	CSF::createSection( $paint_prefix, array(
		'id' => 'parent_templates',
		'title'  => esc_html__( 'Templates', 'paint' ),
	) );

	// Template Home
	CSF::createSection( $paint_prefix, array(
		'parent' => 'parent_templates',
		'title'  => esc_html__( 'Trang chủ', 'paint' ),
		'description' => esc_html__('Cài đặt cho template home page', 'paint'),
		'fields' => array(
			// Banner 1
			array(
				'id'      => 'template_opt_home_banner',
				'type'    => 'media',
				'title'   => esc_html__( 'Banner 1', 'paint' ),
				'library' => 'image',
				'url' => false,
				'preview_size' => 'full'
			),

			// Banner 2
			array(
				'id'      => 'template_opt_home_banner_2',
				'type'    => 'media',
				'title'   => esc_html__( 'Banner 2', 'paint' ),
				'library' => 'image',
				'url' => false,
				'preview_size' => 'full'
			),
		)
	) );
	// End section templates

	// Create a section menu
	CSF::createSection( $paint_prefix, array(
		'title'  => esc_html__( 'Châm ngôn của chúng tôi', 'paint' ),
		'fields' => array(
			// Heading
			array(
				'id'     => 'our_maxim_opt_heading',
				'type'   => 'fieldset',
				'title'  => 'Fieldset',
				'fields' => array(
					array(
						'id'    => 'title',
						'type'    => 'text',
						'title'   => esc_html__('Tiêu đề', 'paint'),
						'default' => esc_html__('CHÂM NGÔN CỦA CHÚNG TÔI', 'paint')
					),

					array(
						'id'          => 'align',
						'type'        => 'select',
						'title'       => esc_html__('Căn chỉnh', 'paint'),
						'options'     => array(
							'start' => esc_html__('Căn lề trái', 'paint'),
							'center' => esc_html__('Căn giữa', 'paint'),
							'end' => esc_html__('Căn phải', 'paint'),
						),
						'default'     => 'left'
					),

				),
			),


			// content
			array(
				'id'    => 'our_maxim_opt_describe',
				'type'  => 'wp_editor',
				'title' => esc_html__('Mô tả'),
			),

			// group
			array(
				'id'        => 'our_maxim_opt_group',
				'type'      => 'group',
				'title'     => esc_html__('Danh sách', 'paint'),
				'fields'    => array(
					array(
						'id'      => 'title',
						'type'    => 'text',
						'title'   => esc_html__('Tiêu đề', 'paint'),
					),

					array(
						'id'      => 'image',
						'type'    => 'media',
						'title'   => esc_html__( 'Ảnh icon', 'paint' ),
						'library' => 'image',
						'url' => false,
					),

					array(
						'id'    => 'content',
						'type'  => 'textarea',
						'title' => esc_html__('Nội dung', 'paint'),
					),
				),
			),

		)
	) );

	// Create a section social network
	CSF::createSection( $paint_prefix, array(
		'title'  => esc_html__( 'Mạng xã hội', 'paint' ),
		'fields' => array(
			array(
				'id'        => 'paint_opt_social_network',
				'type'      => 'repeater',
				'title'     => esc_html__('Social Network', 'paint'),
				'fields'    => array(
					array(
						'id'      => 'icon',
						'type'    => 'icon',
						'title'   => esc_html__('Chọn icon', 'paint'),
						'default' => 'fab fa-facebook-f'
					),

					array(
						'id'       => 'link',
						'type'     => 'link',
						'title'    => 'Link',
						'default'  => array(
							'url'    => '#',
							'text'   => 'facebook',
							'target' => '_blank'
						),
					),

				),
				'default'   => array(
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

	/*
	 * Create a section footer
	 * */
	CSF::createSection( $paint_prefix, array(
		'id' => 'parent_footer',
		'title'  => esc_html__( 'Chân trang', 'paint' ),
	) );

	// Create section footer columns
	CSF::createSection( $paint_prefix, array(
		'parent' => 'parent_footer',
		'title'  => esc_html__( 'Thiết lâp cột', 'paint' ),
		'fields' => array(
			// select columns
			array(
				'id'          => 'paint_opt_footer_columns',
				'type'        => 'select',
				'title'       => esc_html__('Số cột hiển thị', 'paint'),
				'options'     => array(
					'0' => esc_html__( 'Không sử dụng', 'paint' ),
					'1' => esc_html__( '1 cột', 'paint' ),
					'2' => esc_html__( '2 cột', 'paint' ),
					'3' => esc_html__( '3 cột', 'paint' ),
					'4' => esc_html__( '4 cột', 'paint' ),
				),
				'default' => '4'
			),

			// column width 1
			array(
				'id'      => 'paint_opt_footer_column_width_1',
				'type'    => 'slider',
				'title'   => esc_html__('Độ rộng cột 1', 'paint'),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'dependency' => array( 'paint_opt_footer_columns', '!=', '0' )
			),

			// column width 2
			array(
				'id'      => 'paint_opt_footer_column_width_2',
				'type'    => 'slider',
				'title'   => esc_html__('Độ rộng cột 2', 'paint'),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'dependency' => array( 'paint_opt_footer_columns', 'not-any', '0,1' )
			),

			// column width 3
			array(
				'id'      => 'paint_opt_footer_column_width_3',
				'type'    => 'slider',
				'title'   => esc_html__('Độ rộng cột 3', 'paint'),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'dependency' => array( 'paint_opt_footer_columns', 'not-any', '0,1,2' )
			),

			// column width 4
			array(
				'id'      => 'paint_opt_footer_column_width_4',
				'type'    => 'slider',
				'title'   => esc_html__('Độ rộng cột 4', 'paint'),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'dependency' => array( 'paint_opt_footer_columns', 'not-any', '0,1,2,3' )
			),
		)
	) );

	/* End create a section footer */

}

