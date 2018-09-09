<div class="site-post-content">
    <h2 class="site-post-title">
        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
            <?php if ( is_sticky() && is_home() ) : ?>
                <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            <?php
            endif;

            the_title();
            ?>
        </a>
    </h2>

    <?php basictheme_post_meta(); ?>

    <div class="site-post-excerpt">

        <?php

        if( ! has_excerpt()):

            the_content();

        else:

            the_excerpt();
        ?>

            <a href="<?php the_permalink();?>" class="text-read-more">
                <?php echo esc_html__('Read more','basictheme');?>
            </a>

        <?php
        endif;

        basictheme_link_page();
        ?>

    </div>
</div>