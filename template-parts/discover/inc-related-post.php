<?php
$limit = 30;
$tax_query = array();
$list_cate  = get_the_terms(get_the_ID(), 'paint_discover_cat');
$list_cate_ids = array();

foreach ($list_cate as $item) $list_cate_ids[] = $item->term_id;

if ( !empty( $cate_product ) ) {
	$tax_query = array(
		array(
			'taxonomy' => 'paint_discover_cat',
			'field'    => 'term_id',
			'terms'    => $list_cate_ids
		),
	);
}

// query product
$query = new WP_Query(array(
	'post_type' => 'paint_discover',
	'posts_per_page' => $limit,
	'post__not_in' => array( get_the_ID() ),
	'ignore_sticky_posts'   =>  1,
	'tax_query' => $tax_query
));

if ( $query->have_posts() ):
?>
    <div class="site-discover-related content-warp">
        <div class="grid-discover">
            <?php
            while ($query->have_posts()) :
                $query->the_post();

                get_template_part('template-parts/discover/inc', 'render-item');

            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php
endif;