<?php
get_header();

$s = $_GET['s'];
$cat = $_GET['cat'];

$tax_query = array();
if ( !empty( $cat ) ) {
	$tax_query = array(
		array(
			'taxonomy' => 'paint_discover_cat',
			'field'    => 'slug',
			'terms'    => $cat
		),
	);
}

$args = array(
	'post_type' => 'paint_discover',
	'posts_per_page' => 30,
	'ignore_sticky_posts'   =>  1,
	's' => $s,
	'tax_query' => $tax_query
);

$query = new WP_Query( $args );
?>

<div class="site-result-discover site-discover-warp site-has-breadcrumbs">
	<div class="container">
		<?php
		get_template_part( 'components/inc', 'breadcrumbs' );
		get_template_part( 'template-parts/discover/inc', 'search-form' );
		?>

        <header class="heading">
            <h1 class="page-title">
				<?php _e( 'Tìm kiếm cho', 'paint' ); ?>: "<?php the_search_query(); ?>"
            </h1>
        </header>
	</div>

	<div class="result-discover-warp content-warp">
		<?php if ( $query->have_posts() ) : ?>
            <div class="grid-discover">
				<?php
				while ($query->have_posts()) :
					$query->the_post();

					get_template_part('template-parts/discover/inc', 'render-item');

				endwhile;
				wp_reset_postdata();
				?>
            </div>
        <?php endif; ?>
	</div>
</div>

<?php
get_footer();