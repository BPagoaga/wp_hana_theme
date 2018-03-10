<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package WordPress
 * @subpackage Shop Isle
 */


if ( ! function_exists( 'shop_isle_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function shop_isle_before_content() {
		?>
		<div class="main">
			<?php
	}
}

if ( ! function_exists( 'shop_isle_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function shop_isle_after_content() {
		?>
		</div><!-- .main -->

		<?php
	}
}

if ( ! function_exists( 'shop_isle_shop_page_wrapper' ) ) {

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

							<div class="col s9 shop-with-sidebar" id="shop-isle-blog-container">

						<?php endif; ?>

				<?php endif; ?>

		<?php
	}
}

if ( ! function_exists( 'shop_isle_product_page_wrapper_end' ) ) {
	/**
	 * After Product content
	 * Closes the wrapping div and section
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function shop_isle_product_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php
	}
}

if ( ! function_exists( 'shop_isle_shop_page_wrapper_end' ) ) {
	/**
	 * After Shop loop
	 * Closes the wrapping div and section
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function shop_isle_shop_page_wrapper_end() {
		?>

			<?php if ( ( is_shop() || is_product_category() || is_product_tag() ) && is_active_sidebar( 'shop-isle-sidebar-shop-archive' ) ) : ?>

				</div>

				<!-- Sidebar column start -->
				<div class="col s3 m3 sidebar sidebar-shop">
					<?php do_action( 'shop_isle_sidebar_shop_archive' ); ?>
				</div>
				<!-- Sidebar column end -->

			<?php endif; ?>

			</div><!-- .container -->
		</section><!-- .module-small -->
		<?php
	}
}

if ( ! function_exists( 'shop_isle_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array            Fragments to refresh via AJAX.
	 */
	function shop_isle_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		shop_isle_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'shop_isle_search_products_no_results_wrapper' ) ) {
	/**
	 * No results on search wrapper start.
	 */
	function shop_isle_search_products_no_results_wrapper() {

		$shop_isle_body_classes = get_body_class();

		if ( is_search() && in_array( 'woocommerce', $shop_isle_body_classes ) && in_array( 'search-no-results', $shop_isle_body_classes ) ) {
			echo '<section class="module-small module-small-shop">';
				echo '<div class="container">';
		}
	}
}

if ( ! function_exists( 'shop_isle_search_products_no_results_wrapper_end' ) ) {
	/**
	 * No results on search wrapper end.
	 */
	function shop_isle_search_products_no_results_wrapper_end() {

		$shop_isle_body_classes = get_body_class();

		if ( is_search() && in_array( 'woocommerce', $shop_isle_body_classes ) && in_array( 'search-no-results', $shop_isle_body_classes ) ) {
				echo '</div><!-- .container -->';
			echo '</section><!-- .module-small -->';
		}
	}
}

if ( ! function_exists( 'shop_isle_always_show_live_cart' ) ) {
	/**
	 *  Force WC_Widget_Cart widget to show on cart and checkout pages
	 *  Used for the live cart in header
	 */
	function shop_isle_always_show_live_cart() {
		return false;
	}
}

if ( ! function_exists( 'shop_isle_loop_product_thumbnail' ) ) {
	/**
	 * Get the product thumbnail, or the placeholder if not set.
	 */
	function shop_isle_loop_product_thumbnail() {
		global $product;
		$image_size = 'shop_catalog';

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_gallery_image_ids' ) ) {
			$shop_isle_gallery_attachment_ids = $product->get_gallery_image_ids();
		} elseif ( function_exists( 'method_exists' ) && method_exists( $product, 'get_gallery_attachment_ids' ) ) {
			$shop_isle_gallery_attachment_ids = $product->get_gallery_attachment_ids();
		}

		if ( has_post_thumbnail() ) {
			if ( function_exists( 'wc_get_product_attachment_props' ) ) {

				$props      = wc_get_product_attachment_props( get_post_thumbnail_id(), $product );
				$product_id = get_the_ID();
				echo get_the_post_thumbnail(
					$product_id, $image_size, array(
						'title' => $props['title'],
						'alt'   => $props['alt'],
					)
				);
			}

			if ( ! empty( $shop_isle_gallery_attachment_ids[0] ) ) :
				echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[0], $image_size );
			endif;

		} elseif ( ! empty( $shop_isle_gallery_attachment_ids ) ) {

			if ( ! empty( $shop_isle_gallery_attachment_ids[0] ) ) :
				echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[0], $image_size );
			endif;

			if ( ! empty( $shop_isle_gallery_attachment_ids[1] ) ) :
				echo wp_get_attachment_image( $shop_isle_gallery_attachment_ids[1], $image_size );
			endif;

		} elseif ( function_exists( 'wc_placeholder_img_src' ) ) {

			$shop_isle_placeholder_img = wc_placeholder_img( $image_size );

			if ( ! empty( $shop_isle_placeholder_img ) ) {
				echo $shop_isle_placeholder_img;
			}
		}
	}
}// End if().


if ( ! function_exists( 'shop_isle_woocommerce_taxonomy_archive_description' ) ) {
	/**
	 * Display WooCommerce product category description on all category archive pages
	 */
	function shop_isle_woocommerce_taxonomy_archive_description() {
		if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) != 0 ) {
			$description = wc_format_content( term_description() );
			if ( $description ) {
				echo '<div class="term-description">' . $description . '</div>';
			}
		}
	}
}
add_action( 'woocommerce_archive_description', 'shop_isle_woocommerce_taxonomy_archive_description' );


if ( ! function_exists( 'shop_isle_woocommerce_product_archive_description' ) ) {
	/**
	 * Display WooCommerce shop content on all shop pages
	 */
	function shop_isle_woocommerce_product_archive_description() {
		if ( is_post_type_archive( 'product' ) ) {
			$shop_page = get_post( wc_get_page_id( 'shop' ) );
			if ( $shop_page ) {
				$description = wc_format_content( $shop_page->post_content );
				if ( $description ) {
					echo '<div class="page-description">' . $description . '</div>';
				}
			}
		}
	}
}
