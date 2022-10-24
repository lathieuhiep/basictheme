<?php
if ( !empty( $args['opt_banner'] ) ) :
	$opt_banner = $args['opt_banner'];
	$id_image = $opt_banner['id'];
?>
	<div class="element-banner">
		<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
	</div>
<?php
endif;