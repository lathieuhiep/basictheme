<?php
/**
 * ReduxFramework Config File
 * TemPlaza Plazart Default Theme
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}


// This is your option name where all the Redux data is stored.
$basictheme_opt_name = "basictheme_options";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$basictheme_theme = wp_get_theme(); // For use with some settings. Not necessary.

$basictheme_opt_args = array(

    'opt_name'             => $basictheme_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $basictheme_theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $basictheme_theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => false,
    // Show the sections below the admin menu item or not
    'menu_title'           => $basictheme_theme->get( 'Name' ) . esc_html__(' Options', 'basictheme'),
    'page_title'           => $basictheme_theme->get( 'Name' ) . esc_html__(' Options', 'basictheme'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'             =>  array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     =>  array(
            'color'     => 'red',
            'shadow'    =>  true,
            'rounded'   =>  false,
            'style'     =>  '',
        ),
        'tip_position'  =>  array(
            'my'        =>  'top left',
            'at'        =>  'bottom right',
        ),
        'tip_effect'    =>  array(
            'show'      =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'mouseover',
            ),
            'hide'  =>  array(
                'effect'    =>  'slide',
                'duration'  =>  '500',
                'event'     =>  'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs( $basictheme_opt_name, $basictheme_opt_args );
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$basictheme_opt_tabs = array(
    array(
        'id'        =>  'redux-help-tab-1',
        'title'     =>  esc_html__( 'Theme Information 1', 'basictheme' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'basictheme' )
    ),
    array(
        'id'        =>  'redux-help-tab-2',
        'title'     =>  esc_html__( 'Theme Information 2', 'basictheme' ),
        'content'   =>  esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'basictheme' )
    )
);
Redux::setHelpTab( $basictheme_opt_name, $basictheme_opt_tabs );

// Set the help sidebar
$basictheme_opt_content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'basictheme' );
Redux::setHelpSidebar( $basictheme_opt_name, $basictheme_opt_content );


/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START option background

Redux::setSection( $basictheme_opt_name, array(
    'id'                =>   'basictheme_theme_option',
    'title'             =>   $basictheme_theme->get( 'Name' ).' '.$basictheme_theme->get( 'Version' ),
    'customizer_width'  =>   '400px',
    'icon'              =>   '',
));

// -> END option background

/* Start General Options */

Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'General Options', 'basictheme' ),
    'id'                =>  'basictheme_general',
    'desc'              =>  esc_html__( 'General all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-th-large',
));

// Favicon Config
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Favicon', 'basictheme' ),
    'id'            =>  'basictheme_favicon_config',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'basictheme_favicon_upload',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload Favicon Image', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Favicon image for your website', 'basictheme' ),
            'desc'      =>  esc_html__( '', 'basictheme' ),
            'default'   =>  false,
        ),
    )
));

//Loading config
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Loading config', 'basictheme' ),
    'id'            =>  'basictheme_general_loading',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'basictheme_general_show_loading',
            'type'      =>  'switch',
            'title'     =>  esc_html__( 'Loading On/Off', 'basictheme' ),
            'default'   =>  false,
        ),
        array(
            'id'        =>  'basictheme_general_image_loading',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload image loading', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Upload image .gif', 'basictheme' ),
            'default'   =>  '',
            'required'  =>  array( 'basictheme_general_show_loading', '=', true ),
        ),
    )
));

//Background Options
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Background', 'basictheme' ),
    'id'                =>  'basictheme_background',
    'desc'              =>  esc_html__( 'Background all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'subsection'        => true,
    'fields'            => array(
        array(
            'id'        =>  'basictheme_background_body',
            'output'    =>  'body',
            'type'      =>  'background',
            'clone'     =>  'true',
            'title'     =>  esc_html__( 'Body background', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Body background with image, color, etc.', 'basictheme' ),
            'hint'      =>  array(
                'content'   =>  'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        ),
    ),
));

/* End General Options */

/* Start Header Options */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Header Options', 'basictheme' ),
    'id'                =>  'basictheme_header',
    'desc'              =>  esc_html__( 'Header all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-up',
));

//Logo Config
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Logo', 'basictheme' ),
    'id'            =>  'basictheme_logo_config',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'basictheme_logo_image',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( 'Upload logo', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'logo image for your website', 'basictheme' ),
            'desc'      =>  esc_html__( '', 'basictheme' ),
            'default'   =>  false,
        ),

        array(
            'id'                => 'basictheme_logo_images_size',
            'type'              => 'dimensions',
            'units'             => array( 'em', 'px', '%' ),
            'title'             => esc_html__( 'Set width/height for logo', 'basictheme' ),
            'subtitle'          => esc_html__( '', 'basictheme' ),
            'units_extended'    => 'true',
            'default'           => array(
                'width'     =>  '',
                'height'    =>  '',
            ),
            'output'         => array('.site-logo img'),
        ),
    )
));

