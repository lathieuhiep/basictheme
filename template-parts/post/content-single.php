<?php
global $basictheme_options;

$basictheme_opt_single_post_share = $basictheme_options['basictheme_opt_single_post_share'];
$basictheme_opt_single_related_show = $basictheme_options['basictheme_opt_single_related_show'];

$type_image = rwmb_meta( 'basictheme_meta_box_post_select_image' );
?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php
    if ( $type_image == 'featured_image' ) :
        get_template_part( 'template-parts/post/content', 'image' );
    else:
        get_template_part( 'template-parts/post/content', 'gallery' );
    endif;
     ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php basictheme_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            basictheme_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','basictheme');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','basictheme' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $basictheme_opt_single_post_share == 1 || $basictheme_opt_single_post_share == null ) :

        basictheme_post_share();

    endif;

    ?>
</div>

<?php
basictheme_comment_form();

if ( $basictheme_opt_single_related_show == 1 ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;





