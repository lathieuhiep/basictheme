<?php
$paint_unique_id = esc_attr( uniqid( 'search-form-' ) );

$terms = get_terms( array(
	'taxonomy' => 'paint_discover_cat',
	'hide_empty' => false,
) );
?>

<form role="search" method="get" class="search-form search-form-discover" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="group-search">
        <input type="search" id="<?php echo $paint_unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Tìm kiếm', 'placeholder', 'paint' ); ?>" value="<?php echo get_search_query(); ?>" name="s" aria-label="" />

        <button type="submit" class="search-submit">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>

	<?php if ( $terms ) :?>
        <div class="group-check">
            <input type="radio" class="btn-check" name="cat" id="all-cat" value="" autocomplete="off" checked>
            <label class="btn btn-secondary" for="all-cat">
                <?php esc_html_e('Tất cả', 'paint'); ?>
            </label>

            <?php foreach ( $terms as $term ) : ?>
                <input type="radio" class="btn-check" name="cat" id="<?php echo esc_attr( $term->slug ); ?>" value="<?php echo esc_attr( $term->slug ); ?>" autocomplete="off">
                <label class="btn btn-secondary" for="<?php echo esc_attr( $term->slug ); ?>">
                    <?php echo esc_html( $term->name ); ?>
                </label>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <input type="hidden" readonly name="post_type" value="paint_discover">
</form>