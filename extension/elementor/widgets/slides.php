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

        $repeater = new Repeater();

        $repeater->start_controls_tabs( 'slides_repeater' );

        $repeater->start_controls_tab( 'background', [ 'label' => esc_html__( 'Background', 'basictheme' ) ] );

        $repeater->add_control(
            'slides_image',
            [
                'label'     =>  esc_html__( 'Image', 'basictheme' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--bg' => 'background-image: url({{URL}})',
                ],
            ]
        );

        $repeater->add_control(
            'background_size',
            [
                'label' => _x( 'Size', 'Background Control', 'basictheme' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => _x( 'Cover', 'Background Control', 'basictheme' ),
                    'contain' => _x( 'Contain', 'Background Control', 'basictheme' ),
                    'auto' => _x( 'Auto', 'Background Control', 'basictheme' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--bg' => 'background-size: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'slides_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'background_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'basictheme' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'slides_image[url]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'background_overlay_color',
            [
                'label' => esc_html__( 'Color', 'basictheme' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.5)',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_overlay',
                            'value' => 'yes',
                        ],
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--inner .element-slides__item--overlay' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'basictheme' ) ] );

        $repeater->add_control(
            'heading',
            [
                'label' => esc_html__( 'Title & Description', 'basictheme' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Slide Heading', 'basictheme' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'basictheme' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'basictheme' ),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'basictheme' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Click Here', 'basictheme' ),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'         =>  esc_html__( 'Link', 'basictheme' ),
                'type'          =>  Controls_Manager::URL,
                'label_block'   =>  true,
                'default'       =>  [
                    'is_external'   =>  'true',
                ],
                'placeholder'   =>  esc_html__( 'https://your-link.com', 'basictheme' ),
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab( 'style', [ 'label' => esc_html__( 'Style', 'basictheme' ) ] );

        $repeater->add_control(
            'custom_style',
            [
                'label' => esc_html__( 'Custom', 'basictheme' ),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'Set custom style that will only affect this specific slide.', 'basictheme' ),
            ]
        );

        $repeater->add_control(
            'horizontal_position',
            [
                'label' => esc_html__( 'Horizontal Position', 'basictheme' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'basictheme' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'basictheme' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'basictheme' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--inner .element-slides__item--content' => '{{VALUE}}',
                ],
                'selectors_dictionary' => [
                    'left' => 'margin-right: auto',
                    'center' => 'margin: 0 auto',
                    'right' => 'margin-left: auto',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'vertical_position',
            [
                'label' => esc_html__( 'Vertical Position', 'basictheme' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'top' => [
                        'title' => esc_html__( 'Top', 'basictheme' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => esc_html__( 'Middle', 'basictheme' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__( 'Bottom', 'basictheme' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--inner' => 'align-items: {{VALUE}}; -webkit-align-items: {{VALUE}};',
                ],
                'selectors_dictionary' => [
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'text_align',
            [
                'label' => esc_html__( 'Text Align', 'elementor-pro' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor-pro' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor-pro' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor-pro' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .element-slides__item--inner' => 'text-align: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'custom_style',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
            'slides_list',
            [
                'label'     =>  esc_html__( 'Slides', 'basictheme' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   =>  [
                    [
                        'heading' => esc_html__( 'Slider 1 Heading', 'basictheme' ),
                        'description' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'basictheme' ),
                        'button_text' => esc_html__( 'Click Here', 'basictheme' ),
                        'link' => '#'
                    ],
                    [
                        'heading' => esc_html__( 'Slider 2 Heading', 'basictheme' ),
                        'description' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'basictheme' ),
                        'button_text' => esc_html__( 'Click Here', 'basictheme' ),
                        'link' => '#'
                    ],
                ],
                'title_field'   =>  '{{{ heading }}}',
            ]
        );

        $this->add_responsive_control(
            'slides_height',
            [
                'label' => esc_html__( 'Height', 'elementor-pro' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 400,
                ],
                'size_units' => [ 'px', 'vh', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .element-slides__item' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_options',
            [
                'label' => esc_html__( 'Slider Options', 'basictheme' ),
                'tab' => Controls_Manager::SECTION
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

            foreach ( $settings['slides_list'] as $item ) :
                $basictheme_slides_link         =   $item['link'];

            ?>

                <div class="element-slides__item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                    <div class="element-slides__item--bg"></div>

                    <div class="element-slides__item--inner">
                        <?php if ( $item['background_overlay'] == 'yes' ) : ?>
                            <div class="element-slides__item--overlay"></div>
                        <?php endif; ?>

                        <div class="element-slides__item--content">
                            <?php if ( !empty( $item['heading'] ) ) : ?>
                                <div class="element-slides__item--heading">
                                    <?php echo esc_html( $item['heading'] ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( !empty( $item['description'] ) ) : ?>
                                <div class="element-slides__item--description">
                                    <?php echo esc_html( $item['description'] ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( !empty( $item['button_text'] ) ) : ?>
                                <div class="element-slides__item--link">
                                    <?php if ( !empty( $basictheme_slides_link['url'] ) ) : ?>
                                        <a href="<?php echo esc_url( $basictheme_slides_link['url'] ); ?>" <?php echo ( $basictheme_slides_link['is_external'] ? 'target="_blank"' : '' ); ?>>
                                            <?php echo esc_html( $item['button_text'] ); ?>
                                        </a>
                                    <?php
                                    else:
                                        echo esc_html( $item['button_text'] );
                                    endif;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <?php
    }

    protected function _content_template() {
    ?>
        <#
        var loop      =  ( 'yes' === settings.loop ),
            autoplay  =  ( 'yes' === settings.autoplay ),
            nav       =  ( 'yes' === settings.nav ),
            dots      =  ( 'yes' === settings.dots ),
            sliderOptions = {
                "loop": loop,
                "autoplay": autoplay,
                "nav": nav,
                "dots": dots,

            }
            sliderOptionsStr = JSON.stringify( sliderOptions );
        #>

        <div class="element-slides owl-carousel owl-theme" data-settings="{{ sliderOptionsStr }}">

            <#
            _.each( settings.slides_list, function( item ) {
                var target = item.link.is_external ? ' target="_blank"' : '';
            #>

                <div class="element-slides__item elementor-repeater-item-{{ item._id }}">
                    <div class="element-slides__item--bg"></div>

                    <div class="element-slides__item--inner">
                        <# if ( item.background_overlay === 'yes' ) { #>
                            <div class="element-slides__item--overlay"></div>
                        <# } #>

                        <div class="element-slides__item--content">
                            <# if ( item.heading ) { #>
                                <div class="element-slides__item--heading">
                                    {{{ item.heading }}}
                                </div>
                            <# } #>

                            <# if ( item.description ) { #>
                                <div class="element-slides__item--description">
                                    {{{ item.description }}}
                                </div>
                            <# } #>

                            <# if ( item.button_text ) { #>
                                <div class="element-slides__item--link">
                                    <# if ( item.link.url ) { #>
                                        <a href="{{ item.link.url }}"{{ target }}>
                                            {{{ item.button_text }}}
                                        </a>
                                    <# } else { #>
                                        {{{ item.button_text }}}
                                    <# } #>
                                </div>
                            <# } #>
                        </div>
                    </div>
                </div>

            <# } ); #>

        </div>
    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new basictheme_widget_slides );