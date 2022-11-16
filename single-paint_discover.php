<?php get_header(); ?>

<div class="site-discover-warp site-single-discover site-has-breadcrumbs">
	<div class="container">
		<?php
        get_template_part( 'components/inc', 'breadcrumbs' );

		get_template_part( 'template-parts/discover/inc', 'search-form' );

		get_template_part( 'template-parts/discover/inc', 'detail' );
        ?>
	</div>

    <?php get_template_part( 'template-parts/discover/inc', 'related-post' ); ?>
</div>

<?php
get_footer();