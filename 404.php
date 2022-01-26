<?php
get_header();

global $basictheme_options;

$title = $basictheme_options['basictheme_opt_404_title'];
$content = $basictheme_options['basictheme_opt_404_editor'];
$background = $basictheme_options['basictheme_opt_404_background']['id'];
?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $background ) ):
                        echo wp_get_attachment_image( $background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/assets/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $title != '' ):
                        echo esc_html( $title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'basictheme' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $content != '' ) :
                        echo wp_kses_post( $content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'basictheme' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'basictheme' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'basictheme' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'basictheme'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'basictheme'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>