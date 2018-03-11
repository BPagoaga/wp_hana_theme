<?php
wp_nav_menu(
    array(
        'theme_location' => 'secondary_desktop_menu',
        'container'      => false,
        'menu_class'     => 'right hide-on-med-and-down',
    )
);

//cart icon
if ( function_exists( 'WC' ) ) : ?>
<a id="secondary-desktop-cart-number" class="hide-on-med-and-down btn-floating btn-large waves-effect waves-light cart-item-number"><?php echo esc_html( trim( WC()->cart->get_cart_contents_count() ) ); ?></a>
<?php endif; ?>