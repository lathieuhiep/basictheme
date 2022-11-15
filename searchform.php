<?php
$paint_unique_id = esc_attr( uniqid( 'search-form-' ) );
$custom_post_type= 'post';

if ( is_post_type_archive( 'paint_discover' ) ) {
    $custom_post_type = 'paint_discover';
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo $paint_unique_id; ?>">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'paint' ); ?></span>
    </label>

    <input type="search" id="<?php echo $paint_unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Tìm kiếm', 'placeholder', 'paint' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

    <input type="hidden" readonly name="post-type" value="<?php echo esc_attr( $custom_post_type ); ?>">

    <button type="submit" class="search-submit">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>