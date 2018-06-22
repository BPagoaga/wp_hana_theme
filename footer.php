<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Shop Isle Child
 */
?>
<?php do_action( 'shop_isle_before_footer' ); ?>

        <footer class="page-footer component">
            <!-- Menu personnalisé -->
            <?php if ( is_active_sidebar( 'sidebar-footer-area-1' ) ) : ?>
            <div class="footer-sidebar-wrap">
                <?php dynamic_sidebar( 'sidebar-footer-area-1' ); ?>
            </div>
            <?php endif; ?>

            <!--  Copyright -->
            <?php
            $shop_isle_socials = get_theme_mod( 'shop_isle_socials' );
            $shop_isle_copyright = apply_filters(
                'shop_isle_footer_copyright_filter',
                get_theme_mod( 'shop_isle_copyright' )
                );
            ?>
            <div class="footer-copyright row">
                <div class="col s12 m6">
                    <?php if ( ! empty( $shop_isle_copyright ) ) : ?>
                        <p class="copyright font-alt"><?= $shop_isle_copyright ?></p>
                    <?php else : ?>
                        <p class="copyright font-alt">&copy; <?= date('Y'); ?> Häna Handmade</p>
                    <?php endif ?>

                </div>
                <div class="col s12 m6">
                    <?php
                    if ( ! empty( $shop_isle_socials ) ) :

                        $shop_isle_socials_decoded = json_decode( $shop_isle_socials );

                        if ( ! empty( $shop_isle_socials_decoded ) ) : ?>
                    <div class="footer-social-links">
                        <?php foreach ( $shop_isle_socials_decoded as $shop_isle_social ) : ?>

                        <?php
                        $icon_value = ! empty( $shop_isle_social->icon_value ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_social->icon_value, 'Footer socials' ) : '';
                        $link       = ! empty( $shop_isle_social->link ) ? apply_filters( 'shop_isle_translate_single_string', $shop_isle_social->link, 'Footer socials' ) : '';
                        ?>

                        <?php if ( ! empty( $icon_value ) && ! empty( $link ) ) : ?>
                            <a href="<?=esc_url( $link )?>" target="_blank" class="lighten-link">
                                <span class="<?=esc_attr( $icon_value )?>"></span></a>

                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

        </footer>

    </main>
    <!-- Wrapper end -->
    <!-- Scroll-up -->
    <div class="scroll-up">
        <a href="#totop"><i class="arrow_carrot-2up"></i></a>
    </div>

    <?php do_action( 'shop_isle_after_footer' ); ?>

<?php wp_footer(); ?>

</body>
</html>
