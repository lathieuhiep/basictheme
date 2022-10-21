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
	'paint_opt_panel',
	[
		'priority' => 10,
		'title'    => esc_html__( 'Theme Options', 'paint' ),
	]
);

/*
 * Section General
 * */
new Section(
	'paint_opt_section_general',
	[
		'title'    => esc_html__( 'General', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Favicon
new Image(
	[
		'settings' => 'paint_opt_favicon',
		'label'    => esc_html__( 'Upload Image Favicon', 'paint' ),
		'section'  => 'paint_opt_section_general',
		'default'  => '',
	]
);

// Field Upload Logo
new Image(
	[
		'settings' => 'paint_opt_image_logo',
		'label'    => esc_html__( 'Upload Image Logo', 'paint' ),
		'section'  => 'paint_opt_section_general',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Set Width Height Logo
new Dimensions(
	[
		'settings'        => 'paint_opt_size_logo',
		'label'           => esc_html__( 'Set width / height Logo', 'paint' ),
		'description'     => esc_html__( 'width: 100px, height: 100px', 'paint' ),
		'section'         => 'paint_opt_section_general',
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
				'setting'  => 'paint_opt_image_logo',
				'operator' => '!=',
				'value'    => '',
			]
		],
	]
);

// Field show loading
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_show_loading',
		'label'    => esc_html__( 'Show Loading', 'paint' ),
		'section'  => 'paint_opt_section_general',
		'default'  => 'off',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'paint' ),
			'off' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

// Field upload image loading
new Image(
	[
		'settings'        => 'paint_opt_image_loading',
		'label'           => esc_html__( 'Upload Image Loading', 'paint' ),
		'section'         => 'paint_opt_section_general',
		'description'     => esc_html__( 'Upload image .gif', 'paint' ),
		'default'         => '',
		'active_callback' => [
			[
				'setting'  => 'paint_opt_show_loading',
				'operator' => '===',
				'value'    => 'on',
			]
		]
	]
);

// Field show back to top
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_back_to_top',
		'label'    => esc_html__( 'Show Back To Top', 'paint' ),
		'section'  => 'paint_opt_section_general',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Show', 'paint' ),
			'off' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

/*
 * Section Menu
 * */
new Section(
	'paint_opt_section_menu',
	[
		'title'    => esc_html__( 'Menu', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Show Sticky Menu
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_sticky_menu',
		'label'    => esc_html__( 'Sticky menu', 'paint' ),
		'section'  => 'paint_opt_section_menu',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Yes', 'paint' ),
			'off' => esc_html__( 'No', 'paint' ),
		],
	]
);

// Field Show Cart
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_cart_menu',
		'label'    => esc_html__( 'Cart', 'paint' ),
		'section'  => 'paint_opt_section_menu',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'paint' ),
			'hide' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

/*
 * Section Contact Us
 * */
new Section(
	'paint_opt_section_contact_us',
	[
		'title'    => esc_html__( 'Contact us', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Show Contact Us
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_show_contact_us',
		'label'    => esc_html__( 'Show Contact Us', 'paint' ),
		'section'  => 'paint_opt_section_contact_us',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'paint' ),
			'hide' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

// Field Address Contact
new Text(
	[
		'settings' => 'paint_opt_address_contact_us',
		'label'    => esc_html__( 'Address', 'paint' ),
		'section'  => 'paint_opt_section_contact_us',
		'default'  => esc_html__( '988782, Our Street, S State', 'paint' ),
		'priority' => 10,
	]
);

// Field Mail Contact
new Text(
	[
		'settings' => 'paint_opt_mail_contact_us',
		'label'    => esc_html__( 'Mail', 'paint' ),
		'section'  => 'paint_opt_section_contact_us',
		'default'  => 'info@domain.com',
	]
);

// Field Phone Contact
new Text(
	[
		'settings' => 'paint_opt_phone_contact_us',
		'label'    => esc_html__( 'Phone', 'paint' ),
		'section'  => 'paint_opt_section_contact_us',
		'default'  => '+1 234 567 186',
	]
);

/*
 * Section Blog Post
 * */
new Section(
	'paint_opt_section_blog_post',
	[
		'title'       => esc_html__( 'Blog Post', 'paint' ),
		'panel'       => 'paint_opt_panel',
		'description' => esc_html__( 'Use for archive, index, page search', 'paint' ),
		'priority'    => 10,
	]
);

// Field Sidebar Blog Post
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_sidebar_blog_post',
		'label'    => esc_html__( 'Blog Sidebar', 'paint' ),
		'section'  => 'paint_opt_section_blog_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'paint' ),
			'left'  => esc_html__( 'Left', 'paint' ),
			'right' => esc_html__( 'Right', 'paint' ),
		],
	]
);

