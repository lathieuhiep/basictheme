<?php
global $basictheme_options;

$contact_us_show_hide = $basictheme_options['basictheme_opt_contact_us_show_hide'];

if ( $contact_us_show_hide == 1 ) :

$contact_us_address   =   $basictheme_options['basictheme_opt_contact_us_address'];
$contact_us_mail      =   $basictheme_options['basictheme_opt_contact_us_mail'];
$contact_us_phone     =   $basictheme_options['basictheme_opt_contact_us_phone'];

?>

<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $contact_us_address != '' ) : ?>

                    <span>
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $contact_us_address ); ?>
                    </span>

                <?php
                endif;

                if ( $contact_us_mail != '' ) :
                ?>

                    <span>
                        <i class="fas fa-envelope"></i>
                        <?php echo esc_html( $contact_us_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $contact_us_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $contact_us_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="contact-us__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php basictheme_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;