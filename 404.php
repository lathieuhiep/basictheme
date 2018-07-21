<?php

get_header();
global $basictheme_options;

$basictheme_title      = $basictheme_options['basictheme_404_title'];
$basictheme_content    = $basictheme_options['basictheme_404_editor'];
$basictheme_background = $basictheme_options['basictheme_404_background'];

?>

<div class="site-error">
    <div class="container">

        <?php if ( $basictheme_title != '' ): ?>

            <h1 class="site-title-404">
                <?php echo esc_html( $basictheme_title ); ?>
            </h1>

        <?php endif; ?>

        <?php if ( $basictheme_content != '' ) : ?>

            <div id="site-error-box-header">
                <?php echo balanceTags( $basictheme_content, true ); ?>
            </div>

        <?php endif; ?>

        <div id="site-error-box-body">
            <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'basictheme'); ?>">
                <?php esc_html_e('Go to the Home Page', 'basictheme'); ?>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>