// information
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Information', 'basictheme' ),
    'id'            =>  'basictheme_information_config',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'basictheme_information_show_hide',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Show Or Hide Information', 'basictheme' ),
            'default'   =>  1,
            'options'   =>  array(
                1   =>  esc_html__( 'Show', 'basictheme' ),
                0   =>  esc_html__( 'Hide', 'basictheme' )
            )
        ),

        array(
            'id'        =>  'basictheme_information_address',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Address', 'basictheme' ),
            'default'   =>  '988782, Our Street, S State.',
        ),

        array(
            'id'        =>  'basictheme_information_mail',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Mail', 'basictheme' ),
            'default'   =>  'info@domain.com',
        ),

        array(
            'id'        =>  'basictheme_information_phone',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Phone', 'basictheme' ),
            'default'   =>  '+1 234 567 186',
        ),

    )
));

/* End Header Options */

/* Start Blog Option */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Blog Options', 'basictheme' ),
    'id'                =>  'basictheme_blog_option',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-blogger',
    'fields'            =>  array(

        array(
            'id'        =>  'basictheme_blog_sidebar_archive',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Position Sidebar Archive', 'basictheme' ),
            'desc'      =>  esc_html__( 'Position Sidebar Archive', 'basictheme' ),
            'default'   =>  'right',
            'options'   =>  array(
                'left'  =>  'Left',
                'right' =>  'Right',
                'hide'  =>  'Hide',
            )
        ),

        array(
            'id'        =>  'basictheme_blog_sidebar_single',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Position Sidebar Single', 'basictheme' ),
            'desc'      =>  esc_html__( 'Position Sidebar Single', 'basictheme' ),
            'default'   =>  'right',
            'options'   =>  array(
                'left'  =>  'Left',
                'right' =>  'Right',
                'hide'  =>  'Hide',
            )
        ),

    )
));
/* End Blog Option */

/* Start Social Network */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Social Network', 'basictheme' ),
    'id'                =>  'basictheme_social_network',
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-globe-alt',
    'fields'            =>  array(
        array(
            'id'        =>  'basictheme_social_network_facebook',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Facebook', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_twitter',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Twitter', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_google-plus',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Google Plus', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_linkedin',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Linkedin', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_pinterest',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Pinterest', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_youtube',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Youtube', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_instagram',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Instagram', 'basictheme' ),
            'default'   =>  '#',
        ),

        array(
            'id'        =>  'basictheme_social_network_vimeo',
            'type'      =>  'text',
            'title'     =>  esc_html__( 'Vimeo', 'basictheme' ),
            'default'   =>  '#',
        ),

    )
));
/* End Social Network */

/* Start Shop */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Shop', 'basictheme' ),
    'id'                =>  'basictheme_shop_woo',
    'desc'              =>  esc_html__( 'Settings WooCommerce', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-shopping-cart',
    'fields'            =>  array(
        array(
            'id'            =>  'basictheme_product_limit',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Product Limit Page Shop', 'basictheme' ),
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  250,
            'default'       =>  12,
            'display_value' => 'text'
        ),

        array(
            'id'        =>  'basictheme_products_per_row',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Products Per Row', 'basictheme' ),
            'default'   =>  4,
            'options'   =>  array(
                3   =>  '3 Column',
                4   =>  '4 Column',
                5   =>  '5 Column',
            )
        ),

        array(
            'id'        =>  'basictheme_sidebar_woo',
            'type'      =>  'select',
            'title'     =>  esc_html__( 'Position Sidebar Woocommerce', 'basictheme' ),
            'desc'          =>  esc_html__( 'Position Sidebar Woocommerce', 'basictheme' ),
            'default'   =>  'left',
            'options'   =>  array(
                'left'  =>  'Left',
                'right' =>  'Right',
                'hide'  =>  'Hide',
            )
        ),
    )
));
/* End Shop */

