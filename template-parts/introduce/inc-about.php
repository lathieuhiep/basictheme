<?php
$opt_title = paint_get_option('template_introduce_opt_title', '');
$opt_image = paint_get_option('template_introduce_opt_image', '');
$opt_desc = paint_get_option('template_introduce_opt_desc', '');
?>

<div class="element-about element-spacer">
	<div class="container">
        <div class="breadcrumbs-title">
            <div class="left-box">
	            <?php get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' ); ?>
            </div>

            <div class="right-box">
                <h2 class="title">
		            <?php echo esc_html( $opt_title ); ?>
                </h2>
            </div>
        </div>

		<div class="row row-cols-1 row-cols-sm-2">
			<div class="col">
				<?php
				if ( $opt_image ) :
					echo wp_get_attachment_image( $opt_image['id'], 'full' );
				endif;
				?>
			</div>

			<div class="col desc">
				<?php echo wpautop( $opt_desc ); ?>
			</div>
		</div>
	</div>
</div>
