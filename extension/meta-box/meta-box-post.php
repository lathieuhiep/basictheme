<?php

add_filter('rwmb_meta_boxes', 'basictheme_register_meta_boxes');

function basictheme_register_meta_boxes($basictheme_meta_boxes)
{

    $basictheme_meta_boxes[] = array(
        'id' => 'basictheme_meta_box_post',
        'title' => esc_html__('Post Format', 'basictheme'),
        'post_types' => array('post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(

            array(
                'name' => 'Select Type Image',
                'id' => 'basictheme_meta_box_post_select_image',
                'type' => 'select',
                'options' => array(
                    'featured_image' => 'Featured image',
                    'gallery' => 'Gallery',
                ),
            ),

            array(
                'id' => 'basictheme_meta_box_post_gallery',
                'name' => 'Gallery',
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_status' => false,
                'image_size' => 'thumbnail',
            ),

            array(
                'id' => 'basictheme_meta_box_post_video',
                'name' => esc_html__('Video Or Audio', 'basictheme'),
                'type' => 'oembed',
            ),

        )
    );

    return $basictheme_meta_boxes;
}