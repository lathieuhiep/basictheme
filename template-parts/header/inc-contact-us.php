<?php
$show_contact_us = get_theme_mod('basictheme_opt_show_contact_us', 'show');

if ( $show_contact_us == 'show' ) :
    $address = get_theme_mod('basictheme_opt_address_contact_us', '');
    $mail = get_theme_mod('basictheme_opt_mail_contact_us', '');
    $phone = get_theme_mod('basictheme_opt_phone_contact_us', '');
?>

<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                 <span>
                    <i class="fas fa-map-marker" aria-hidden="true"></i>
                    <?php echo esc_html( $address ); ?>
                </span>

                <span>
                    <i class="fas fa-envelope"></i>
                    <?php echo esc_html( $mail ); ?>
                </span>

                <span>
                    <i class="fas fa-mobile-alt"></i>
                    <?php echo esc_html( $phone ); ?>
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