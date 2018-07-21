<?php

add_filter( 'rwmb_meta_boxes', 'basictheme_register_meta_boxes' );

function basictheme_register_meta_boxes() {

    /* Start 1st meta box */
    $basictheme_meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => esc_html__( 'Personal Information', 'basictheme' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => esc_html__( 'Full name', 'basictheme' ),
                'desc'  => 'Format: First Last',
                'id'    => 'rw_fname',
                'type'  => 'text',
                'std'   => 'Anh Tran',
                'class' => 'custom-class',
                'clone' => true,
            ),
        )
    );
    /* End 1st meta box */

    return $basictheme_meta_boxes;

}