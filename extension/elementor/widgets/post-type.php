<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class basictheme_post_type extends Widget_Base {

    public function get_categories() {
        return array( 'basictheme_widgets' );
    }

    public function get_name() {
        return 'basictheme-post-type';
    }

    public function get_title() {
        return esc_html__( 'Basic theme Post Type', 'basictheme' );
    }

    public function get_icon() {
        return ' eicon-post';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_post_type',
            [
                'label' =>  esc_html__( 'Post Type', 'basictheme' )
            ]
        );

        $this->add_control(
            'post_type_title',
            [
                'label'         =>  esc_html__( 'Title', 'basictheme' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Post', 'basictheme' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'post_type__column_number',
            [
                'label'     =>  esc_html__( 'Column', 'basictheme' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  3,
                'options'   =>  [
                    4   =>  esc_html__( '4 Column', 'basictheme' ),
                    3   =>  esc_html__( '3 Column', 'basictheme' ),
                    2   =>  esc_html__( '2 Column', 'basictheme' ),
                    1   =>  esc_html__( '1 Column', 'basictheme' ),
                ],
            ]
        );

        $this->add_control(
            'post_type_select_cat',
            [
                'label'         =>  esc_html__( 'Select Category Post', 'basictheme' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  basictheme_check_get_cat( 'category' ),
                'multiple'      =>  true,
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'post_type_limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  6,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'post_type_order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'basictheme' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'            =>  esc_html__( 'Post ID', 'basictheme' ),
                    'author'        =>  esc_html__( 'Post Author', 'basictheme' ),
                    'title'         =>  esc_html__( 'Title', 'basictheme' ),
                    'date'          =>  esc_html__( 'Date', 'basictheme' ),
                    'rand'          =>  esc_html__( 'Random', 'basictheme' ),
                    'comment_count' =>  esc_html__( 'Comment count', 'basictheme' ),
                ],
            ]
        );

        $this->add_control(
            'post_type_order',
            [
                'label'     =>  esc_html__( 'Order', 'basictheme' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'ASC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'basictheme' ),
                    'DESC'  =>  esc_html__( 'Descending', 'basictheme' ),
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
        $cat_post       =   $settings['post_type_select_cat'];
        $limit_post     =   $settings['post_type_limit'];
        $order_by_post  =   $settings['post_type_order_by'];
        $order_post     =   $settings['post_type_order'];

        if ( !empty( $cat_post ) ) :

            $basictheme_post_type_arg = array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  $limit_post,
                'orderby'           =>  $order_by_post,
                'order'             =>  $order_post,
                'cat'               =>  $cat_post
            );

        else:

            $basictheme_post_type_arg = array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  $limit_post,
                'orderby'           =>  $order_by_post,
                'order'             =>  $order_post
            );

        endif;

        $basictheme_post_type_query = new \ WP_Query( $basictheme_post_type_arg );

        if ( $basictheme_post_type_query->have_posts() ) :

    ?>

        <div class="elementor-post-type">

            <?php while ( $basictheme_post_type_query->have_posts() ): $basictheme_post_type_query->the_post(); ?>

                <h3>
                    <?php the_title(); ?>
                </h3>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

    <?php

        endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new basictheme_post_type );