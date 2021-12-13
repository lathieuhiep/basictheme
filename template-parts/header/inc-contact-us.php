<?php
global $basictheme_options;

$contact_us_show_hide = $basictheme_options['basictheme_opt_contact_us_show'] ?? true;

if ( $contact_us_show_hide ) :
$contact_us_address   =   $basictheme_options['basictheme_opt_contact_us_address'] ?? '988782, Our Street, S State';
$contact_us_mail      =   $basictheme_options['basictheme_opt_contact_us_mail'] ?? 'info@domain.com';
$contact_us_phone     =   $basictheme_options['basictheme_opt_contact_us_phone'] ?? '+1 234 567 186';

?>
<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                 <span>
                    <i class="fas fa-map-marker" aria-hidden="true"></i>
                    <?php echo esc_html( $contact_us_address ); ?>
                </span>

                <span>
                    <i class="fas fa-envelope"></i>
                    <?php echo esc_html( $contact_us_mail ); ?>
                </span>

                <span>
                    <i class="fas fa-mobile-alt"></i>
                    <?php echo esc_html( $contact_us_phone ); ?>
                </span>
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