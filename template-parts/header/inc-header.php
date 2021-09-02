<?php
global $basictheme_options;

$nav_top_sticky   =   $basictheme_options['basictheme_opt_nav_sticky'] ? : 1;
?>

<header id="home" class="site-header<?php echo esc_attr( $nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <?php get_template_part( 'template-parts/header/inc', 'nav' ); ?>
</header>