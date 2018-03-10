<nav class="hide-on-med-and-down component">
    <div class="nav-wrapper">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary_desktop_menu',
                    'container'      => false,
                    'menu_class'     => 'left',
                    'menu_id' => 'nav-desktop'
                )
            );
            ?>

            <?php if ( function_exists( 'WC' ) ) : ?>
                <div class="navbar-cart-inner">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'shop-isle' ); ?>" class="cart-contents">
                        <span class="icon-basket"></span>
                        <span class="cart-item-number"><?php echo esc_html( trim( WC()->cart->get_cart_contents_count() ) ); ?></span>
                    </a>
                    <?php apply_filters( 'shop_isle_cart_icon', '' ); ?>
                </div>
            <?php endif; ?>
    </div>
</nav>
<?php include '_menu_categories.php'; ?>
