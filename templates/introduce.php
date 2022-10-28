<?php
/*
 Template Name: Introduce Page
 */

get_header();
?>

<div class="content-warp">
    <?php
    // include about
    get_template_part( 'template-parts/introduce/inc', 'about' );

    // include our maxim
    get_template_part( 'components/inc', 'our-maxim' );

    // include gallery
    get_template_part( 'template-parts/introduce/inc', 'gallery' );
    ?>
</div>

<?php
get_footer();
