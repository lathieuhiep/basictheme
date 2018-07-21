
<?php
    global $basictheme_options;

    $basictheme_information_address   =   $basictheme_options['basictheme_information_address'];
    $basictheme_information_mail      =   $basictheme_options['basictheme_information_mail'];
    $basictheme_information_phone     =   $basictheme_options['basictheme_information_phone'];
    $basictheme_logotype              =   $basictheme_options['basictheme_type_logo'] == '' ? 'logo_image' : $basictheme_options['basictheme_type_logo'];

?>
<header id="home" class="header">
    <nav id="navigation" class="navbar-expand-lg">
        <div class="information">
            <div class="container">
                <div class="row">

                    <div class="col-md-7">

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

                    <div class="col-md-5">

                        <?php basictheme_get_social_url(); ?>

                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom_warp d-lg-flex align-items-center justify-content-lg-end">
                    <div class="site-logo">
                        <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">

                            <?php

                            if ( $basictheme_logotype == 'logo_image' ) :

                                $basictheme_img_url    =   $basictheme_options['basictheme_logo_images'];

                                if ( $basictheme_img_url['url'] != '' ) :

                                    echo'<img src="'.esc_url( $basictheme_img_url['url'] ).'" alt="'.get_bloginfo('title').'" />';
                                else :

                                    echo'<img src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';

                                endif;

                            else :

                                $basictheme_text = $basictheme_options['basictheme_logo_name'];

                                echo ('<span class="tz-logo-text">'.esc_html($basictheme_text).'</span>');

                            endif;

                            ?>

                        </a>

                        <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">

                        <?php

                        if ( has_nav_menu('primary') ) :

                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'navbar-nav',
                                'container'      => false,
                            ) ) ;

                        else:

                        ?>

                            <ul class="main-menu">
                                <li>
                                    <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                        <?php esc_html_e( 'ADD TO MENU','basictheme' ); ?>
                                    </a>
                                </li>
                            </ul>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>