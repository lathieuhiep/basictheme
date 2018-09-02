<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 *constants
 */
if( !function_exists('basictheme_setup') ):

    function basictheme_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'basictheme', get_parent_theme_file_path( '/languages' ) );

        /**
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        //Enable support for Header (tz-demo)
        add_theme_support( 'custom-header' );

        //Enable support for Background (tz-demo)
        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');
        register_nav_menu('footer-menu','Footer Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*  Post Type   */
        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', basictheme_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'basictheme_setup' );

endif;

/*
 * post formats
 * */
function basictheme_post_formats() {

    if( has_post_format('audio') || has_post_format('video') ):
        get_template_part( 'template-parts/post/content','video' );
    elseif ( has_post_format('gallery') ):
        get_template_part( 'template-parts/post/content','gallery' );
    else:
        get_template_part( 'template-parts/post/content','image' );
    endif;

}

/*
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/tz-process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );
}

if ( ! function_exists( 'basictheme_check_rwmb_meta' ) ) {
    function basictheme_check_rwmb_meta( $basictheme_rwmb_metakey, $basictheme_opt_args = '', $basictheme_rwmb_post_id = null ) {
        return false;
    }
}

if ( did_action( 'elementor/loaded' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

/* Require Widgets */
foreach(glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $basictheme_file_widgets ) {
    require $basictheme_file_widgets;
}

if ( class_exists('Woocommerce') ) :
    /*
     * Required: Woocommerce
     */
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/woo-template-functions.php' );

endif;

/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'basictheme_widgets_init');

