<?php
global $basictheme_options;

$basictheme_copyright = $basictheme_options ['basictheme_opt_footer_copyright_editor'] ?? 'Copyright &amp; DiepLK';
?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="bottom-warp">
            <div class="copyright">
                <?php echo wp_kses_post( $basictheme_copyright ); ?>
            </div>

            <div class="menu-footer">
                <nav>
                    <?php

                    if ( has_nav_menu( 'footer-menu' ) ) :

                        wp_nav_menu( array(
                            'theme_location'    => 'footer-menu',
                            'menu_class'        => 'menu-footer',
                            'container'         =>  false,
                        ));

                    else:

                    ?>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','basictheme' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif;?>
                </nav>
            </div>
        </div>
    </div>
</div>