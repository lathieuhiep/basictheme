<?php

namespace Elementor;

class basictheme_plugin_elementor_widgets {

    /**
     * Plugin constructor.
     */
    public function __construct() {

        $this->basictheme_elementor_add_actions();
    }

    function basictheme_elementor_add_actions() {

        add_action( 'elementor/elements/categories_registered', [ $this, 'basictheme_elementor_widget_categories' ] );

        add_action( 'elementor/widgets/widgets_registered', [ $this, 'basictheme_elementor_widgets_registered' ] );

        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'basictheme_elementor_script'] );

    }

    function basictheme_elementor_widget_categories() {

        Plugin::instance()->elements_manager->add_category(
            'basictheme_widgets',
            [
                'title' => esc_html__( 'Basic theme Widgets', 'basictheme' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

    function basictheme_elementor_widgets_registered() {
        foreach(glob( get_parent_theme_file_path( '/extension/elementor/widgets/*.php' ) ) as $file){
            require $file;
        }
    }

    function basictheme_elementor_script() {
        wp_register_script( 'basictheme-elementor-custom', get_theme_file_uri( '/js/elementor-custom.js' ), array(), '1.0.0', true );
    }

}

new basictheme_plugin_elementor_widgets();


/* Start get Category check box */
function basictheme_check_get_cat( $type_taxonomy ) {

    $cat_check    =   array();
    $category     =   get_terms(
        array(
            'taxonomy'      =>  $type_taxonomy,
            'hide_empty'    =>  false
        )
    );

    if ( isset( $category ) && !empty( $category ) ):

        foreach( $category as $item ) {

            $cat_check[$item->term_id]  =   $item->name;

        }

    endif;

    return $cat_check;

}
/* End get Category check box */