// Field Blog Per Row
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_per_row_blog_post',
		'label'    => esc_html__( 'Blog Per Row', 'paint' ),
		'section'  => 'paint_opt_section_blog_post',
		'default'  => '2',
		'choices'  => [
			'2' => esc_html__( '2 Column', 'paint' ),
			'3' => esc_html__( '3 Column', 'paint' ),
			'4' => esc_html__( '4 Column', 'paint' ),
		],
	]
);

/*
 * Section Single Post
 * */
new Section(
	'paint_opt_section_single_post',
	[
		'title'    => esc_html__( 'Single Post', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Single Post
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_sidebar_single_post',
		'label'    => esc_html__( 'Single Sidebar', 'paint' ),
		'section'  => 'paint_opt_section_single_post',
		'default'  => 'right',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'paint' ),
			'left'  => esc_html__( 'Left', 'paint' ),
			'right' => esc_html__( 'Right', 'paint' ),
		],
	]
);

// Field Show Share Post
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_share_single_post',
		'label'    => esc_html__( 'Show Share Post', 'paint' ),
		'section'  => 'paint_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'paint' ),
			'hide' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

// Field Show Related Post
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_related_single_post',
		'label'    => esc_html__( 'Show Related Post', 'paint' ),
		'section'  => 'paint_opt_section_single_post',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'paint' ),
			'hide' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

// Field Show Related Post Limit
new Slider(
	[
		'settings' => 'paint_opt_related_limit_single_post',
		'label'    => esc_html__( 'Related Post Limit', 'paint' ),
		'section'  => 'paint_opt_section_single_post',
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
	'paint_opt_section_social_network',
	[
		'title'    => esc_html__( 'Social Network', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Social List
new Repeater(
	[
		'settings'  => 'paint_opt_social_list',
		'label'     => esc_html__( 'Create Social Links', 'paint' ),
		'section'   => 'paint_opt_section_social_network',
		'tooltip'   => esc_html__( 'Use Font Awesome Free 6', 'paint' ),
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__( 'Social link', 'paint' ),
			'field' => 'title',
		),
		'default'   => [
			[
				'title'  => esc_html__( 'Facebook', 'paint' ),
				'icon'   => 'fab fa-facebook-f',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Youtube', 'paint' ),
				'icon'   => 'fab fa-youtube',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Twitter', 'paint' ),
				'icon'   => 'fab fa-twitter',
				'url'    => '#',
				'target' => '_blank',
			],
			[
				'title'  => esc_html__( 'Instagram', 'paint' ),
				'icon'   => 'fab fa-instagram',
				'url'    => '#',
				'target' => '_blank',
			],
		],
		'fields'    => [
			'title'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'paint' ),
				'description' => esc_html__( 'Ex: Facebook', 'paint' ),
				'default'     => '',
			],
			'icon'   => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'paint' ),
				'description' => esc_html__( 'Font Awesome icons. Ex: fab fa-facebook-f', 'paint' ) . ' <a href="https://fontawesome.com/search" target="_blank"><strong>' . esc_html__( 'View All', 'paint' ) . ' </strong></a>',
				'default'     => '',
			),
			'url'    => [
				'type'    => 'url',
				'label'   => esc_html__( 'Link URL', 'paint' ),
				'default' => '#',
			],
			'target' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Link Target', 'paint' ),
				'default' => '_blank',
				'choices' => [
					'_blank' => esc_html__( 'New Window', 'paint' ),
					'_self'  => esc_html__( 'Same Frame', 'paint' ),
				],
			],
		],
	]
);

/*
 * Section Shop
 * */
new Section(
	'paint_opt_section_shop',
	[
		'title'       => esc_html__( 'Shop', 'paint' ),
		'description' => esc_html__( 'Settings WooCommerce', 'paint' ),
		'panel'       => 'paint_opt_panel',
		'priority'    => 10,
	]
);

// Field Limit Product
new Slider(
	[
		'settings' => 'paint_opt_limit_product',
		'label'    => esc_html__( 'Limit Product', 'paint' ),
		'section'  => 'paint_opt_section_shop',
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
		'settings' => 'paint_opt_per_row_product',
		'label'    => esc_html__( 'Products Per Row', 'paint' ),
		'section'  => 'paint_opt_section_shop',
		'default'  => '4',
		'choices'  => [
			'3' => esc_html__( '3 Column', 'paint' ),
			'4' => esc_html__( '4 Column', 'paint' ),
			'5' => esc_html__( '5 Column', 'paint' ),
		],
	]
);

