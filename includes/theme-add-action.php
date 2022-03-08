<?php
add_action('wp_head', 'intellect_favicon', 1);

function intellect_favicon() {
    $favicon = get_theme_mod( 'basictheme_opt_favicon', '' );

    if ( empty( $favicon ) ) :
        $favicon = get_theme_file_uri('/assets/images/favicon.png' );
    endif;

    echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" sizes="16x16" />';
}
