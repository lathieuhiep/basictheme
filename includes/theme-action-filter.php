<?php
// Setup Theme
add_action( 'after_setup_theme', 'paint_setup' );
function paint_setup(): void {
	// Set the content width based on the theme's design and stylesheet.
	global $content_width;

	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'paint', get_parent_theme_file_path( '/languages' ) );

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
			'primary'   => esc_html__('Primary Menu', 'paint'),
			'footer-menu' => esc_html__('Footer Menu', 'paint'),
		)
	);

	// add theme support title-tag
	add_theme_support( 'title-tag' );
}

// Walker for the main menu
add_filter( 'walker_nav_menu_start_el', 'paint_add_arrow',10,4);
function paint_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

// add favicon
add_action('wp_head', 'paint_favicon', 1);
function paint_favicon(): void {
	$favicon = get_theme_mod( 'paint_opt_favicon', '' );

	if ( empty( $favicon ) ) :
		$favicon = get_theme_file_uri('/assets/images/favicon.png' );
	endif;

	echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" sizes="16x16" />';
}

// Sanitize Pagination
add_action( 'navigation_markup_template', 'paint_sanitize_pagination' );
function paint_sanitize_pagination( $paint_content ): string {
	// Remove role attribute
	$paint_content = str_replace( 'role="navigation"', '', $paint_content );

	// Remove h2 tag
	return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $paint_content );
}

// Opengraph
add_action( 'wp_head', 'paint_opengraph', 5 );
function paint_opengraph(): void {
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
add_action( 'pre_get_posts', 'paint_include_custom_post_types_in_search_results' );
function paint_include_custom_post_types_in_search_results( $query ): void {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}