<?php
$opt_heading   = paint_get_option( 'template_home_opt_testimonial_heading', '' );
$opt_customers = paint_get_option( 'template_home_opt_testimonial_customers', '' );

$data_settings_owl = [
	'loop'       => true,
	'nav'        => false,
	'dots'       => false,
	'autoplay'   => false,
	'responsive' => [
		'0' => array(
			'items'  => 1,
			'margin' => 0
		),

		'576' => array(
			'items'  => 2,
			'margin' => 12
		),

		'768' => array(
			'items'  => 3,
			'margin' => 24
		),

		'992' => array(
			'margin' => 36,
		),

		'1200' => array(
			'margin' => 65,
		),
	],
];

?>

<div class="element-testimonial element-spacer element-background-image">
	<div class="container">
		<?php if ( ! empty( $opt_heading ) ) : ?>
	        <h2 class="heading text-<?php echo esc_attr( $opt_heading['align'] ); ?>">
				<?php echo esc_html( $opt_heading['title'] ); ?>
	        </h2>
		<?php
		endif;

		if ( ! empty( $opt_customers ) ) :
		?>
	        <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ); ?>'>
				<?php
				foreach ( $opt_customers as $item ) :
					$imageId = $item['image']['id'];
				?>

	                <div class="item text-center elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
	                    <div class="item__image">
							<?php echo wp_get_attachment_image( $imageId, 'full' ); ?>
	                    </div>

		                <div class="start">
			                <i class="fa-solid fa-star"></i>
			                <i class="fa-solid fa-star"></i>
			                <i class="fa-solid fa-star"></i>
			                <i class="fa-solid fa-star"></i>
			                <i class="fa-solid fa-star"></i>
		                </div>

		                <h4 class="name">
			                <?php echo esc_html( $item['name'] ); ?>
		                </h4>

		                <p class="content">
			                <?php echo esc_textarea( $item['content'] ) ?>
		                </p>
	                </div>

				<?php endforeach; ?>
	        </div>
		<?php endif; ?>
	</div>
</div>
