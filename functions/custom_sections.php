<?php

/**
 * Output the WooCommerce Breadcrumb.
 *
 * @param array $args Arguments.
 */
function woocommerce_breadcrumb( $args = array() ) {
    $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
        'delimiter'   => '&nbsp;&gt;&nbsp;',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Accueil', 'breadcrumb', 'woocommerce' ),
    ) ) );

    $breadcrumbs = new WC_Breadcrumb();

    if ( ! empty( $args['home'] ) ) {
        $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
    }

    $args['breadcrumb'] = $breadcrumbs->generate();

    /**
     * WooCommerce Breadcrumb hook
     *
     * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
     */
    do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

    wc_get_template( 'global/breadcrumb.php', $args );
}

/**
 * Before Shop loop
 *
 * @since   1.0.0
 * @return  void
 */
function shop_isle_shop_page_wrapper() {
    ?>
    <section class="module-small module-small-shop">
            <div class="container">

            <?php
            if ( is_shop() || is_product_tag() || is_product_category() ) :

                    do_action( 'shop_isle_before_shop' );

                if ( is_active_sidebar( 'shop-isle-sidebar-shop-archive' ) ) :
                ?>

                        <div class="col s9" id="shop-isle-blog-container">

                    <?php endif; ?>

            <?php endif; ?>

    <?php
}