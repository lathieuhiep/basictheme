<?php

global $basictheme_options;

$basictheme_blog_sidebar_archive = !empty( $basictheme_options['basictheme_blog_sidebar_archive'] ) ? $basictheme_options['basictheme_blog_sidebar_archive'] : 'right';

if ( ( $basictheme_blog_sidebar_archive == 'left' || $basictheme_blog_sidebar_archive == 'right' ) && is_active_sidebar( 'basictheme-sidebar' ) ):

    $basictheme_col_class_blog = 'col-md-9';

else:

    $basictheme_col_class_blog = 'col-md-12';

endif;

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <?php
            if ( $basictheme_blog_sidebar_archive == 'left' ) :
                get_sidebar();
            endif;
            ?>

            <div class="<?php echo esc_attr( $basictheme_col_class_blog ); ?>">

                <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                    <div id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
                        <?php

                        get_template_part( 'template-parts/post/content','info' );

                        if( has_post_format('audio') || has_post_format('video') ):
                            get_template_part( 'template-parts/post/content','video' );
                        else:
                            get_template_part( 'template-parts/post/content','gallery' );
                        endif;

                        ?>
                    </div>

                <?php

                endwhile;

                    basictheme_pagination();

                endif;

                ?>

            </div>

            <?php if ( $basictheme_blog_sidebar_archive == 'right' ) :
                get_sidebar();
            endif;
            ?>

        </div>
    </div>
</div>