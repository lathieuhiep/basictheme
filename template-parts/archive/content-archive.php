<?php

global $basictheme_options;

$basictheme_blog_sidebar_archive    =   !empty( $basictheme_options['basictheme_blog_sidebar_archive'] ) ? $basictheme_options['basictheme_blog_sidebar_archive'] : 'right';
$basictheme_class_col_content       =   basictheme_col_use_sidebar( $basictheme_blog_sidebar_archive, 'basictheme-sidebar-main' );
$basictheme_blog_per_row            =   $basictheme_options['basictheme_blog_per_row'];

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $basictheme_class_col_content ); ?>">
                <div class="site-post-content">

                    <?php if ( have_posts() ) : ?>

                        <div class="row">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" class="site-post-item col-12 col-md-6 col-lg-<?php echo esc_attr( 12 / $basictheme_blog_per_row ); ?>">
                                    <?php
                                        if ( ! is_search() ):
                                            get_template_part( 'template-parts/archive/content', 'archive-info' );
                                        else:
                                            get_template_part( 'template-parts/search/content', 'search-post' );
                                        endif;
                                    ?>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                    <?php

                    else:

                        if ( is_search() ) :
                            get_template_part( 'template-parts/search/content', 'search-no-data' );
                        endif;

                    endif; // end if ( have_posts )
                    ?>
                </div>

                <?php basictheme_pagination(); ?>
            </div>

            <?php
            if ( $basictheme_blog_sidebar_archive !== 'hide' ) :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>