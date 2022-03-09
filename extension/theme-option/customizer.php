<?php
/*
 * Customize
 * */

use Kirki\Field\Dimensions;
use Kirki\Field\Editor;
use Kirki\Field\Image;
use Kirki\Field\Radio_Buttonset;
use Kirki\Field\Repeater;
use Kirki\Field\Select;
use Kirki\Field\Slider;
use Kirki\Field\Text;
use Kirki\Field\Typography;
use Kirki\Field\URL;
use Kirki\Panel;
use Kirki\Section;

// Panel Theme Options
new Panel(
	'basictheme_opt_panel',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Theme Options', 'basictheme' ),
	]
);

/*
 * Section General
 * */
new Section(
	'basictheme_opt_section_general',
	[
		'title'    => esc_html__( 'General', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Favicon
new Image(
	[
		'settings' => 'basictheme_opt_favicon',
		'label'    => esc_html__( 'Upload Image Favicon', 'basictheme' ),
		'section'  => 'basictheme_opt_section_general',
		'default'  => '',
	]
);

// Field Upload Logo
new Image(
	[
		'settings' => 'basictheme_opt_image_logo',
		'label'    => esc_html__( 'Upload Image Logo', 'basictheme' ),
		'section'  => 'basictheme_opt_section_general',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Set Width Height Logo
new Dimensions(
	[
		'settings'        => 'basictheme_opt_size_logo',
		'label'           => esc_html__( 'Set width / height Logo', 'basictheme' ),
		'description'     => esc_html__( 'width: 100px, height: 100px', 'basictheme' ),
		'section'         => 'basictheme_opt_section_general',
		'default'         => [
			'width'  => '',
			'height' => '',
		],
		'output'          => array(
			array(
				'element' => '.site-logo img'
			),
		),
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_image_logo',
				'operator' => '!=',
				'value'    => '',
			]
		],
	]
);

// Field show loading
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_show_loading',
		'label'    => esc_html__( 'Show Loading', 'basictheme' ),
		'section'  => 'basictheme_opt_section_general',
		'default'  => 'off',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'basictheme' ),
			'off' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

// Field upload image loading
new Image(
	[
		'settings'        => 'basictheme_opt_image_loading',
		'label'           => esc_html__( 'Upload Image Loading', 'basictheme' ),
		'section'         => 'basictheme_opt_section_general',
		'description'     => esc_html__( 'Upload image .gif', 'basictheme' ),
		'default'         => '',
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_show_loading',
				'operator' => '===',
				'value'    => 'on',
			]
		]
	]
);

// Field show back to top
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_back_to_top',
		'label'    => esc_html__( 'Show Back To Top', 'basictheme' ),
		'section'  => 'basictheme_opt_section_general',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'basictheme' ),
			'off' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

/*
 * Section Menu
 * */
new Section(
	'basictheme_opt_section_menu',
	[
		'title'    => esc_html__( 'Menu', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Show Sticky Menu
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_sticky_menu',
		'label'    => esc_html__( 'Sticky menu', 'basictheme' ),
		'section'  => 'basictheme_opt_section_menu',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Yes', 'basictheme' ),
			'off' => esc_html__( 'No', 'basictheme' ),
		],
	]
);

// Field Show Cart
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_cart_menu',
		'label'    => esc_html__( 'Cart', 'basictheme' ),
		'section'  => 'basictheme_opt_section_menu',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'basictheme' ),
			'hide' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

/*
 * Section Contact Us
 * */
new Section(
	'basictheme_opt_section_contact_us',
	[
		'title'    => esc_html__( 'Contact us', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Show Contact Us
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_show_contact_us',
		'label'    => esc_html__( 'Show Contact Us', 'basictheme' ),
		'section'  => 'basictheme_opt_section_contact_us',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'basictheme' ),
			'hide' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

// Field Address Contact
new Text(
	[
		'settings' => 'basictheme_opt_address_contact_us',
		'label'    => esc_html__( 'Address', 'basictheme' ),
		'section'  => 'basictheme_opt_section_contact_us',
		'default'  => esc_html__( '988782, Our Street, S State', 'basictheme' ),
		'priority' => 10,
	]
);

// Field Mail Contact
new Text(
	[
		'settings' => 'basictheme_opt_mail_contact_us',
		'label'    => esc_html__( 'Mail', 'basictheme' ),
		'section'  => 'basictheme_opt_section_contact_us',
		'default'  => 'info@domain.com',
	]
);

// Field Phone Contact
new Text(
	[
		'settings' => 'basictheme_opt_phone_contact_us',
		'label'    => esc_html__( 'Phone', 'basictheme' ),
		'section'  => 'basictheme_opt_section_contact_us',
		'default'  => '+1 234 567 186',
	]
);

/*
 * Section Blog Post
 * */
new Section(
	'basictheme_opt_section_blog_post',
	[
		'title'       => esc_html__( 'Blog Post', 'basictheme' ),
		'panel'       => 'basictheme_opt_panel',
		'description' => esc_html__( 'Use for archive, index, page search', 'basictheme' ),
		'priority'    => 10,
	]
);

// Field Sidebar Blog Post
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_sidebar_blog_post',
		'label'    => esc_html__( 'Blog Sidebar', 'basictheme' ),
		'section'  => 'basictheme_opt_section_blog_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'basictheme' ),
			'left'  => esc_html__( 'Left', 'basictheme' ),
			'right' => esc_html__( 'Right', 'basictheme' ),
		],
	]
);

