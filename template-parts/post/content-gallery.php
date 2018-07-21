<?php

$basictheme_gallery = get_post_meta(  get_the_ID() , '_format_gallery_images', true );

if( $basictheme_gallery != '' ) :

?>

    <div class="site-post-slides owl-carousel owl-theme">

            <?php

            foreach($basictheme_gallery as $basictheme_image) :

                $basictheme_image_src = wp_get_attachment_image_src( $basictheme_image, 'full-thumb' );

                $basictheme_caption = get_post_field('post_excerpt', $basictheme_image);
            ?>

                <div class="site-post-slides__item">

                    <img src="<?php echo esc_url($basictheme_image_src[0]); ?>" <?php echo ( $basictheme_caption != '' ? 'title="' . esc_attr( $basictheme_caption ) . '"' : '' ); ?> alt="<?php echo sanitize_title(get_the_title())?>"/>
                </div>

            <?php endforeach; ?>

    </div>

<?php endif; ?>