<?php
$terms = get_terms( array(
	'taxonomy' => 'paint_discover_cat',
	'hide_empty' => false,
) );
?>

<div class="search-warp">
	<?php
    get_search_form();

    if ( $terms ) :
    ?>
        <ul class="list-terms">
            <li class="item">
                <a class="filter-discover-cat active" href="#" data-cat="all">
                    <?php esc_html_e('Tất cả', 'paint'); ?>
                </a>
            </li>

            <?php foreach ( $terms as $term ) : ?>
            <li class="item">
                <a class="filter-discover-cat" href="#" data-cat="<?php echo esc_attr( $term->term_id ); ?>">
		            <?php echo esc_html( $term->name ); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>