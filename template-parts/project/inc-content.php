<?php
$opt_limit = paint_get_option( 'template_project_opt_limit', 12 );
$opt_order_by = paint_get_option( 'template_project_opt_order_by', 'id' );
$opt_order = paint_get_option( 'template_project_opt_order', 'ASC' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query
$args = array(
	'post_type'             =>  'paint_project',
	'posts_per_page'        =>  $opt_limit,
	'orderby'               =>  $opt_order_by,
	'order'                 =>  $opt_order,
	'paged'                 => $paged,
	'ignore_sticky_posts'   =>  1,
);

$query = new WP_Query( $args );
?>

<div class="content-warp project-warp element-spacer">
	<div class="container">
		<div class="breadcrumbs-title">
			<div class="left-box">
				<?php get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' ); ?>
			</div>

			<div class="right-box">
				<h1 class="title">
					<?php echo get_the_title(); ?>
				</h1>
			</div>
		</div>

		<?php if ( $query->have_posts() ) : ?>

			<div class="project-content project-grid">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
						<div class="col item">
							<div class="thumbnail">
								<a class="link-image" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('large'); ?>
								</a>

								<h2 class="title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title() ?>
									</a>
								</h2>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>

			<?php
			paint_paging_nav_query( $query );
			wp_reset_postdata();
		endif;
		?>
	</div>
</div>
