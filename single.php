<?php
get_header();

global $basictheme_options;
$sidebar_position = $basictheme_options['basictheme_opt_single_post_sidebar'] ?? 'right';
$class_col_content = basictheme_col_use_sidebar( $sidebar_position, 'basictheme-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $class_col_content ); ?>">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>
            </div>

            <?php
            if ( $sidebar_position !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

