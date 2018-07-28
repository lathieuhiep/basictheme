<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class basictheme_widget_slides extends Widget_Base {
    public function get_categories() {
        return array( 'basictheme-widgets' );
    }

    public function get_name() {
        return 'basictheme-slides';
    }

    public function get_title() {
        return esc_html__( 'Slides Theme', 'basictheme' );
    }

    public function get_icon() {
        return 'eicon-slideshow';
    }

    public function get_script_depends() {
        return ['owl-carousel', 'basictheme-elementor-custom'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Slides', 'basictheme' ),
            ]
        );

        $this->add_control(
            'slides-list',
            [
                'label'     =>  esc_html__( 'Slides', 'basictheme' ),
                'type'      =>  Controls_Manager::REPEATER,
                'default'   =>  [
                    [
                        'slides_title'    =>  esc_html__( 'Slider', 'basictheme' ),
                        'slides_content'  =>  esc_html__( 'I am slide content. Click edit button to change this text', 'basictheme' ),
                        'slides_button'   =>  esc_html__( 'Click Here', 'basictheme' ),
                        'slides_link'     =>  '#'
                    ],
                ],

                'fields' => [
                    [
                        'name'          =>  'slides_title',
                        'label'         =>  esc_html__( 'Title', 'basictheme' ),
                        'type'          =>  Controls_Manager::TEXT,
                        'default'       =>  esc_html__( 'Slider' , 'basictheme' ),
                        'label_block'   =>  true,
                    ],

                    [
                        'name'      =>  'slides_image',
                        'label'     =>  esc_html__( 'Image', 'basictheme' ),
                        'type'      =>  Controls_Manager::MEDIA,
                        'default'   =>  [
                            'url'   =>  Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'name'          =>  'slides_link',
                        'label'         =>  esc_html__( 'Link', 'basictheme' ),
                        'type'          =>  Controls_Manager::URL,
                        'label_block'   =>  true,
                        'default'       =>  [
                            'is_external'   =>  'true',
                        ],
                        'placeholder'   =>  esc_html__( 'https://your-link.com', 'basictheme' ),
                    ],
                ],

                'title_field'   =>  '{{{ slides_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_setting_slider',
            [
                'label' => esc_html__( 'Setting Slider', 'basictheme' ),
                'tab' => Controls_Manager::TAB_SETTINGS
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider ?', 'basictheme'),
                'label_off'     =>  esc_html__('No', 'basictheme'),
                'label_on'      =>  esc_html__('Yes', 'basictheme'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         => esc_html__('Autoplay?', 'basictheme'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'basictheme'),
                'label_on'      => esc_html__('Yes', 'basictheme'),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         => esc_html__('nav Slider', 'basictheme'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__('Yes', 'basictheme'),
                'label_off'     => esc_html__('No', 'basictheme'),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         => esc_html__('Dots Slider', 'basictheme'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__('Yes', 'basictheme'),
                'label_off'     => esc_html__('No', 'basictheme'),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render() {

        $settings  =   $this->get_settings_for_display();

        $basictheme_slider_settings     =   [
            'loop'      =>  ( 'yes' === $settings['loop'] ),
            'autoplay'  =>  ( 'yes' === $settings['autoplay'] ),
            'nav'       =>  ( 'yes' === $settings['nav'] ),
            'dots'      =>  ( 'yes' === $settings['dots'] ),
        ];

    ?>

        <div class="element-slides owl-carousel owl-theme" data-settings='<?php echo esc_attr( wp_json_encode( $basictheme_slider_settings ) ); ?>'>

            <?php

            foreach ( $settings['slides-list'] as $item ) :
                $basictheme_slides_image_item   =   $item['slides_image'];
                $basictheme_slides_btn_item     =   $item['slides_link'];

            ?>

                <div class="element-slides__item">

                    <?php if ( !empty( $basictheme_slides_btn_item['url'] ) ) : ?>

                        <a title="<?php echo esc_attr( $item['slides_title'] ); ?>" class="element-slides__link" href="<?php echo esc_url( $basictheme_slides_btn_item['url'] ); ?>" <?php echo ( $basictheme_slides_btn_item['is_external'] ? 'target="_blank"' : '' ); ?>>

                            <?php echo wp_get_attachment_image( $basictheme_slides_image_item['id'], 'full' ); ?>

                        </a>

                    <?php

                    else:
                        echo wp_get_attachment_image( $basictheme_slides_image_item['id'], 'full' );
                    endif;

                    ?>

                </div>

            <?php endforeach; ?>

        </div>

        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new basictheme_widget_slides );