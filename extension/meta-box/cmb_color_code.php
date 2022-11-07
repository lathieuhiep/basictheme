<?php
add_action( 'cmb2_admin_init', 'paint_cmb_color_code' );

function paint_cmb_color_code(): void {
	$cmb = new_cmb2_box( array(
		'id'           => 'paint_cmb_color_code_setting',
		'title'        => esc_html__( 'Thông tin mã màu', 'paint' ),
		'object_types' => array( 'paint_color_code' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) );

	$cmb->add_field( array(
		'name'             => esc_html__('Kiểu mã màu', 'paint'),
		'id'               => 'paint_cmb_color_code_type',
		'type'             => 'select',
		'default'          => 'standard',
		'options'          => array(
			'standard' => __( 'Bình thường', 'cmb2' ),
			'custom'   => __( 'Có vân', 'cmb2' ),
		),
	) );


	// type standard
	$type_standard = $cmb->add_field( array(
		'id'          => 'paint_cmb_color_code_standard',
		'type'        => 'group',
		'description' => esc_html__( 'Kiểu màu bình thường', 'paint' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Mã sơn {#}', 'paint' ),
			'add_button'     => esc_html__( 'Thêm', 'paint' ),
			'remove_button'  => esc_html__( 'Xoá', 'paint' ),
			'sortable'       => true,
			'closed'         => false,
			'remove_confirm' => esc_html__( 'Bạn thật sự muốn xoá?', 'paint' ),
		),
	) );

	$cmb->add_group_field( $type_standard, array(
		'name' => 'Mã sơn',
		'id'   => 'paint_color_code',
		'type' => 'text',
	) );

	$cmb->add_group_field( $type_standard, array(
		'name' => 'Phối màu',
		'id'   => 'color_mix',
		'type' => 'fieldset_color',
		'repeatable' => true
	) );
}