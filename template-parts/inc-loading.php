<?php
global $basictheme_options;

$basictheme_show_loading = $basictheme_options['basictheme_opt_loading_show'] ?? '1';

if(  $basictheme_show_loading == 1 ) :

    $basictheme_loading_url  = $basictheme_options['basictheme_opt_loading_image']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $basictheme_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $basictheme_loading_url ); ?>" alt="<?php esc_attr_e('loading...','basictheme') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','basictheme') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>