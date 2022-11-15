<?php get_header(); ?>

	<div class="site-project-cat site-has-breadcrumbs">
		<div class="container">
			<?php
			get_template_part( 'components/inc', 'breadcrumbs' );

			if ( have_posts() ) :
			?>
				<div class="entry-pots">
					<div class="project-grid">
						<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
							<?php while ( have_posts() ) : the_post(); ?>
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
							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php

get_footer();