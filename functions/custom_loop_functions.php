<?php

/**
 * Product Loop Items.
 *
 * @see woocommerce_template_loop_product_link_open()
 * @see woocommerce_template_loop_product_link_close()
 * @see woocommerce_template_loop_add_to_cart()
 * @see woocommerce_template_loop_product_thumbnail()
 * @see woocommerce_template_loop_product_title()
 * @see woocommerce_template_loop_category_link_open()
 * @see woocommerce_template_loop_category_title()
 * @see woocommerce_template_loop_category_link_close()
 * @see woocommerce_template_loop_price()
 * @see woocommerce_template_loop_rating()
 */

/**
 * Insert the opening anchor tag for products in the loop.
 */
function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    echo '<a href="' . esc_url( $link ) . '" class="product_front_page woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}

/**
 * Insert the opening anchor tag for products in the loop.
 */
function woocommerce_template_loop_product_link_close() {
    echo '</a>';
}

/**
 * Get the add to cart template for the loop.
 *
 * @param array $args Arguments.
 */
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

    if ( $product ) {
        $defaults = array(
            'quantity'   => 1,
            'class'      => implode( ' ', array_filter( array(
                'button',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
            ) ) ),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

        wc_get_template( 'loop/add-to-cart.php', $args );
    }
}

/**
 * Show the product title in the product loop. By default this is an H2.
 */
function woocommerce_template_loop_product_title() {
    echo '<div class="card-content">';
    echo '<h4 class="card-title woocommerce-loop-product__title">' . get_the_title() . '</h2>';
    echo '</div>';
}

/**
 * Insert the opening anchor tag for categories in the loop.
 *
 * @param int|object|string $category Category ID, Object or String.
 */
function woocommerce_template_loop_category_link_open( $category ) {
    echo '<a href="' . esc_url( get_term_link( $category, 'product_cat' ) ) . '">';
}

/**
 * Show the subcategory title in the product loop.
 *
 * @param object $category Category object.
 */
function woocommerce_template_loop_category_title( $category ) {
    ?>
    <h2 class="woocommerce-loop-category__title">
        <?php
        echo esc_html( $category->name );

        if ( $category->count > 0 ) {
            echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
        }
        ?>
    </h2>
    <?php
}

/**
 * Insert the closing anchor tag for categories in the loop.
 */
function woocommerce_template_loop_category_link_close() {
    echo '</a>';
}

