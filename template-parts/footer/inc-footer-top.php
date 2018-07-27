<?php
//Global variable redux
global $basictheme_options;

$basictheme_footer_col     =   $basictheme_options ["basictheme_footer_column_col"];
$basictheme_footer_widthl  =   $basictheme_options ["basictheme_footer_column_w1"];
$basictheme_footer_width2  =   $basictheme_options ["basictheme_footer_column_w2"];
$basictheme_footer_width3  =   $basictheme_options ["basictheme_footer_column_w3"];
$basictheme_footer_width4  =   $basictheme_options ["basictheme_footer_column_w4"];

if( is_active_sidebar( 'basictheme-footer-1' ) || is_active_sidebar( 'basictheme-footer-2' ) || is_active_sidebar( 'basictheme-footer-3' ) || is_active_sidebar( 'basictheme-footer-4' ) ) :

?>

    <div class="site-footer__top">
        <div class="container">
            <div class="row">
                <?php
                for( $basictheme_i = 0; $basictheme_i < $basictheme_footer_col; $basictheme_i++ ):

                    $basictheme_j = $basictheme_i +1;

                    if ( $basictheme_i == 0 ) :
                        $basictheme_col = $basictheme_footer_widthl;
                    elseif ( $basictheme_i == 1 ) :
                        $basictheme_col = $basictheme_footer_width2;
                    elseif ( $basictheme_i == 2 ) :
                        $basictheme_col = $basictheme_footer_width3;
                    else :
                        $basictheme_col = $basictheme_footer_width4;
                    endif;

                    if( is_active_sidebar( 'basictheme-footer-'.$basictheme_j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $basictheme_col ); ?>">

                        <?php dynamic_sidebar( 'basictheme-footer-'.$basictheme_j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>