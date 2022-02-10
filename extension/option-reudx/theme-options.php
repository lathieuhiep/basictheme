<?php
/**
 * ReduxFramework Config File
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
    'display_name' => $basictheme_theme->get('Name'),
    'display_version' => $basictheme_theme->get('Version'),
    'menu_title' => esc_html__('Theme Options', 'basictheme'),
    'allow_sub_menu' => false,
    'page_priority' => 2,
    'customizer' => true,

);

Redux::set_args($basictheme_opt_name, $basictheme_opt_args);
/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START option background
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_setting',
    'title' => $basictheme_theme->get('Name') . ' ' . $basictheme_theme->get('Version'),
    'customizer_width' => '400px',
    'icon' => '',
));
// -> END option background

/* Start General Options */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_general',
    'title' => esc_html__('General Options', 'basictheme'),
    'desc' => esc_html__('General all config', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-th-large',
    'fields' => array(
        array(
            'id' => 'basictheme_opt_backtotop_show',
            'type' => 'switch',
            'title' => esc_html__('Show Back To Top', 'basictheme'),
            'on' => esc_html__('Yes', 'basictheme'),
            'off' => esc_html__('No', 'basictheme'),
            'default' => true,
        ),
    )
));

// Favicon Config
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_favicon',
    'title' => esc_html__('Favicon', 'basictheme'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'basictheme_opt_favicon_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Favicon Image', 'basictheme'),
            'subtitle' => esc_html__('Favicon image for your website', 'basictheme'),
            'default' => false,
        ),
    )
));

//Loading config
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_loading',
    'title' => esc_html__('Loading config', 'basictheme'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'basictheme_opt_loading_show',
            'type' => 'switch',
            'title' => esc_html__('Show Loading', 'basictheme'),
            'on' => esc_html__('Yes', 'basictheme'),
            'off' => esc_html__('No', 'basictheme'),
            'default' => false,
        ),

        array(
            'id' => 'basictheme_opt_loading_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload image loading', 'basictheme'),
            'subtitle' => esc_html__('Upload image .gif', 'basictheme'),
            'default' => '',
            'required' => array('basictheme_opt_loading_show', '=', true),
        ),
    )
));

//Background Options
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_background',
    'title' => esc_html__('Background', 'basictheme'),
    'desc' => esc_html__('Background all config', 'basictheme'),
    'customizer_width' => '400px',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'basictheme_opt_background_body',
            'output' => 'body',
            'type' => 'background',
            'clone' => 'true',
            'title' => esc_html__('Body background', 'basictheme'),
        ),
    ),
));
/* End General Options */

/* Start Header Options */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_header',
    'title' => esc_html__('Header Options', 'basictheme'),
    'desc' => esc_html__('Header all config', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-up',
));

//Logo Config
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_logo',
    'title' => esc_html__('Logo', 'basictheme'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'basictheme_opt_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload logo', 'basictheme'),
            'subtitle' => esc_html__('logo image for your website', 'basictheme'),
            'default' => false,
        ),

        array(
            'id' => 'basictheme_opt_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),
            'title' => esc_html__('Set width/height for logo', 'basictheme'),
            'units_extended' => 'true',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.site-logo img'),
        ),

        array(
            'id' => 'basictheme_opt_nav_sticky',
            'type' => 'select',
            'title' => esc_html__('Sticky Menu', 'basictheme'),
            'default' => 1,
            'options' => array(
                1 => esc_html__('Yes', 'basictheme'),
                2 => esc_html__('No', 'basictheme')
            )
        ),

    )
));
/* End Header Options */

// Contact us options
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_contact_us',
    'title' => esc_html__('Contact us', 'basictheme'),
    'icon' => 'el el-inbox',
    'fields' => array(
        array(
            'id' => 'basictheme_opt_contact_us_show',
            'type' => 'switch',
            'title' => esc_html__('Show contact us', 'basictheme'),
            'on' => esc_html__('Yes', 'basictheme'),
            'off' => esc_html__('No', 'basictheme'),
            'default' => true,
        ),

        array(
            'id' => 'basictheme_opt_contact_us_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'basictheme'),
            'default' => '988782, Our Street, S State',
            'required' => array('basictheme_opt_contact_us_show', '=', true),
        ),

        array(
            'id' => 'basictheme_opt_contact_us_mail',
            'type' => 'text',
            'title' => esc_html__('Mail', 'basictheme'),
            'default' => 'info@domain.com',
            'required' => array('basictheme_opt_contact_us_show', '=', true),
        ),

        array(
            'id' => 'basictheme_opt_contact_us_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'basictheme'),
            'default' => '+1 234 567 186',
            'required' => array('basictheme_opt_contact_us_show', '=', true),
        ),

    )
));

