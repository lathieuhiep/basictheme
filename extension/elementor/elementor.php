<?php

namespace Elementor;

class basictheme_plugin_elementor_widgets {

    /**
     * Plugin constructor.
     */
    public function __construct() {
        $this->basictheme_elementor_add_actions();
    }

    private function basictheme_elementor_add_actions() {

        add_action( 'elementor/widgets/widgets_registered', [ $this, 'basictheme_elementor_widgets_registered' ] );
        add_action( 'elementor/init', [ $this, 'basictheme_elementor_widgets_int' ] );

        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'basictheme_elementor_script'] );

    }

    public function basictheme_elementor_widgets_registered() {
        $this->basictheme_elementor_includes();
    }

    public function basictheme_elementor_widgets_int() {
        $this->basictheme_elementor_register_widget();
    }

    public function basictheme_elementor_script() {
        wp_register_script( 'basictheme-elementor-custom', get_theme_file_uri( '/js/elementor-custom.js' ), array(), '1.0.0', true );
    }

    private function basictheme_elementor_includes() {
        foreach(glob( get_parent_theme_file_path( '/extension/elementor/widgets/*.php' ) ) as $file){
            require $file;
        }
    }

    private function basictheme_elementor_register_widget() {

        Plugin::instance()->elements_manager->add_category(
            'basictheme-widgets',
            [
                'title' => esc_html__( 'Basic theme Widgets', 'basictheme' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

}

new basictheme_plugin_elementor_widgets();