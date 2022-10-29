<?php
get_header();
?>

<div class="site-container site-single-project element-background-image">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="breadcrumbs-title">
			<div class="left-box">
				<?php get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' ); ?>
			</div>

			<div class="right-box">
				<h1 class="title">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>

		<div class="entry-content">
			<div class="post-image">
				<div class="post-image__feature">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>

			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>

		<?php endwhile; ?>
	</div>
</div>
<?php
get_footer();