/* Start Blog Option */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_blog',
    'title' => esc_html__('Blog', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-blogger',
    'fields' => array(

        array(
            'id' => 'basictheme_opt_blog_sidebar_archive',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Archive', 'basictheme'),
            'desc' => esc_html__('Use for archive, index, page search', 'basictheme'),
            'default' => 'right',
            'options' => array(
                'hide' => array(
                    'alt' => 'None Sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                'left' => array(
                    'alt' => 'Sidebar Left',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                'right' => array(
                    'alt' => 'Sidebar Right',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

        array(
            'id' => 'basictheme_opt_blog_per_row',
            'type' => 'select',
            'title' => esc_html__('Blog Per Row', 'basictheme'),
            'default' => 2,
            'options' => array(
                2 => '2 Column',
                3 => '3 Column',
                4 => '4 Column',
            )
        ),

    )
));

Redux::set_section($basictheme_opt_name, array(
    'title' => esc_html__('Single Post', 'basictheme'),
    'id' => 'basictheme_opt_single_post',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'basictheme_opt_single_post_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Single', 'basictheme'),
            'default' => 'right',
            'options' => array(
                'hide' => array(
                    'alt' => 'None Sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                'left' => array(
                    'alt' => 'Sidebar Left',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                'right' => array(
                    'alt' => 'Sidebar Right',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),

        array(
            'id' => 'basictheme_opt_single_post_share',
            'type' => 'switch',
            'title' => esc_html__('Show Share Post', 'basictheme'),
            'on' => esc_html__('Yes', 'basictheme'),
            'off' => esc_html__('No', 'basictheme'),
            'default' => true,
        ),

        array(
            'id' => 'basictheme_opt_single_related_show',
            'type' => 'switch',
            'title' => esc_html__('Show Related Post', 'basictheme'),
            'on' => esc_html__('Yes', 'basictheme'),
            'off' => esc_html__('No', 'basictheme'),
            'default' => true,
        ),

        array(
            'id' => 'basictheme_opt_single_related_limit',
            'type' => 'slider',
            'title' => esc_html__('Related Post Limit', 'basictheme'),
            'min' => 1,
            'step' => 1,
            'max' => 250,
            'default' => 3,
            'required' => array('basictheme_opt_single_related_show', '=', true),
        ),

    )
));
/* End Blog Option */

/* Start Social Network */
Redux::set_section($basictheme_opt_name, array(
    'title' => esc_html__('Social Network', 'basictheme'),
    'id' => 'basictheme_opt_social_network',
    'customizer_width' => '400px',
    'icon' => 'el el-globe-alt',
    'fields' => array(

        array(
            'id' => 'basictheme_opt_social_network_facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook', 'basictheme'),
            'default' => '#',
        ),

        array(
            'id' => 'basictheme_opt_social_network_youtube',
            'type' => 'text',
            'title' => esc_html__('Youtube', 'basictheme'),
            'default' => '#',
        ),

        array(
            'id' => 'basictheme_opt_social_network_twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter', 'basictheme'),
            'default' => '#',
        ),

        array(
            'id' => 'basictheme_opt_social_network_instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram', 'basictheme'),
            'default' => '#',
        ),

    )
));
/* End Social Network */

/* Start Shop */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_shop',
    'title' => esc_html__('Shop', 'basictheme'),
    'desc' => esc_html__('Settings WooCommerce', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-shopping-cart',
    'fields' => array(

        array(
            'id' => 'basictheme_opt_shop_limit',
            'type' => 'slider',
            'title' => esc_html__('Product Limit Page Shop', 'basictheme'),
            'min' => 1,
            'step' => 1,
            'max' => 250,
            'default' => 12,
            'display_value' => 'text'
        ),

        array(
            'id' => 'basictheme_opt_shop_per_row',
            'type' => 'select',
            'title' => esc_html__('Products Per Row', 'basictheme'),
            'default' => 4,
            'options' => array(
                3 => '3 Column',
                4 => '4 Column',
                5 => '5 Column',
            )
        ),

        array(
            'id' => 'basictheme_opt_shop_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Shop', 'basictheme'),
            'default' => 'left',
            'options' => array(
                'hide' => array(
                    'alt' => 'None Sidebar',
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),

                'left' => array(
                    'alt' => 'Sidebar Left',
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),

                'right' => array(
                    'alt' => 'Sidebar Right',
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                ),

            ),
        ),
    )
));
/* End Shop */

