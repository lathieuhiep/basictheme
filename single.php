<?php
get_header();

global $basictheme_options;

$basictheme_opt_single_post_sidebar = $basictheme_options['basictheme_opt_single_post_sidebar'] ? : 'right';

$basictheme_class_col_content = basictheme_col_use_sidebar( $basictheme_opt_single_post_sidebar, 'basictheme-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $basictheme_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $basictheme_opt_single_post_sidebar !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

