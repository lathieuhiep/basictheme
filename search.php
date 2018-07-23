<?php
get_header();

global $basictheme_options;

$basictheme_blog_sidebar_search = !empty( $basictheme_options['basictheme_blog_sidebar_search'] ) ? $basictheme_options['basictheme_blog_sidebar_search'] : 'right';

if ( ( $basictheme_blog_sidebar_search == 'left' || $basictheme_blog_sidebar_search == 'right' ) && is_active_sidebar( 'basictheme-sidebar' ) ):

    $basictheme_col_class_blog = 'col-md-9';

else:

    $basictheme_col_class_blog = 'col-md-12';

endif;

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">

            <?php
            if ( $basictheme_blog_sidebar_search == 'left' ) :
                get_sidebar();
            endif;
            ?>

            <div class="<?php echo esc_attr( $basictheme_col_class_blog ); ?>">
                <?php

                if ( have_posts() ) : while (have_posts()) : the_post();

                    $basictheme_post_type        =   get_post_type( get_the_ID() );
                    $basictheme_comment_count    =   wp_count_comments( get_the_ID() );

                ?>

                    <div id='post-<?php the_ID(); ?>' <?php post_class(); ?>>

                        <?php

                        if ( $basictheme_post_type != 'page' ) :

                            get_template_part( 'template-parts/post/content','info' );

                            if( has_post_format('audio') || has_post_format('video') ):
                                get_template_part( 'template-parts/post/content','video' );
                            else:
                                get_template_part( 'template-parts/post/content','gallery' );
                            endif;

                        else:

                        ?>

                            <h2 class="site-post-title">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                        <?php endif; ?>

                    </div>

                <?php

                    endwhile; // end while ( have_posts )
                else:

                ?>

                    <div class="site-serach-no-data">
                        <h3>
                            <?php  esc_html_e('No Data', 'basictheme');?>
                        </h3>

                        <div class="page-content">

                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                                <p>
                                    <?php printf(  esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'basictheme' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
                                </p>

                            <?php elseif ( is_search() ) : ?>

                                <p>
                                    <?php  esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'basictheme' ); ?>
                                </p>

                                <?php get_search_form(); ?>

                            <?php else : ?>

                                <p>
                                    <?php  esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'basictheme' ); ?>
                                </p>
                                <?php get_search_form(); ?>

                            <?php endif; ?>

                        </div><!-- .page-content -->
                    </div>

                <?php

                    basictheme_pagination();
                endif; // end if ( have_posts )

                ?>

            </div>

            <?php if ( $basictheme_blog_sidebar_search == 'right' ) :
                get_sidebar();
            endif;
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>

