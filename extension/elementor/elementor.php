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
    }

    public function basictheme_elementor_widgets_registered() {
        $this->basictheme_elementor_includes();
    }

    public function basictheme_elementor_widgets_int() {
        $this->basictheme_elementor_register_widget();
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
                'title' => esc_html__( 'basictheme Widgets', 'basictheme' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

}

new basictheme_plugin_elementor_widgets();