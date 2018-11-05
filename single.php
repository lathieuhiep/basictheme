<?php
get_header();

global $basictheme_options;

$basictheme_blog_sidebar_single = !empty( $basictheme_options['basictheme_blog_sidebar_single'] ) ? $basictheme_options['basictheme_blog_sidebar_single'] : 'right';

$basictheme_class_col_content = basictheme_col_use_sidebar( $basictheme_blog_sidebar_single, 'basictheme-sidebar-main' );

?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">

            <?php

            if( $basictheme_blog_sidebar_single == 'left' ):
                get_sidebar();
            endif;

            ?>

            <div class="<?php echo esc_attr( $basictheme_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php

            if( $basictheme_blog_sidebar_single == 'right' ):
                get_sidebar();
            endif;

            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>

