<?php
/**
 * The template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Shop Isle
 */

get_header(); ?>

<!-- Wrapper start -->
<section class="container section-single-post">
	<div class="row">
		<main role="main" class="col s12 l8">
			<!-- Post single start -->
			<article>
			<?php
			while ( have_posts() ) :
				the_post();
			?>

				<?php

				do_action( 'shop_isle_single_post_before' );

				get_template_part( 'content', 'single' );

				/**
				 * After single post hook.
				 *
				 * @hooked shop_isle_post_nav - 10
				 */
				do_action( 'shop_isle_single_post_after' );
				?>

			<?php endwhile; ?>
			</article>
			<!-- Post single end -->
		</main>

		<aside role="complementary" class="col s12 l3 offset-l1">
			<?php do_action( 'shop_isle_sidebar' ); ?>
		</aside>
	</div>
</section>



<?php get_footer(); ?>
