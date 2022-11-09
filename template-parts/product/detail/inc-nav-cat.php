<?php
$config_slider = [
	'infinite'       => true,
	'slidesToShow'   => 3,
	'slidesToScroll' => 1,
	'arrows'         => true,
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

// get all terms product cat
$terms = get_terms( array(
	'taxonomy' => 'paint_product_cat',
	'hide_empty' => false,
) );
?>
<div class="nav-cat">
    <div class="nav-cat__box">
	    <?php if ( !empty( $terms ) ) : ?>
            <div class="custom-slick-carousel" data-config-slick='<?php echo wp_json_encode( $config_slider ); ?>'>
			    <?php foreach ( $terms as $term ): ?>
                    <div class="item">
                        <a href="<?php echo esc_url( get_term_link( $term->slug, 'paint_product_cat' ) ); ?>">
						    <?php echo esc_html( $term->name ); ?>
                        </a>
                    </div>
			    <?php endforeach; ?>
            </div>
	    <?php endif; ?>
    </div>
</div>