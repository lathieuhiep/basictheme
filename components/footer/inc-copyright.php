<?php
$show_copyright = basictheme_get_option('copyright_opt_show', '1');
$copyright = basictheme_get_option('copyright_opt_content', 'Copyright &copy; DiepLK');

if ( $show_copyright == '1' ) :
?>
    <div class="global-footer__bottom text-center">
        <div class="container">
            <div class="copyright">
                <?php echo wpautop( $copyright ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>