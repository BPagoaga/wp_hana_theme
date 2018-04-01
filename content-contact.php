<?php
/**
 * Contact section.
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
?>
		<section class="module">
			<div class="container">
				<div class="row">
					<p class="col s12">Page de contact</p>
					<?php
						$shop_isle_contact_page_form_shortcode = get_theme_mod( 'shop_isle_contact_page_form_shortcode' );

						$is_content  = $post->post_content !== '' ? true : false;
						$is_shotcode = ! empty( $shop_isle_contact_page_form_shortcode ) ? true : false;

					if ( $is_shotcode ) {

						echo '<div class="col s12  ' . ( $is_content ? 'm6' : 'm12' ) . ' contact-page-form">';

						echo do_shortcode( $shop_isle_contact_page_form_shortcode );

						echo '</div>';

					}

					if ( $is_content ) {

						echo '<div class="col-xs-12 ' . ( $is_shotcode ? 'col-sm-6' : 'col-sm-12' ) . '">';

						the_content();

						echo '</div>';
					}

					?>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Contact end -->

		<!-- Map start -->
		<?php
			$shop_isle_contact_page_map_shortcode = get_theme_mod( 'shop_isle_contact_page_map_shortcode' );
		if ( ! empty( $shop_isle_contact_page_map_shortcode ) ) :
			echo '<section id="map-section">';
			echo '<div id="map">' . do_shortcode( $shop_isle_contact_page_map_shortcode ) . '</div>';
			echo '</section>';
			endif;
		?>
		<!-- Map end -->
