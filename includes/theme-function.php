<?php
// Callback Comment List
function paint_comments( $paint_comment, $paint_comment_args, $paint_comment_depth ): void {

	if ( 'div' === $paint_comment_args['style'] ) :

		$paint_comment_tag       = 'div';
		$paint_comment_add_below = 'comment';

	else :

		$paint_comment_tag       = 'li';
		$paint_comment_add_below = 'div-comment';

	endif;

	?>
	<<?php echo $paint_comment_tag ?><?php comment_class( empty( $paint_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $paint_comment_args['style'] ) : ?>

		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">

	<?php endif; ?>

	<div class="comment-author vcard">
		<?php if ( $paint_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $paint_comment, $paint_comment_args['avatar_size'] );
		} ?>

	</div>

	<?php if ( $paint_comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'paint' ); ?>
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

			<?php edit_comment_link( esc_html__( 'Edit ', 'paint' ) ); ?>

			<?php comment_reply_link( array_merge( $paint_comment_args, array(
				'add_below' => $paint_comment_add_below,
				'depth'     => $paint_comment_depth,
				'max_depth' => $paint_comment_args['max_depth']
			) ) ); ?>

		</div>

		<div class="comment-text-box">
			<?php comment_text(); ?>
		</div>
	</div>

	<?php if ( 'div' != $paint_comment_args['style'] ) : ?>
		</div>
	<?php endif; ?>

	<?php
}

// Content Nav
function paint_comment_nav(): void {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

		?>
        <nav class="navigation comment-navigation">
            <h2 class="screen-reader-text">
				<?php esc_html_e( 'Comment navigation', 'paint' ); ?>
            </h2>

            <div class="nav-links">
				<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'paint' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'paint' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
				?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->

	<?php
	endif;
}

// Social Network
function paint_get_social_url(): void {
	$opt_social_networks = paint_get_option('paint_opt_social_network', '');

	foreach ( $opt_social_networks as $item ) :
		$link = $item['link'];

		if ( !empty( $link['url'] ) ) :
        ?>
			<div class="social-network-item">
				<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" title="<?php echo esc_attr( $link['text'] ); ?>">
					<i class="<?php echo $item['icon']; ?>"></i>
				</a>
			</div>
		<?php
		endif;
	endforeach;
}

// Pagination
function paint_pagination(): void {
	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'paint' ),
		'next_text'          => esc_html__( 'Next', 'paint' ),
		'screen_reader_text' => '&nbsp;',
	) );
}

// Pagination Nav Query
function paint_paging_nav_query( $query ): void {
	$args = array(
		'prev_text' => '<i class="fa-solid fa-left-long"></i>',
		'next_text' => '<i class="fa-solid fa-right-long"></i>',
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

// Get col global
function paint_col_use_sidebar( $option_sidebar, $active_sidebar ): string
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

function paint_col_sidebar(): string
{
	return 'col-12 col-md-4 col-lg-3';
}

// Post Meta
function paint_post_meta(): void {
	?>

	<div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'paint' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

		<span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'paint' );
            the_date(); ?>
        </span>

		<span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'paint' ), '1 ' . esc_html__( 'Comment', 'paint' ), '% ' . esc_html__( 'Comments', 'paint' ) );
            ?>
        </span>
	</div>

	<?php
}

// Link Pages
function paint_link_page(): void {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'paint' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

// Comment
function paint_comment_form(): void {

	if ( comments_open() || get_comments_number() ) :
		?>
		<div class="site-comments">
			<?php comments_template( '', true ); ?>
		</div>
	<?php
	endif;
}

// Get Category Check Box
function paint_check_get_cat( $type_taxonomy ): array
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
			$cat_check[ $item->term_id ] = $item->name . ' ('. $item->count .')';
		}
	endif;

	return $cat_check;
}

// Share Facebook
function paint_post_share(): void {

	?>
	<div class="site-post-share">
		<iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
	</div>
	<?php

}

// Get Contact Form 7
function paint_get_form_cf7(): array {
	$options = array();

	if ( function_exists('wpcf7') ) {

		$wpcf7_form_list = get_posts( array(
			'post_type' => 'wpcf7_contact_form',
			'numberposts' => -1,
		) );

		$options[0] = esc_html__('Select a Contact Form', 'paint');

		if ( !empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list) ) :
			foreach ( $wpcf7_form_list as $item ) :
				$options[$item->ID] = $item->post_title;
			endforeach;
		else :
			$options[0] = esc_html__('Create a Form First', 'paint');
		endif;

	}

	return $options;
}