/* Start Typography Options */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_typography',
    'title' => esc_html__('Typography', 'basictheme'),
    'desc' => esc_html__('Typography all config', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-fontsize'
));

// Body font
Redux::set_section($basictheme_opt_name, array(
    'title' => esc_html__('Body Typography', 'basictheme'),
    'id' => 'basictheme_opt_typography_body',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'basictheme_opt_typography_body_font',
            'type' => 'typography',
            'output' => array('body'),
            'title' => esc_html__('Body Font', 'basictheme'),
            'subtitle' => esc_html__('Specify the body font properties.', 'basictheme'),
            'google' => true,
            'default' => array(
                'color' => '',
                'font-size' => '',
                'font-family' => '',
                'font-weight' => '',
            ),
        ),

        array(
            'id' => 'basictheme_opt_link_color',
            'type' => 'link_color',
            'output' => array('a'),
            'title' => esc_html__('Link Color', 'basictheme'),
            'subtitle' => esc_html__('Controls the color of all text links.', 'basictheme'),
            'default' => ''
        ),
    )
));

// Header font
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_custom_typography',
    'title' => esc_html__('Custom Typography', 'basictheme'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'basictheme_opt_custom_typography_1',
            'type' => 'typography',
            'title' => esc_html__('Custom 1 Typography', 'basictheme'),
            'subtitle' => esc_html__('These settings control the typography for all Custom 1.', 'basictheme'),
            'google' => true,
            'default' => array(
                'font-size' => '',
                'font-family' => '',
                'font-weight' => '',
                'color' => '',
            ),
        ),

        //selector custom typo 1
        array(
            'id' => 'basictheme_opt_custom_typography_1_selector',
            'type' => 'textarea',
            'title' => esc_html__('Selectors 1', 'basictheme'),
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme'),
            'default' => ''
        ),

        array(
            'id' => 'basictheme_opt_custom_typography_2',
            'type' => 'typography',
            'title' => esc_html__('Custom 2 Typography', 'basictheme'),
            'subtitle' => esc_html__('These settings control the typography for all Custom 2.', 'basictheme'),
            'google' => true,
            'default' => array(
                'font-size' => '',
                'font-family' => '',
                'font-weight' => '',
                'color' => '',
            ),
        ),

        //selector custom typo 2
        array(
            'id' => 'basictheme_opt_custom_typography_2_selector',
            'type' => 'textarea',
            'title' => esc_html__('Selectors 2', 'basictheme'),
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme'),
            'default' => ''
        ),

        array(
            'id' => 'basictheme_opt_custom_typography_3',
            'type' => 'typography',
            'title' => esc_html__('Custom 3 Typography', 'basictheme'),
            'subtitle' => esc_html__('These settings control the typography for all Custom 3.', 'basictheme'),
            'google' => true,
            'default' => array(
                'font-size' => '',
                'font-family' => '',
                'font-weight' => '',
                'color' => '',
            ),
            'output' => '',
        ),

        //selector custom typo 3
        array(
            'id' => 'basictheme_opt_custom_typography_3_selector',
            'type' => 'textarea',
            'title' => esc_html__('Selectors 3', 'basictheme'),
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'basictheme'),
            'default' => ''
        ),

    )
));

/* End Typography Options */

/* Start 404 Options */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_404',
    'title' => esc_html__('404 Options', 'basictheme'),
    'desc' => esc_html__('404 page all config', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-warning-sign',
    'fields' => array(

        array(
            'id' => 'basictheme_opt_404_background',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('404 Background', 'basictheme'),
            'default' => false,
        ),

        array(
            'id' => 'basictheme_opt_404_title',
            'type' => 'text',
            'title' => esc_html__('404 Title', 'basictheme'),
            'default' => 'Awww...Do Not Cry',
        ),

        array(
            'id' => 'basictheme_opt_404_editor',
            'type' => 'editor',
            'title' => esc_html__('404 Content', 'basictheme'),
            'default' => esc_html__('It is just a 404 Error! What you are looking for may have been misplaced in Long Term Memory.', 'basictheme'),
            'args' => array(
                'wpautop' => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny' => false,
                'quicktags' => true,
            )
        ),

    )
));
/* End 404 Options */