// Field Sidebar Shop
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_sidebar_shop',
		'label'    => esc_html__( 'Shop Sidebar', 'paint' ),
		'section'  => 'paint_opt_section_shop',
		'default'  => 'left',
		'choices'  => [
			'hide'  => esc_html__( 'Hide', 'paint' ),
			'left'  => esc_html__( 'Left', 'paint' ),
			'right' => esc_html__( 'Right', 'paint' ),
		],
	]
);

/*
 * Section Footer
 * */
new Section(
	'paint_opt_section_footer',
	[
		'title'    => esc_html__( 'Footer', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Sidebar Footer
new Select(
	[
		'settings'    => 'paint_opt_column_footer',
		'label'       => esc_html__( 'Number of Footer Columns', 'paint' ),
		'section'     => 'paint_opt_section_footer',
		'default'     => 'column-4',
		'placeholder' => esc_html__( 'Choose an option', 'paint' ),
		'choices'     => [
			'column-0' => esc_html__( 'Hide Column', 'paint' ),
			'column-1' => esc_html__( '1', 'paint' ),
			'column-2' => esc_html__( '2', 'paint' ),
			'column-3' => esc_html__( '3', 'paint' ),
			'column-4' => esc_html__( '4', 'paint' ),
		],
	]
);

// Field Footer Width Column 1
new Slider(
	[
		'settings'        => 'paint_opt_column_width_footer_1',
		'label'           => esc_html__( 'Column width 1', 'paint' ),
		'section'         => 'paint_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			]
		]
	]
);

// Field Footer Width Column 2
new Slider(
	[
		'settings'        => 'paint_opt_column_width_footer_2',
		'label'           => esc_html__( 'Column width 2', 'paint' ),
		'section'         => 'paint_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			]
		]
	]
);

// Field Footer Width Column 3
new Slider(
	[
		'settings'        => 'paint_opt_column_width_footer_3',
		'label'           => esc_html__( 'Column width 3', 'paint' ),
		'section'         => 'paint_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			]
		]
	]
);

// Field Footer Width Column 4
new Slider(
	[
		'settings'        => 'paint_opt_column_width_footer_4',
		'label'           => esc_html__( 'Column width 4', 'paint' ),
		'section'         => 'paint_opt_section_footer',
		'description'     => esc_html__( 'Min: 1, max: 12, default value: 3', '' ),
		'default'         => 3,
		'choices'         => [
			'min'  => 1,
			'max'  => 12,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-0',
			],
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-1',
			],
			[
				'setting'  => 'paint_opt_column_footer',
				'operator' => '!==',
				'value'    => 'column-2',
			],
			[
				'setting'  => 'paint_opt_column_footer',
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
	'paint_opt_section_copyright',
	[
		'title'    => esc_html__( 'Copyright', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Show copyright
new Radio_Buttonset(
	[
		'settings' => 'paint_opt_show_copyright',
		'label'    => esc_html__( 'Show Copyright', 'paint' ),
		'section'  => 'paint_opt_section_copyright',
		'default'  => 'show',
		'choices'  => [
			'show' => esc_html__( 'Show', 'paint' ),
			'hide' => esc_html__( 'Hide', 'paint' ),
		],
	]
);

// Field Content Copyright
new Editor(
	[
		'settings' => 'paint_opt_content_copyright',
		'label'    => esc_html__( 'Content', 'paint' ),
		'section'  => 'paint_opt_section_copyright',
		'default'  => esc_html__( 'Copyright &amp; DiepLK', 'paint' ),
	]
);

/*
 * Section Typography
 * */
new Section(
	'paint_opt_section_typography',
	[
		'title'    => esc_html__( 'Typography', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Typography
new Typography(
	[
		'settings'  => 'paint_opt_typography',
		'label'     => esc_html__( 'Body', 'paint' ),
		'section'   => 'paint_opt_section_typography',
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
	'paint_opt_section_404',
	[
		'title'    => esc_html__( '404 Options', 'paint' ),
		'panel'    => 'paint_opt_panel',
		'priority' => 10,
	]
);

// Field Upload Image 404
new Image(
	[
		'settings' => 'paint_opt_image_404',
		'label'    => esc_html__( 'Upload Image', 'paint' ),
		'section'  => 'paint_opt_section_404',
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
	]
);

// Field Title 404
new Text(
	[
		'settings' => 'paint_opt_title_404',
		'label'    => esc_html__( 'Title', 'paint' ),
		'section'  => 'paint_opt_section_404',
		'default'  => esc_html__( 'Awww...Do Not Cry', 'paint' ),
	]
);

// Field Content 404
new Editor(
	[
		'settings' => 'paint_opt_content_404',
		'label'    => esc_html__( 'Content', 'paint' ),
		'section'  => 'paint_opt_section_404',
		'default'  => esc_html__( 'It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'paint' ),
	]
);