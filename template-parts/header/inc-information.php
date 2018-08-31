<?php
global $basictheme_options;

$basictheme_information_address   =   $basictheme_options['basictheme_information_address'];
$basictheme_information_mail      =   $basictheme_options['basictheme_information_mail'];
$basictheme_information_phone     =   $basictheme_options['basictheme_information_phone'];
?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $basictheme_information_address != '' ) : ?>

                    <span>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $basictheme_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $basictheme_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <?php echo esc_html( $basictheme_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $basictheme_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <?php echo esc_html( $basictheme_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php basictheme_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>