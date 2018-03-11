<?php
wp_nav_menu(
    array(
        'theme_location' => 'primary_mobile_menu',
        'container'      => false,
        'menu_class'     => 'tabs component',
    )
);

//cart icon
 if ( function_exists( 'WC' ) ) : ?>
    <a id="primary-mobile-cart-number" class="btn-floating btn-large waves-effect waves-light cart-item-number"><?php echo esc_html( trim( WC()->cart->get_cart_contents_count() ) ); ?></a>
<?php endif; ?>

