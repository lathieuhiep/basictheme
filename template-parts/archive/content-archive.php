<?php

global $basictheme_options;

$basictheme_blog_sidebar_archive = !empty( $basictheme_options['basictheme_blog_sidebar_archive'] ) ? $basictheme_options['basictheme_blog_sidebar_archive'] : 'right';

$basictheme_class_col_content = basictheme_col_use_sidebar( $basictheme_blog_sidebar_archive, 'basictheme-sidebar' );

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <?php
            if ( $basictheme_blog_sidebar_archive == 'left' ) :
                get_sidebar();
            endif;
            ?>

            <div class="<?php echo esc_attr( $basictheme_class_col_content ); ?>">
                <?php
                if ( have_posts() ) :

                    if ( ! is_search() ):
                        get_template_part( 'template-parts/archive/content', 'archive-post' );
                    else:
                        get_template_part( 'template-parts/search/content', 'search-post' );
                    endif;

                    basictheme_pagination();

                else:

                    if ( is_search() ) :
                        get_template_part( 'template-parts/search/content', 'search-no-data' );
                    endif;

                endif; // end if ( have_posts )
                ?>
            </div>

            <?php if ( $basictheme_blog_sidebar_archive == 'right' ) :
                get_sidebar();
            endif;
            ?>

        </div>
    </div>
</div>