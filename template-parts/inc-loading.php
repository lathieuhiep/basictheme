<?php
$show_loading = get_theme_mod( 'paint_opt_show_loading', 'off' );

if(  $show_loading == 'on' ) :
    $image_url  = get_theme_mod( 'paint_opt_image_loading', '' );
?>
    <div id="site-loadding" class="d-flex align-items-center justify-content-center">
        <?php  if( $image_url != '' ): ?>
            <img class="loading_img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e('loading...','paint') ?>"  >
        <?php else: ?>
            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','paint') ?>">
        <?php endif; ?>
    </div>
<?php endif; ?>