/* Start Footer Options */
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_footer',
    'title' => esc_html__('Footer Options', 'basictheme'),
    'desc' => esc_html__('Footer all config', 'basictheme'),
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-down'
));

// Footer Sidebar Multi Column
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_footer_sidebar_multi_column',
    'title' => esc_html__('Sidebar Footer Multi Column', 'basictheme'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'basictheme_opt_footer_multi_column',
            'type' => 'image_select',
            'title' => esc_html__('Number of Footer Columns', 'basictheme'),
            'subtitle' => esc_html__('Controls the number of columns in the footer', 'basictheme'),
            'default' => 4,
            'options' => array(
                0 => array(
                    'alt' => 'No Footer',
                    'img' => get_theme_file_uri('/extension/assets/images/no-footer.png')
                ),

                1 => array(
                    'alt' => '1 Columnn',
                    'img' => get_theme_file_uri('/extension/assets/images/1column.png')
                ),

                2 => array(
                    'alt' => '2 Columnn',
                    'img' => get_theme_file_uri('/extension/assets/images/2column.png')
                ),

                3 => array(
                    'alt' => '3 Columnn',
                    'img' => get_theme_file_uri('/extension/assets/images/3column.png')
                ),

                4 => array(
                    'alt' => '4 Columnn',
                    'img' => get_theme_file_uri('/extension/assets/images/4column.png')
                ),
            ),
        ),

        array(
            'id' => 'basictheme_opt_footer_multi_column_1',
            'type' => 'slider',
            'title' => esc_html__('Column width 1', 'basictheme'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'basictheme'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'basictheme'),
            'default' => 3,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('basictheme_opt_footer_multi_column', 'equals', '1', '2', '3', '4'),
                array('basictheme_opt_footer_multi_column', '!=', '0'),
            )
        ),

        array(
            'id' => 'basictheme_opt_footer_multi_column_2',
            'type' => 'slider',
            'title' => esc_html__('Column width 2', 'basictheme'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'basictheme'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'basictheme'),
            'default' => 3,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('basictheme_opt_footer_multi_column', 'equals', '2', '3', '4'),
                array('basictheme_opt_footer_multi_column', '!=', '1'),
                array('basictheme_opt_footer_multi_column', '!=', '0'),
            )
        ),

        array(
            'id' => 'basictheme_opt_footer_multi_column_3',
            'type' => 'slider',
            'title' => esc_html__('Column width 3', 'basictheme'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'basictheme'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'basictheme'),
            'default' => 3,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('basictheme_opt_footer_multi_column', 'equals', '3', '4'),
                array('basictheme_opt_footer_multi_column', '!=', '1'),
                array('basictheme_opt_footer_multi_column', '!=', '2'),
                array('basictheme_opt_footer_multi_column', '!=', '0'),
            )
        ),

        array(
            'id' => 'basictheme_opt_footer_multi_column_4',
            'type' => 'slider',
            'title' => esc_html__('Column width 4', 'basictheme'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'basictheme'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'basictheme'),
            'default' => 3,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('basictheme_opt_footer_multi_column', 'equals', '4'),
                array('basictheme_opt_footer_multi_column', '!=', '1'),
                array('basictheme_opt_footer_multi_column', '!=', '2'),
                array('basictheme_opt_footer_multi_column', '!=', '3'),
                array('basictheme_opt_footer_multi_column', '!=', '0'),
            )
        ),
    )

));

//Copyright
Redux::set_section($basictheme_opt_name, array(
    'id' => 'basictheme_opt_footer_copyright',
    'title' => esc_html__('Copyright', 'basictheme'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'basictheme_opt_footer_copyright_editor',
            'type' => 'editor',
            'title' => esc_html__('Enter content copyright', 'basictheme'),
            'full_width' => true,
            'default' => 'Copyright &amp; DiepLK',
            'args' => array(
                'wpautop' => false,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny' => false,
                'quicktags' => true,
            )
        ),
    )
));

/* End Footer Options */


/*
 * <--- END SECTIONS
 */

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
        print_r($options); //Option values
        print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}