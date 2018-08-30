
<?php if( is_active_sidebar( 'basictheme-sidebar' ) ): ?>

    <aside class="<?php echo esc_attr( basictheme_col_sidebar() ); ?> site-sidebar">
        <?php dynamic_sidebar( 'basictheme-sidebar' ); ?>
    </aside>

<?php endif; ?>