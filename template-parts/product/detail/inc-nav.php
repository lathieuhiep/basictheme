<?php
// get all terms product cat
$terms = get_terms( array(
	'taxonomy' => 'paint_product_cat',
	'hide_empty' => false,
) );

$config_slider = [
	'infinite'       => true,
	'slidesToShow'   => 4,
	'slidesToScroll' => 1,
	'arrows'         => false,
	'responsive'     => [
		[
			'breakpoint' => 575,
			'settings'   => [
				'slidesToShow' => 1,
			]
		],
		[
			'breakpoint' => 991,
			'settings'   => [
				'slidesToShow' => 2,
			]
		],
	],
];

// get cate product by id
$tax_query = array();
$list_cate  = get_the_terms(get_the_ID(), 'paint_product_cat');
$list_cate_ids = array();

foreach ($list_cate as $item) $list_cate_ids[] = $item->term_id;

if ( !empty( $cate_product ) ) {
	$tax_query = array(
		array(
			'taxonomy' => 'paint_product_cat',
			'field'    => 'term_id',
			'terms'    => $list_cate_ids
		),
	);
}

// query related product
$query = new WP_Query(array(
	'post_type' => 'paint_product',
    'posts_per_page' => 10,
//	'post__in' => array(get_the_ID()),
	'ignore_sticky_posts'   =>  1,
    'tax_query' => $tax_query
));
?>
<nav class="nav-box">
	<?php if ( !empty( $terms ) ) : ?>

	<div class="nav-cat">
		<div class="custom-slick-carousel" data-config-slick='<?php echo wp_json_encode( $config_slider ); ?>'>
			<?php foreach ( $terms as $term ): ?>
			<div class="item">
				<a href="<?php echo esc_url( get_term_link( $term->slug, 'paint_product_cat' ) ); ?>">
					<?php echo esc_html( $term->name ); ?>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<?php
    endif;

    if ( $query->have_posts() ) :
    ?>

    <div class="nav-post">
        <div class="custom-slick-carousel" data-config-slick='<?php echo wp_json_encode( $config_slider ); ?>'>
		    <?php
		    while ($query->have_posts()) :
		        $query->the_post();
            ?>

                <div class="item">
                    <a href="<?php the_permalink(); ?>">
					    <?php the_title(); ?>
                    </a>
                </div>

		    <?php
		    endwhile;
		    wp_reset_postdata();
            ?>
        </div>
    </div>

    <?php endif; ?>
</nav>