function basictheme_widgets_init() {

    $basictheme_widgets_arr  =   array(

        'basictheme-sidebar'    =>  array(
            'name'              =>  esc_html__( 'Sidebar', 'basictheme' ),
            'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'basictheme' )
        ),

        'basictheme-sidebar-wc' =>  array(
            'name'              =>  esc_html__( 'Sidebar Woocommerce', 'basictheme' ),
            'description'       =>  esc_html__( 'Display sidebar on page shop.', 'basictheme' )
        ),

        'basictheme-footer-1'   =>  array(
            'name'              =>  esc_html__( 'Footer 1', 'basictheme' ),
            'description'       =>  esc_html__('Display footer column 1 on all page.', 'basictheme' )
        ),

        'basictheme-footer-2'   =>  array(
            'name'              =>  esc_html__( 'Footer 2', 'basictheme' ),
            'description'       =>  esc_html__('Display footer column 2 on all page.', 'basictheme' )
        ),

        'basictheme-footer-3'   =>  array(
            'name'              =>  esc_html__( 'Footer 3', 'basictheme' ),
            'description'       =>  esc_html__('Display footer column 3 on all page.', 'basictheme' )
        ),

        'basictheme-footer-4'   =>  array(
            'name'              =>  esc_html__( 'Footer 4', 'basictheme' ),
            'description'       =>  esc_html__('Display footer column 4 on all page.', 'basictheme' )
        )

    );

    foreach ( $basictheme_widgets_arr as $basictheme_widgets_id => $basictheme_widgets_value ) :

        register_sidebar( array(
            'name'          =>  esc_attr( $basictheme_widgets_value['name'] ),
            'id'            =>  esc_attr( $basictheme_widgets_id ),
            'description'   =>  esc_attr( $basictheme_widgets_value['description'] ),
            'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
            'after_widget'  =>  '</section>',
            'before_title'  =>  '<h2 class="widget-title">',
            'after_title'   =>  '</h2>'
        ));

    endforeach;

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

// Load int
add_action( 'init', 'basictheme_init_load'  );
function basictheme_init_load() {

    /* Require HTML Compression */
    global $basictheme_options;
    $basictheme_minify_html =   $basictheme_options['basictheme_minify_html'];

    if ( $basictheme_minify_html == 1 ) :

        require get_parent_theme_file_path( '/extension/html-compression/wp-html-compression.php' );

    endif;

}

// Check deregister styles
add_action( 'wp_print_styles', 'logi_deregister_styles', 100 );
function logi_deregister_styles() {

    wp_deregister_style('font-awesome');

}

//Register Back-End script
add_action('admin_enqueue_scripts', 'basictheme_register_back_end_scripts');

function basictheme_register_back_end_scripts(){

    /* Start Get CSS Admin */
    wp_enqueue_style( 'basictheme-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action('wp_enqueue_scripts', 'basictheme_register_front_end');

function basictheme_register_front_end() {

    /*
    * Start Get Css Front End
    * */

    /* Start main Css */
    wp_enqueue_style( 'basictheme-main', get_theme_file_uri( '/css/main.css' ), array(), '' );
    /* End main Css */

    /*  Start Style Css   */
    wp_enqueue_style( 'basictheme-style', get_stylesheet_uri() );
    /*  Start Style Css   */

    /*
    * End Get Css Front End
    * */


    /*
    * Start Get Js Front End
    * */

    // Load the html5 shiv.
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', false, '', true );
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'basictheme-main', get_theme_file_uri( '/js/main.min.js' ), array('jquery'), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'basictheme-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

    /*
   * End Get Js Front End
   * */

}

/**
 * Show full editor
 */
if ( !function_exists('basictheme_ilc_mce_buttons') ) :

    function basictheme_ilc_mce_buttons( $basictheme_buttons_TinyMCE ) {

        array_push( $basictheme_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $basictheme_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "basictheme_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'basictheme_mce_text_sizes' ) ) :

    function basictheme_mce_text_sizes( $basictheme_font_size_text ){
        $basictheme_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $basictheme_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'basictheme_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function basictheme_comments( $basictheme_comment, $basictheme_comment_args, $basictheme_comment_depth ) {

    if ( 'div' === $basictheme_comment_args['style'] ) :

        $basictheme_comment_tag       = 'div';
        $basictheme_comment_add_below = 'comment';

    else :

        $basictheme_comment_tag       = 'li';
        $basictheme_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $basictheme_comment_tag ?> <?php comment_class( empty( $basictheme_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $basictheme_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $basictheme_comment_args['avatar_size'] != 0 ) echo get_avatar( $basictheme_comment, $basictheme_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $basictheme_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'basictheme' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'basictheme' ) ); ?>

            <?php comment_reply_link( array_merge( $basictheme_comment_args, array( 'add_below' => $basictheme_comment_add_below, 'depth' => $basictheme_comment_depth, 'max_depth' => $basictheme_comment_args['max_depth'] ) ) ); ?>

        </div>
        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $basictheme_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

if ( ! function_exists( 'basictheme_fonts_url' ) ) :

    function basictheme_fonts_url() {
        $basictheme_fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $basictheme_font_google = _x( 'on', 'Google font: on or off', 'basictheme' );

        if ( 'off' !== $basictheme_font_google ) {
            $basictheme_font_families = array();

            if ( 'off' !== $basictheme_font_google ) {
                $basictheme_font_families[] = 'Roboto:400,700';
            }

            $basictheme_query_args = array(
                'family' => urlencode( implode( '|', $basictheme_font_families ) ),
                'subset' => urlencode( 'latin' ),
            );

            $basictheme_fonts_url = add_query_arg( $basictheme_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $basictheme_fonts_url );
    }

endif;

/*
 * Content Nav
 */

if ( ! function_exists( 'basictheme_comment_nav' ) ) :

    function basictheme_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'basictheme' ); ?>
                </h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'basictheme' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'basictheme' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/*
 * TWITTER AMPERSAND ENTITY DECODE
 */
if( ! function_exists( 'basictheme_social_title' )):

    function basictheme_social_title( $basictheme_title ) {

        $basictheme_title = html_entity_decode( $basictheme_title );
        $basictheme_title = urlencode( $basictheme_title );

        return $basictheme_title;

    }

endif;

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_parent_theme_file_path( '/plugins/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'basictheme_register_required_plugins' );
function basictheme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $basictheme_plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Redux Framework',
            'slug'      =>  'redux-framework',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Meta Box',
            'slug'      =>  'meta-box',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Elementor',
            'slug'      =>  'elementor',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Woocommerce',
            'slug'      =>  'woocommerce',
            'required'  =>  true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $basictheme_config = array(
        'id'           => 'basictheme',          // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $basictheme_plugins, $basictheme_config );
}

/* Start Social Network */
function basictheme_get_social_url() {

    global $basictheme_options;
    $basictheme_social_networks = basictheme_get_social_network();

    foreach( $basictheme_social_networks as $basictheme_social ) :
        $basictheme_social_url = $basictheme_options['basictheme_social_network_' . $basictheme_social['id']];

        if( $basictheme_social_url ) :
?>

        <div class="social-network-item">
            <a href="<?php echo esc_url( $basictheme_social_url ); ?>">
                <i class="fa fa-<?php echo esc_attr( $basictheme_social['id'] ); ?>" aria-hidden="true"></i>
            </a>
        </div>


<?php
        endif;

    endforeach;
}

function basictheme_get_social_network() {
    return array(

        array('id' => 'facebook', 'title' => 'Facebook'),
        array('id' => 'twitter', 'title' => 'Twitter'),
        array('id' => 'google-plus', 'title' => 'Google Plus'),
        array('id' => 'linkedin', 'title' => 'linkedin'),
        array('id' => 'pinterest', 'title' => 'Pinterest'),
        array('id' => 'youtube', 'title' => 'Youtube'),
        array('id' => 'instagram', 'title' => 'instagram'),
        array('id' => 'vimeo', 'title' => 'Vimeo'),

    );
}
/* End Social Network */

/* Start pagination */
function basictheme_pagination() {

    the_posts_pagination( array(
        'type' => 'list',
        'mid_size' => 2,
        'prev_text' => esc_html__( 'Previous', 'basictheme' ),
        'next_text' => esc_html__( 'Next', 'basictheme' ),
        'screen_reader_text' => esc_html__( '&nbsp;', 'basictheme' ),
    ) );

}

// pagination nav query
function basictheme_paging_nav_query( $basictheme_querry ) {

    $basictheme_pagination_args  =   array(

        'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Previous', 'basictheme' ),
        'next_text' => esc_html__('Next', 'basictheme' ) . '<i class="fa fa-angle-double-right"></i>',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $basictheme_querry -> max_num_pages,
        'type'      => 'list',

    );

    $basictheme_paginate_links = paginate_links( $basictheme_pagination_args );

    if ( $basictheme_paginate_links ) :

    ?>
        <nav class="pagination">

            <?php echo $basictheme_paginate_links; ?>

        </nav>

    <?php

    endif;

}

/* End pagination */

// Sanitize Pagination
add_action('navigation_markup_template', 'basictheme_sanitize_pagination');
function basictheme_sanitize_pagination( $basictheme_content ) {
    // Remove role attribute
    $basictheme_content = str_replace('role="navigation"', '', $basictheme_content);

    // Remove h2 tag
    $basictheme_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $basictheme_content);

    return $basictheme_content;
}

/* Start Get col global */
function basictheme_col_use_sidebar( $option_sidebar, $active_sidebar ) {

    if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):
        $class_col_content = 'col-12 col-md-8 col-lg-9';
    else:
        $class_col_content = 'col-md-12';
    endif;

    return $class_col_content;
}

function basictheme_col_sidebar() {
    $class_col_sidebar = 'col-12 col-md-4 col-lg-3';

    return $class_col_sidebar;
}
/* End Get col global */