// Field Blog Per Row
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_per_row_blog_post',
		'label'    => esc_html__( 'Blog Per Row', 'basictheme' ),
		'section'  => 'basictheme_opt_section_blog_post',
		'default'  => '2',
		'choices'  => [
			'2' => esc_html__( '2 Column', 'basictheme' ),
			'3' => esc_html__( '3 Column', 'basictheme' ),
			'4' => esc_html__( '4 Column', 'basictheme' ),
		],
	]
);

/*
 * Section Single Post
 * */
new Section(
	'basictheme_opt_section_single_post',
	[
		'title'    => esc_html__( 'Single Post', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Single Post
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_sidebar_single_post',
		'label'    => esc_html__( 'Single Sidebar', 'basictheme' ),
		'section'  => 'basictheme_opt_section_single_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'basictheme' ),
			'left'  => esc_html__( 'Left', 'basictheme' ),
			'right' => esc_html__( 'Right', 'basictheme' ),
		],
	]
);

// Field Show Share Post
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_share_single_post',
		'label'    => esc_html__( 'Show Share Post', 'basictheme' ),
		'section'  => 'basictheme_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'basictheme' ),
			'hide' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

// Field Show Related Post
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_related_single_post',
		'label'    => esc_html__( 'Show Related Post', 'basictheme' ),
		'section'  => 'basictheme_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'basictheme' ),
			'hide' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

// Field Show Related Post Limit
new Slider(
	[
		'settings' => 'basictheme_opt_related_limit_single_post',
		'label'    => esc_html__( 'Related Post Limit', 'basictheme' ),
		'section'  => 'basictheme_opt_section_single_post',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		],
	]
);

/*
 * Section Social Network
 * */
new Section(
	'basictheme_opt_section_social_network',
	[
		'title'    => esc_html__( 'Social Network', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Social List
new Repeater(
	[
		'settings'  => 'basictheme_opt_social_list',
		'label'     => esc_html__( 'Create Social Links', 'basictheme' ),
		'section'   => 'basictheme_opt_section_social_network',
		'tooltip'   => esc_html__( 'Use Font Awesome Free', 'basictheme' ),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social link', 'basictheme' ),
			'field' => 'title',
		),
		'default'   => [
			[
				'title'  => esc_html__( 'Facebook', 'basictheme' ),
				'icon'   => 'fab fa-facebook-f',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Youtube', 'basictheme' ),
				'icon'   => 'fab fa-youtube',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Twitter', 'basictheme' ),
				'icon'   => 'fab fa-twitter',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Instagram', 'basictheme' ),
				'icon'   => 'fab fa-instagram',
				'url'    => '#',
				'target' => '_blank',
			],
		],
		'fields'    => [
			'title'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'basictheme' ),
				'description' => esc_html__( 'Ex: Facebook', 'basictheme' ),
				'default'     => '',
			],
			'icon'   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'basictheme' ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fab fa-facebook-f', 'basictheme' ) . ' <a href="https://fontawesome.com/search" target="_blank"><strong>' . esc_html__( 'View All', 'basictheme' ) . ' </strong></a>',
				'default'     => '',
			),
			'url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', 'basictheme' ),
				'default' => '#',
			],
			'target' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Link Target', 'basictheme' ),
				'default' => '_blank',
				'choices' => [
					'_blank' => esc_html__( 'New Window', 'basictheme' ),
					'_self'  => esc_html__( 'Same Frame', 'basictheme' ),
				],
			],
		],
	]
);

/*
 * Section Shop
 * */
new Section(
	'basictheme_opt_section_shop',
	[
		'title'       => esc_html__( 'Shop', 'basictheme' ),
		'description' => esc_html__( 'Settings WooCommerce', 'basictheme' ),
		'panel'       => 'basictheme_opt_panel',
		'priority'    => 10,
	]
);

// Field Limit Product
new Slider(
	[
		'settings' => 'basictheme_opt_limit_product',
		'label'    => esc_html__( 'Limit Product', 'basictheme' ),
		'section'  => 'basictheme_opt_section_shop',
		'default'  => 12,
		'choices'  => [
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		],
	]
);

// Field Products Per Row
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_per_row_product',
		'label'    => esc_html__( 'Products Per Row', 'basictheme' ),
		'section'  => 'basictheme_opt_section_shop',
		'default'  => '4',
		'choices'  => [
			'3' => esc_html__( '3 Column', 'basictheme' ),
			'4' => esc_html__( '4 Column', 'basictheme' ),
			'5' => esc_html__( '5 Column', 'basictheme' ),
		],
	]
);