/* Start Typography Options */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Typography', 'basictheme' ),
    'id'                =>  'basictheme_typography',
    'desc'              =>  esc_html__( 'Typography all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-fontsize'
));

// Body font
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Body Typography', 'basictheme' ),
    'id'            =>  'basictheme_body_typography',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'basictheme_body_typography_font',
            'type'      =>  'typography',
            'output'    =>  array( 'body' ),
            'title'     =>  esc_html__( 'Body Font', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Specify the body font properties.', 'basictheme' ),
            'google'    =>  true,
            'default'   =>  array(
                'color'         =>  '',
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
            ),
        ),

        array(
            'id'        =>  'basictheme_link_color',
            'type'      =>  'link_color',
            'output'    =>  array( 'a' ),
            'title'     =>  esc_html__( 'Link Color', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Controls the color of all text links.', 'basictheme' ),
            'default'   =>  ''
        ),
    )
));

// Header font
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Custom Typography', 'basictheme' ),
    'id'            =>  'basictheme_custom_typography',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'basictheme_custom_typography_1',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 1 Typography', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 1.', 'basictheme' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 1
        array(
            'id'        =>  'basictheme_custom_typography_1_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 1', 'basictheme' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme' ),
            'default'   =>  ''
        ),

        array(
            'id'        =>  'basictheme_custom_typography_2',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 2 Typography', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 2.', 'basictheme' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
        ),

        //selector custom typo 2
        array(
            'id'        => 'basictheme_custom_typography_2_selector',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Selectors 2', 'basictheme' ),
            'desc'      => esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme' ),
            'default'   => ''
        ),

        array(
            'id'        =>  'basictheme_custom_typography_3',
            'type'      =>  'typography',
            'title'     =>  esc_html__( 'Custom 3 Typography', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'These settings control the typography for all Custom 3.', 'basictheme' ),
            'google'    =>  true,
            'default'   =>  array(
                'font-size'     =>  '',
                'font-family'   =>  '',
                'font-weight'   =>  '',
                'color'         =>  '',
            ),
            'output'    =>  '',
        ),

        //selector custom typo 3
        array(
            'id'        =>  'basictheme_custom_typography_3_selector',
            'type'      =>  'textarea',
            'title'     =>  esc_html__( 'Selectors 3', 'basictheme' ),
            'desc'      =>  esc_html__( 'Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme' ),
            'default'   =>  ''
        ),

    )
));

/* End Typography Options */

