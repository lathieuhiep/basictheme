<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--Include Loading Template-->
<?php
global $basictheme_options;
$backtotop = $basictheme_options ['basictheme_opt_backtotop_show'] ?? true;

get_template_part('template-parts/inc','loading');
get_template_part('template-parts/header/inc','header');
?>
<!--End Loading Template-->

<?php if ( $backtotop ) :?>
    <div id="back-top">
        <a href="#">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    <!--End back top top-->
<?php endif; ?>
<!--Start back top top-->


<!--Start Sticky Footer-->
<div class="sticky-footer">


