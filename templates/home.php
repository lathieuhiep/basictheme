<?php
/*
 Template Name: Home Page
 */

get_header();
?>

<div class="content-warp">
    <?php
    // include banner
    $opt_banner = paint_get_option('template_opt_home_banner', '');
    get_template_part( 'components/inc', 'banner', array('opt_banner' => $opt_banner) );

    // include our maxim
    get_template_part( 'components/inc', 'our-maxim' );

    // include banner 2
    $opt_banner_2 = paint_get_option('template_opt_home_banner_2', '');
    get_template_part( 'components/inc', 'banner', array('opt_banner' => $opt_banner_2) );

    // include products
    get_template_part( 'components/inc', 'products' );

    // include count up
    get_template_part( 'components/inc', 'count-up' );
    ?>
</div>

<?php
get_footer();
