<?php
$opt_banner = paint_get_option('template_opt_home_banner', '');

if ( !empty( $opt_banner ) ) :
	$id_image = $opt_banner['id'];
?>
	<div class="element-banner">
		<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
	</div>
<?php
endif;