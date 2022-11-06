<?php
add_action( 'cmb2_admin_init', 'paint_cmb_tool' );

function paint_cmb_tool(): void {
	$cmb_gallery = new_cmb2_box( array(
		'id'           => 'paint_cmb_tool_option_side',
		'title'        => esc_html__( 'Gallery', 'paint' ),
		'object_types' => array( 'paint_tool' ),
		'context'      => 'side',
		'priority'     => 'low',
		'show_names'   => true
	) );

	$cmb_gallery->add_field( array(
		'id'           => 'paint_cmb_tool_option_side_gallery',
		'type'         => 'file_list',
		'options'      => array(
			'url' => false,
		),
		'text'         => array(
			'add_upload_files_text' => esc_html__( 'Chọn ảnh', 'paint' )
		),
		'query_args'   => array( 'type' => 'image' ),
	) );

	$cmb_specifications = new_cmb2_box( array(
		'id'           => 'paint_cmb_tool_specifications',
		'title'        => esc_html__( 'Thông số kỹ thuật', 'paint' ),
		'object_types' => array( 'paint_tool' ),
		'context'      => 'normal',
		'priority'     => 'low',
		'show_names'   => true
	) );

	$cmb_specifications->add_field( array(
		'name'       => esc_html__('Giá', 'paint'),
		'id'         => 'paint_cmb_tool_specifications_price',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'min'  => '1',
		),
	) );
}