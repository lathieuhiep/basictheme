<?php get_header(); ?>

<div class="site-tool-warp site-tool-cat site-has-breadcrumbs">
	<?php get_template_part( 'components/inc', 'banner', array('opt' => 'paint_opt_tool_banner') ); ?>

	<div class="container">
		<?php get_template_part( 'components/inc', 'breadcrumbs' ); ?>

        <div class="grid-warp <?php echo esc_attr( is_active_sidebar( 'paint-sidebar-tool' ) ? 'active-sidebar' : '' ); ?>">
	        <?php if ( is_active_sidebar( 'paint-sidebar-tool' ) ) : ?>
                <div class="sidebar">
			        <?php dynamic_sidebar( 'paint-sidebar-tool' ); ?>
                </div>
	        <?php
            endif;

	        get_template_part( 'template-parts/tool/inc', 'tax-tool' );
            ?>
        </div>
	</div>
</div>

<?php
get_footer();