<?php
$share_post = get_theme_mod('paint_opt_share_single_post', 'show');
$show_related = get_theme_mod('paint_opt_related_single_post', 'show');
?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php if ( has_post_thumbnail() ) :?>

        <div class="site-post-image">
            <?php the_post_thumbnail('full'); ?>
        </div>

    <?php endif; ?>

    <div class="site-post-content">
        <h2 class="title">
            <?php the_title(); ?>
        </h2>

        <div class="site-post-excerpt">
            <?php
            the_content();

            paint_link_page();
            ?>
        </div>
    </div>

    <?php
    if ( $share_post == 'show' ) :
        paint_post_share();
    endif;
    ?>
</div>

<?php
paint_comment_form();

if ( $show_related == 'show' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;





