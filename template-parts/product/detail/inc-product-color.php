<?php
$id_color_code_cat = get_post_meta(get_the_ID(), 'paint_cmb_options_product_color', true);

if ( $id_color_code_cat ) :
	$term = get_term( $id_color_code_cat, 'paint_color_code_cat' );
    $term_id = $term->term_id;
	$count = $term->count;
	$order_by = 'date';
    $order = 'ASC';
?>
	<div class="product-color">
        <?php
        if ( $count > 1 ) :
	        $queryMultiPost = new WP_Query(array(
		        'post_type' => 'paint_color_code',
		        'posts_per_page' => -1,
		        'ignore_sticky_posts'   =>  1,
		        'orderby' => $order_by,
		        'order' => $order,
		        'tax_query' => array(
			        array(
				        'taxonomy' => 'paint_color_code_cat',
				        'field'    => 'term_id',
				        'terms'    => $term_id
			        )
		        )
	        ));

            if ( $queryMultiPost->have_posts() ) :
        ?>
            <div class="pattern">
                <h4 class="pattern__title">
                    <?php esc_html_e('Kiểu vân', 'paint'); ?>
                </h4>

                <div class="pattern__posts">
                    <?php $stt = 1; while ( $queryMultiPost->have_posts() ): $queryMultiPost->the_post(); ?>

                    <figure class="item-pattern<?php echo esc_attr( $stt == 1 ? ' active' : '' ); ?>" data-id="<?php the_ID(); ?>" data-stt="<?php echo esc_attr( $stt ) ?>">
                        <?php
                        if ( has_post_thumbnail() ) :
                            the_post_thumbnail('large');
                        else:
                        ?>
                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/no-image.png' ) ) ?>" alt="pattern" width="auto" height="auto">
                        <?php endif; ?>
                    </figure>

                    <?php $stt++; endwhile; wp_reset_postdata(); ?>
                </div>

                <h4 class="pattern__style">
                    <span class="text"><?php esc_html_e('Mã màu - Kiểu vân', 'paint'); ?></span>
                    <span class="stt">1</span>
                </h4>
            </div>

            <div class="spinner-box text-center d-none">
                <div class="spinner-border text-warning" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        <?php
            endif;
        endif;
        ?>

		<div class="list-color">
			<?php
			$queryOnePost = new WP_Query(array(
				'post_type' => 'paint_color_code',
				'posts_per_page' => 1,
				'ignore_sticky_posts'   =>  1,
				'orderby' => $order_by,
				'order' => $order,
				'tax_query' => array(
					array(
						'taxonomy' => 'paint_color_code_cat',
						'field'    => 'term_id',
						'terms'    => $term_id
					)
				)
			));

	        if ( $queryOnePost->have_posts() ) :
                while ( $queryOnePost->have_posts() ): $queryOnePost->the_post();

                get_template_part('template-parts/product/detail/inc', 'content-color');

                endwhile;
            endif;

			wp_reset_postdata();
			?>
		</div>
	</div>
<?php
endif;
