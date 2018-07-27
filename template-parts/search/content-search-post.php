<?php
while (have_posts()) :
    the_post();

    $basictheme_post_type = get_post_type( get_the_ID() );

?>

    <div id='post-<?php the_ID(); ?>' <?php post_class(); ?>>

        <?php

        if ( $basictheme_post_type != 'page' ) :

            get_template_part( 'template-parts/post/content','info' );

            basictheme_post_formats();

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
endwhile;

wp_reset_postdata();
?>





