<?php
/*
 Template Name: Home Page
 */

get_header();
?>

<div class="content-warp">
    <?php
    // include banner
    $opt_banner = paint_get_option('template_home_opt_banner_1', '');
    get_template_part( 'components/inc', 'banner', array('opt_banner' => $opt_banner) );

    // include our maxim
    get_template_part( 'components/inc', 'our-maxim' );

    // include banner 2
    $opt_banner_2 = paint_get_option('template_home_opt_banner_2', '');
    get_template_part( 'components/inc', 'banner', array('opt_banner' => $opt_banner_2) );

    // include products
    get_template_part( 'components/inc', 'products' );

    // include count up
    get_template_part( 'components/inc', 'count-up' );

    // include project
    get_template_part( 'components/inc', 'project' );

    // include services
    get_template_part( 'components/inc', 'services' );

    // include testimonial
    get_template_part( 'components/inc', 'testimonial' );
    ?>
</div>

<?php
get_footer();
