<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post type oil product
*---------------------------------------------------------------------
*/

add_action('init', 'paint_create_product', 10);

function paint_create_product(): void {

	/* Start post type */
	$labels = array(
		'name'                  =>  _x( 'Sản phẩm', 'post type general name', 'paint' ),
		'singular_name'         =>  _x( 'Sản phẩm', 'post type singular name', 'paint' ),
		'menu_name'             =>  _x( 'Sản phẩm', 'admin menu', 'paint' ),
		'name_admin_bar'        =>  _x( 'Danh sách sản phẩm', 'add new on admin bar', 'paint' ),
		'add_new'               =>  _x( 'Thêm mới', 'Sản phẩm', 'paint' ),
		'add_new_item'          =>  esc_html__( 'Thêm mới', 'paint' ),
		'edit_item'             =>  esc_html__( 'Sửa', 'paint' ),
		'new_item'              =>  esc_html__( 'Sản phẩm mới', 'paint' ),
		'view_item'             =>  esc_html__( 'Xem sản phẩm', 'paint' ),
		'all_items'             =>  esc_html__( 'Danh sách sản phẩm', 'paint' ),
		'search_items'          =>  esc_html__( 'Tìm kiếm sản phẩm', 'paint' ),
		'not_found'             =>  esc_html__( 'Không tìm thấy', 'paint' ),
		'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thúng rác', 'paint' ),
		'parent_item_colon'     =>  ''
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'          => 'dashicons-cart',
		'rewrite'            => array('slug' => 'san-pham' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author'),
	);

	register_post_type('paint_product', $args );
	/* End post type */

	/* Start taxonomy */
	$taxonomy_labels = array(
		'name'              => _x( 'Danh mục sản phẩm', 'taxonomy general name', 'paint' ),
		'singular_name'     => _x( 'Danh mục sản phẩm', 'taxonomy singular name', 'paint' ),
		'search_items'      => __( 'Tìm kiếm danh mục', 'paint' ),
		'all_items'         => __( 'Tất cả danh mục', 'paint' ),
		'parent_item'       => __( 'Danh mục cha', 'paint' ),
		'parent_item_colon' => __( 'Danh mục cha:', 'paint' ),
		'edit_item'         => __( 'Sửa danh mục', 'paint' ),
		'update_item'       => __( 'Cập nhật danh mục', 'paint' ),
		'add_new_item'      => __( 'Thêm mới danh mục', 'paint' ),
		'new_item_name'     => __( 'Tên danh mục mới', 'paint' ),
		'menu_name'         => __( 'Danh mục', 'paint' ),
	);

	$taxonomy_args = array(
		'labels'            => $taxonomy_labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'danh-muc-san-pham' ),
	);

	register_taxonomy( 'paint_product_cat', array( 'paint_product' ), $taxonomy_args );
	/* End taxonomy */

}