<?php
get_header();

global $basictheme_options;

$basictheme_blog_sidebar_single = !empty( $basictheme_options['basictheme_blog_sidebar_single'] ) ? $basictheme_options['basictheme_blog_sidebar_single'] : 'right';

$basictheme_class_col_content = basictheme_col_use_sidebar( $basictheme_blog_sidebar_single, 'basictheme-sidebar' );

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

                    $basictheme_comment_count  = wp_count_comments( get_the_ID() );

                ?>

                    <div class="site-post-single-item">

                        <?php

                        basictheme_post_formats();

                        get_template_part( 'template-parts/post/content','info' );

                        ?>
                    </div>

                <?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

                    <div class="site-author d-flex">
                            <div class="author-avata">
                                <?php echo get_avatar( get_the_author_meta('ID'),80); ?>
                            </div>
                            <div class="author-info">
                                <h3><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author();?></a></h3>
                                <p>
                                    <?php the_author_meta('description'); ?>
                                </p>
                            </div>
                        </div>

                <?php
                    endif;

                        if ( comments_open() || get_comments_number() ) :

                ?>

                        <div class="site-comments">
                            <?php comments_template( '', true ); ?>
                        </div>

                <?php
                        endif;

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