/* Start Blog Single */
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Blog Single', 'basictheme' ),
    'id'            =>  'basictheme_blog_single',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(

        array(
            'id'        =>  'basictheme_blog_single_sidebar',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Sidebar', 'basictheme' ),
            'subtitle'  =>  esc_html__( '', 'basictheme' ),
            'default'   =>  1,
            'options'   =>  array(
                1 =>  array(
                    'alt'   =>  'None Sidebar',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                2 =>  array(
                    'alt'   =>  'Sidebar Left',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                3 =>  array(
                    'alt'   =>  'Sidebar Right',
                    'img'   =>  ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

    )
));
/* End Blog Single */

/* Start 404 Options */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( '404 Options', 'basictheme' ),
    'id'                =>  'basictheme_404',
    'desc'              =>  esc_html__( '404 page all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-warning-sign',
    'fields'            =>  array(

        array(
            'id'        =>  'basictheme_404_background',
            'type'      =>  'media',
            'url'       =>  true,
            'title'     =>  esc_html__( '404 Background', 'basictheme' ),
            'default'   =>  false,
        ),

        array(
            'id'        =>  'basictheme_404_title',
            'type'      =>  'text',
            'title'     =>  esc_html__( '404 Title', 'basictheme' ),
            'default'   =>  esc_html__('Awww...Don’t Cry', 'basictheme' ),
        ),

        array(
            'id'        =>  'basictheme_404_editor',
            'type'      =>  'editor',
            'title'     =>  esc_html__( '404 Content', 'basictheme' ),
            'default'   =>  esc_html__( "It's just a 404 Error! <br /> What you’re looking for may have been misplaced <br> in Long Term Memory.", 'basictheme' ),
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),

    )
));
/* End 404 Options */

/* Start Footer Options */
Redux::setSection( $basictheme_opt_name, array(
    'title'             =>  esc_html__( 'Footer Options', 'basictheme' ),
    'id'                =>  'basictheme_footer',
    'desc'              =>  esc_html__( 'Footer all config', 'basictheme' ),
    'customizer_width'  =>  '400px',
    'icon'              =>  'el el-arrow-down'
));

//Footer Content
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Footer content', 'basictheme' ),
    'id'            =>  'basictheme_footer_content',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'        =>  'basictheme_footer_column_col',
            'type'      =>  'image_select',
            'title'     =>  esc_html__( 'Number of Footer Columns', 'basictheme' ),
            'subtitle'  =>  esc_html__( 'Controls the number of columns in the footer', 'basictheme' ),
            'default'   =>  0,
            'options'   =>  array(
                '0' =>  array(
                    'alt'   =>  'No Footer',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/no-footer.png' )
                ),

                '1' =>  array(
                    'alt'   =>  '1 Columnn',
                    'img'   =>  get_theme_file_uri(  '/extension/assets/images/1column.png' )
                ),

                '2' =>  array(
                    'alt'   =>  '2 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/2column.png' )
                ),
                '3' =>  array(
                    'alt'   =>  '3 Columnn',
                    'img'   =>  get_theme_file_uri(   '/extension/assets/images/3column.png' )
                ),
                '4' =>  array(
                    'alt'   =>  '4 Columnn',
                    'img'   =>  get_theme_file_uri( '/extension/assets/images/4column.png' )
                ),
            ),
        ),

        array(
            'id'            =>  'basictheme_footer_column_w1',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 1', 'basictheme' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'basictheme' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'basictheme' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'basictheme_footer_column_col', 'equals','1', '2', '3', '4' ),
                array( 'basictheme_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'basictheme_footer_column_w2',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 2', 'basictheme' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'basictheme' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'basictheme' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'basictheme_footer_column_col', 'equals', '2', '3', '4' ),
                array( 'basictheme_footer_column_col', '!=', '1' ),
                array( 'basictheme_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'basictheme_footer_column_w3',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 3', 'basictheme' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'basictheme' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'basictheme' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'basictheme_footer_column_col', 'equals', '3', '4' ),
                array( 'basictheme_footer_column_col', '!=', '1' ),
                array( 'basictheme_footer_column_col', '!=', '2' ),
                array( 'basictheme_footer_column_col', '!=', '0' ),
            )
        ),

        array(
            'id'            =>  'basictheme_footer_column_w4',
            'type'          =>  'slider',
            'title'         =>  esc_html__( 'Footer width 4', 'basictheme' ),
            'subtitle'      =>  esc_html__( 'Select the number of columns to display in the footer', 'basictheme' ),
            'desc'          =>  esc_html__( 'Min: 1, max: 12, default value: 1', 'basictheme' ),
            'default'       =>  1,
            'min'           =>  1,
            'step'          =>  1,
            'max'           =>  12,
            'display_value' =>  'label',
            'required'      =>  array(
                array( 'basictheme_footer_column_col',  'equals', '4' ),
                array( 'basictheme_footer_column_col', '!=', '1' ),
                array( 'basictheme_footer_column_col', '!=', '2' ),
                array( 'basictheme_footer_column_col', '!=', '3' ),
                array( 'basictheme_footer_column_col', '!=', '0' ),
            )
        ),
    )

));

//Copyright
Redux::setSection( $basictheme_opt_name, array(
    'title'         =>  esc_html__( 'Copyright', 'basictheme' ),
    'id'            =>  'basictheme_footer_copyright',
    'desc'          =>  esc_html__( '', 'basictheme' ),
    'subsection'    =>  true,
    'fields'        =>  array(
        array(
            'id'            =>  'basictheme_footer_copyright_editor',
            'type'          =>  'editor',
            'title'         =>  esc_html__( 'Enter content copyright', 'basictheme' ),
            'full_width'    =>  true,
            'default'       =>  'Copyright &amp; DiepLK',
            'args'          =>  array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => false,
                'quicktags'     => true,
            )
        ),
    )
));

/* End Footer Options */


/*
 * <--- END SECTIONS
 */

// Function to test the compiler hook and demo CSS output.
add_filter('redux/options/' . $basictheme_opt_name . '/compiler', 'compiler_action', 10, 3);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        print_r($options); //Option values
        print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}
