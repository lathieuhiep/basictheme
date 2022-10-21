<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'paint_create_product_warranty', 10);

function paint_create_product_warranty() {

	/* Start post type template */
	$labels = array(
		'name'                  =>  _x( 'Bảo hành sản phẩm', 'post type general name', 'paint' ),
		'singular_name'         =>  _x( 'Bảo hành sản phẩm', 'post type singular name', 'paint' ),
		'menu_name'             =>  _x( 'Bảo hành sản phẩm', 'admin menu', 'paint' ),
		'name_admin_bar'        =>  _x( 'Danh sách Bảo hành sản phẩm', 'add new on admin bar', 'paint' ),
		'add_new'               =>  _x( 'Thêm mới', 'Bảo hành sản phẩm', 'paint' ),
		'add_new_item'          =>  esc_html__( 'Thêm bảo hành sản phẩm', 'paint' ),
		'edit_item'             =>  esc_html__( 'Sửa bảo hành sản phẩm', 'paint' ),
		'new_item'              =>  esc_html__( 'Bảo hành sản phẩm mới', 'paint' ),
		'view_item'             =>  esc_html__( 'Xem bảo hành sản phẩm', 'paint' ),
		'all_items'             =>  esc_html__( 'Tất cả bảo hành sản phẩm', 'paint' ),
		'search_items'          =>  esc_html__( 'Tìm kiếm bảo hành sản phẩm', 'paint' ),
		'not_found'             =>  esc_html__( 'Không tìm thấy', 'paint' ),
		'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'paint' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-pressthis',
		'capability_type'    => 'post',
		'rewrite'            => array('slug' => 'bao-hanh-san-pham' ),
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 56,
		'supports'           => array( 'title' ),
	);

	register_post_type('paint_warranty', $args );
	/* End post type template */

}

add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
function my_title_place_holder($title , $post){

	if( $post->post_type == 'paint_warranty' ){
		$my_title = "Tên khách hàng";
		return $my_title;
	}

	return $title;

}


/* meta box */
add_filter('rwmb_meta_boxes', 'paint_register_meta_boxes_product_warranty');

function paint_register_meta_boxes_product_warranty( $paint_meta_boxes )
{
	$prefix = 'paint_mb_warranty_';

	$paint_meta_boxes[] = [
		'id' => 'paint_meta_box_warranty',
		'title' => esc_html__('Thông tin bảo hành', 'paint'),
		'post_types' => array('paint_warranty'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => [
			[
				'name'        => esc_html__('Số điện thoại', 'paint'),
				'id'          => $prefix . 'phone',
				'type'        => 'text',
			],

			[
				'name'        => esc_html__('Địa chỉ', 'paint'),
				'id'          => $prefix . 'address',
				'type'        => 'text',
			],

			[
				'type' => 'autocomplete',
				'name' => esc_html__( 'Tên sản phẩm', 'online-generator' ),
				'id'   => $prefix . 'product_name',
				'options' => admin_url( 'admin-ajax.php?action=paint_mb_warranty_product_name' ),
			],

			[
				'type' => 'date',
				'name' => esc_html__( 'Ngày mua', 'paint' ),
				'id'   => $prefix . 'purchase_date',
			],

			[
				'type' => 'number',
				'name' => esc_html__( 'Thời gian bảo hành (tháng)', 'paint' ),
				'id'   => $prefix . 'warranty_period',
				'multiple ' => false
			],
		]
	];

	return $paint_meta_boxes;
}

add_action( 'wp_ajax_paint_mb_warranty_product_name', function() {
	$s = $_REQUEST[ 'term' ];
	// Do some stuff here to find matches.

	$response = array(
		array( 'value' => '123', 'label' => 'Some Post' ),
		array( 'value' => '77', 'label' => 'Another Post' )
	);

	// Do some stuff to prepare JSON response ( headers, etc ).
	echo wp_json_encode( $response );
	die;
} );
