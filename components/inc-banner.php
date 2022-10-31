<?php
if ( !empty( $args['opt'] ) ) :
	$opt_banner = $opt_banner = paint_get_option($args['opt'], '');;
	$id_image = $opt_banner['id'];
?>
	<div class="element-banner">
		<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
	</div>
<?php
endif;