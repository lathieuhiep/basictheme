<?php if( is_active_sidebar( 'basictheme-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( basictheme_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'basictheme-sidebar-main' ); ?>
    </aside>

<?php endif; ?>