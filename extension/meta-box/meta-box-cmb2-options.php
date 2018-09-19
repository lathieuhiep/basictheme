<?php

/* Option Metabox Post */
add_action( 'cmb2_admin_init', 'basictheme_option_metaboxes' );

function basictheme_option_metaboxes() {

    /**
     * Initiate the metabox
     */
    $basictheme_metabox_post = new_cmb2_box( array(
        'id'            => 'basictheme_metabox_post',
        'title'         => __( 'Test Metabox', 'basictheme' ),
        'object_types'  => array( 'post', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    // Regular text field
    $basictheme_metabox_post->add_field( array(
        'name'       => __( 'Test Text', 'basictheme' ),
        'desc'       => __( 'field description (optional)', 'basictheme' ),
        'id'         => 'basictheme_metabox_post_text',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    // URL text field
    $basictheme_metabox_post->add_field( array(
        'name' => __( 'Website URL', 'basictheme' ),
        'desc' => __( 'field description (optional)', 'basictheme' ),
        'id'   => 'basictheme_metabox_post_url',
        'type' => 'text_url',
    ) );

    // Email text field
    $basictheme_metabox_post->add_field( array(
        'name' => __( 'Test Text Email', 'basictheme' ),
        'desc' => __( 'field description (optional)', 'basictheme' ),
        'id'   => 'basictheme_metabox_post_email',
        'type' => 'text_email',
    ) );

    // Group
    $basictheme_metabox_post_group_id = $basictheme_metabox_post->add_field( array(
        'id'          => 'wiki_test_repeat_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'basictheme' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Entry {#}', 'basictheme' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Entry', 'basictheme' ),
            'remove_button' => __( 'Remove Entry', 'basictheme' ),
            'sortable'      => true, // beta
            'closed'        => true
        ),
    ) );

    $basictheme_metabox_post->add_group_field( $basictheme_metabox_post_group_id, array(
        'name' => 'Entry Title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $basictheme_metabox_post->add_group_field( $basictheme_metabox_post_group_id, array(
        'name' => 'Description',
        'description' => 'Write a short description for this entry',
        'id'   => 'description',
        'type' => 'textarea_small',
    ) );

    $basictheme_metabox_post->add_group_field( $basictheme_metabox_post_group_id, array(
        'name' => 'Entry Image',
        'id'   => 'image',
        'type' => 'file',
    ) );

    $basictheme_metabox_post->add_group_field( $basictheme_metabox_post_group_id, array(
        'name' => 'Image Caption',
        'id'   => 'image_caption',
        'type' => 'text',
    ) );

}