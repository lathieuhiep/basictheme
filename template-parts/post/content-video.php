<?php

$basictheme_video = get_post_meta(  get_the_ID() , '_format_video_embed', true );

if ( $basictheme_video != '' ):

?>

    <div class="site-post-video">

        <?php if(wp_oembed_get( $basictheme_video )) : ?>

            <?php echo wp_oembed_get($basictheme_video); ?>

        <?php else : ?>

            <?php echo balanceTags($basictheme_video); ?>

        <?php endif; ?>

    </div>

<?php endif;?>