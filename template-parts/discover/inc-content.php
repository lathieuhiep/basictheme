<div class="site-discover-warp site-discover-cat site-has-breadcrumbs">
	<div class="container">
		<?php
        get_template_part( 'components/inc', 'breadcrumbs' );
		get_template_part( 'template-parts/discover/inc', 'search-form' );
        ?>
	</div>

    <div class="content-warp">
        <?php if ( have_posts() ) : ?>
        <div class="grid-discover">
            <?php
            while ( have_posts() ) :
            the_post();

            get_template_part('template-parts/discover/inc', 'render-item');

            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
</div>