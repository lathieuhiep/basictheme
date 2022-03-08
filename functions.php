<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup Theme
if ( ! function_exists( 'basictheme_setup' ) ):

	function basictheme_setup() {
		// Set the content width based on the theme's design and stylesheet.
		global $content_width;

		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

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
		add_theme_support( 'custom-header' );

		add_theme_support( 'custom-background' );

		//Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'primary'   => esc_html__('Primary Menu', 'basictheme'),
                'footer-menu' => esc_html__('Footer Menu', 'basictheme'),
            )
        );

        // add theme support title-tag
		add_theme_support( 'title-tag' );
	}

	add_action( 'after_setup_theme', 'basictheme_setup' );

endif;

// Required: Plugin Activation
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

// Required: theme add_action
require get_parent_theme_file_path( '/includes/theme-add-action.php' );

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
foreach ( glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $basictheme_file_widgets ) {
	require $basictheme_file_widgets;
}

// Require Woocommerce
if ( class_exists( 'Woocommerce' ) ) :
    require get_parent_theme_file_path( '/extension/woocommerce/woo-scripts.php' );
	require get_parent_theme_file_path( '/extension/woocommerce/woo-quick-view.php' );
	require get_parent_theme_file_path( '/extension/woocommerce/woo-template-hooks.php' );
	require get_parent_theme_file_path( '/extension/woocommerce/woo-template-functions.php' );
endif;

// Require Register Sidebar
require get_parent_theme_file_path( '/includes/register-sidebar.php' );

// Require Theme Scripts
require get_parent_theme_file_path( '/includes/theme-scripts.php' );

// Walker for the main menu
add_filter( 'walker_nav_menu_start_el', 'basictheme_add_arrow',10,4);
function basictheme_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

// Callback Comment List
function basictheme_comments( $basictheme_comment, $basictheme_comment_args, $basictheme_comment_depth ) {

	if ( 'div' === $basictheme_comment_args['style'] ) :

		$basictheme_comment_tag       = 'div';
		$basictheme_comment_add_below = 'comment';

	else :

		$basictheme_comment_tag       = 'li';
		$basictheme_comment_add_below = 'div-comment';

	endif;

	?>
    <<?php echo $basictheme_comment_tag ?><?php comment_class( empty( $basictheme_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $basictheme_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

    <div class="comment-author vcard">
		<?php if ( $basictheme_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $basictheme_comment, $basictheme_comment_args['avatar_size'] );
		} ?>

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

			<?php comment_reply_link( array_merge( $basictheme_comment_args, array(
				'add_below' => $basictheme_comment_add_below,
				'depth'     => $basictheme_comment_depth,
				'max_depth' => $basictheme_comment_args['max_depth']
			) ) ); ?>

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

// Content Nav
if ( ! function_exists( 'basictheme_comment_nav' ) ) :

	function basictheme_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
					<?php esc_html_e( 'Comment navigation', 'basictheme' ); ?>
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

// Social Network
function basictheme_get_social_url() {
	$social_networks = basictheme_get_social_network();

	foreach ( $social_networks as $item ) :
		$social_url = get_theme_mod('basictheme_opt_url_social_' . $item['id'], '#');
		if ( $social_url ) :
    ?>
        <div class="social-network-item item-<?php echo esc_attr( $item['id'] ); ?>">
            <a href="<?php echo esc_url( $social_url ); ?>">
                <i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
            </a>
        </div>
    <?php
		endif;
	endforeach;
}

function basictheme_get_social_network(): array
{
	return array(
		array( 'id' => 'facebook', 'icon' => 'fab fa-facebook-f' ),
		array( 'id' => 'youtube', 'icon' => 'fab fa-youtube' ),
		array( 'id' => 'twitter', 'icon' => 'fab fa-twitter' ),
		array( 'id' => 'instagram', 'icon' => 'fab fa-instagram' ),
	);
}

// Pagination
function basictheme_pagination() {
	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'basictheme' ),
		'next_text'          => esc_html__( 'Next', 'basictheme' ),
		'screen_reader_text' => '&nbsp;',
	) );
}

// Pagination Nav Query
function basictheme_paging_nav_query( $query ) {

	$args = array(
		'prev_text' => esc_html__( ' Previous', 'basictheme' ),
		'next_text' => esc_html__( 'Next', 'basictheme' ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages,
		'type'      => 'list',
	);

	$paginate_links = paginate_links( $args );

	if ( $paginate_links ) :

		?>
        <nav class="pagination">
			<?php echo $paginate_links; ?>
        </nav>

	<?php

	endif;
}

// Sanitize Pagination
add_action( 'navigation_markup_template', 'basictheme_sanitize_pagination' );
function basictheme_sanitize_pagination( $basictheme_content ) {
	// Remove role attribute
	$basictheme_content = str_replace( 'role="navigation"', '', $basictheme_content );

	// Remove h2 tag
    return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $basictheme_content );
}

// Get col global
function basictheme_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{

	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function basictheme_col_sidebar(): string
{
    return 'col-12 col-md-4 col-lg-3';
}

// Post Meta
function basictheme_post_meta() {
	?>

    <div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'basictheme' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

        <span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'basictheme' );
            the_date(); ?>
        </span>

        <span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'basictheme' ), '1 ' . esc_html__( 'Comment', 'basictheme' ), '% ' . esc_html__( 'Comments', 'basictheme' ) );
            ?>
        </span>
    </div>

	<?php
}

// Link Pages
function basictheme_link_page() {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'basictheme' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

// Comment
function basictheme_comment_form() {

	if ( comments_open() || get_comments_number() ) :
		?>
        <div class="site-comments">
			<?php comments_template( '', true ); ?>
        </div>
	<?php
	endif;
}

// Get Category Check Box
function basictheme_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

// Share Facebook
function basictheme_post_share() {

	?>
    <div class="site-post-share">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
	<?php

}

// Opengraph
add_action( 'wp_head', 'basictheme_opengraph', 5 );
function basictheme_opengraph() {
	global $post;

	if ( is_single() ) :

		if ( has_post_thumbnail( $post->ID ) ) :
			$img_src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		else :
			$img_src = get_theme_file_uri( '/images/no-image.png' );
		endif;

        $excerpt = $post->post_excerpt;

		if ( $excerpt ) :
			$excerpt = strip_tags( $post->post_excerpt );
			$excerpt = str_replace( "", "'", $excerpt );
		else :
			$excerpt = get_bloginfo( 'description' );
		endif;

    ?>
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $excerpt ); ?>" />
        <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>" />
	<?php

	else :
		return;
	endif;
}

// Custom Search Post
function basictheme_include_custom_post_types_in_search_results( $query ) {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'basictheme_include_custom_post_types_in_search_results' );

// Get Contact Form 7
function basictheme_get_form_cf7(): array {
    $options = array();

    if ( function_exists('wpcf7') ) {

	    $wpcf7_form_list = get_posts( array(
            'post_type' => 'wpcf7_contact_form',
		    'numberposts' => -1,
        ) );

	    $options[0] = esc_html__('Select a Contact Form', 'basictheme');

	    if ( !empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list) ) :
		    foreach ( $wpcf7_form_list as $item ) :
			    $options[$item->ID] = $item->post_title;
		    endforeach;
	    else :
		    $options[0] = esc_html__('Create a Form First', 'basictheme');
	    endif;

    }

    return $options;
}