// Field Sidebar Shop
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_sidebar_shop',
		'label'    => esc_html__( 'Shop Sidebar', 'basictheme' ),
		'section'  => 'basictheme_opt_section_shop',
		'default'  => 'left',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'basictheme' ),
			'left'  => esc_html__( 'Left', 'basictheme' ),
			'right' => esc_html__( 'Right', 'basictheme' ),
		],
	]
);

/*
 * Section Footer
 * */
new Section(
	'basictheme_opt_section_footer',
	[
		'title'    => esc_html__( 'Footer', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Footer
new Select(
	[
		'settings'    => 'basictheme_opt_column_footer',
		'label'       => esc_html__( 'Number of Footer Columns', 'basictheme' ),
		'section'     => 'basictheme_opt_section_footer',
		'default'     => 'column-4',
		'placeholder' => esc_html__( 'Choose an option', 'basictheme' ),
		'choices'     => [
			'column-0' => esc_html__( 'Hide Column', 'basictheme' ),
			'column-1' => esc_html__( '1', 'basictheme' ),
			'column-2' => esc_html__( '2', 'basictheme' ),
			'column-3' => esc_html__( '3', 'basictheme' ),
			'column-4' => esc_html__( '4', 'basictheme' ),
		],
	]
);

// Field Footer Width Column 1
new Slider(
	[
		'settings'        => 'basictheme_opt_column_width_footer_1',
		'label'           => esc_html__( 'Column width 1', 'basictheme' ),
		'section'         => 'basictheme_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			]
		]
	]
);

// Field Footer Width Column 2
new Slider(
	[
		'settings'        => 'basictheme_opt_column_width_footer_2',
		'label'           => esc_html__( 'Column width 2', 'basictheme' ),
		'section'         => 'basictheme_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			]
		]
	]
);

// Field Footer Width Column 3
new Slider(
	[
		'settings'        => 'basictheme_opt_column_width_footer_3',
		'label'           => esc_html__( 'Column width 3', 'basictheme' ),
		'section'         => 'basictheme_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			]
		]
	]
);

// Field Footer Width Column 4
new Slider(
	[
		'settings'        => 'basictheme_opt_column_width_footer_4',
		'label'           => esc_html__( 'Column width 4', 'basictheme' ),
		'section'         => 'basictheme_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			],
			[
				'setting'  => 'basictheme_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-3',
			]
		]
	]
);

/*
 * Section Copyright
 * */
new Section(
	'basictheme_opt_section_copyright',
	[
		'title'    => esc_html__( 'Copyright', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Show copyright
new Radio_Buttonset(
	[
		'settings' => 'basictheme_opt_show_copyright',
		'label'    => esc_html__( 'Show Copyright', 'basictheme' ),
		'section'  => 'basictheme_opt_section_copyright',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'basictheme' ),
			'hide' => esc_html__( 'Hide', 'basictheme' ),
		],
	]
);

// Field Content Copyright
new Editor(
	[
		'settings' => 'basictheme_opt_content_copyright',
		'label'    => esc_html__( 'Content', 'basictheme' ),
		'section'  => 'basictheme_opt_section_copyright',
		'default'  => esc_html__( 'Copyright &amp; DiepLK', 'basictheme' ),
	]
);

/*
 * Section Typography
 * */
new Section(
	'basictheme_opt_section_typography',
	[
		'title'    => esc_html__( 'Typography', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Typography
new Typography(
	[
		'settings'  => 'basictheme_opt_typography',
		'label'     => esc_html__( 'Body', 'basictheme' ),
		'section'   => 'basictheme_opt_section_typography',
		'transport' => 'auto',
		'default'   => [
			'font-family'    => '',
			'variant'        => '',
			'font-style'     => '',
			'color'          => '',
			'font-size'      => '',
			'line-height'    => '',
			'letter-spacing' => '',
		],
		'output'    => [
			[
				'element' => 'body',
			],
		],
	]
);

/*
 * Section 404
 * */
new Section(
	'basictheme_opt_section_404',
	[
		'title'    => esc_html__( '404 Options', 'basictheme' ),
		'panel'    => 'basictheme_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Image 404
new Image(
	[
		'settings' => 'basictheme_opt_image_404',
		'label'    => esc_html__( 'Upload Image', 'basictheme' ),
		'section'  => 'basictheme_opt_section_404',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Title 404
new Text(
	[
		'settings' => 'basictheme_opt_title_404',
		'label'    => esc_html__( 'Title', 'basictheme' ),
		'section'  => 'basictheme_opt_section_404',
		'default'  => esc_html__( 'Awww...Do Not Cry', 'basictheme' ),
	]
);

// Field Content 404
new Editor(
	[
		'settings' => 'basictheme_opt_content_404',
		'label'    => esc_html__( 'Content', 'basictheme' ),
		'section'  => 'basictheme_opt_section_404',
		'default'  => esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'basictheme' ),
	]
);