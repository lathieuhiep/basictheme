<?php
get_header();

$gallery = get_post_meta(get_the_ID(), 'paint_cmb_project_gallery', true);

$config_feature = [
	'infinite'       => true,
	'slidesToShow'   => 1,
	'slidesToScroll' => 1,
	'arrows'         => false,
	'fade'           => true,
	'asNavFor'       => '.slider-nav'
];

$config_nav_thumbnail = [
	'infinite'       => true,
	'slidesToShow'   => 5,
	'slidesToScroll' => 1,
	'arrows'         => false,
	'asNavFor'       => '.slider-for',
	'focusOnSelect' => true,
	'responsive'     => [
		[
			'breakpoint' => 991,
			'settings'   => [
				'slidesToShow' => 3,
			]
		],
		[
			'breakpoint' => 767,
			'settings'   => [
				'slidesToShow' => 2,
			]
		],
		[
			'breakpoint' => 575,
			'settings'   => [
				'slidesToShow' => 1,
			]
		],
	],
]

?>

<div class="site-container site-single-project element-background-image">
	<div class="container">
		<?php
        get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );

		while ( have_posts() ) : the_post();
        ?>

		<div class="entry-content">

		</div>

		<?php
        endwhile;
        ?>
	</div>
</div>
<?php
get_footer();