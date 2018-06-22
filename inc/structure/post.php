<?php
/**
 * Template functions used for posts.
 * See parent file for functions to modify
 *
 * @package WordPress
 * @subpackage Shop Isle Child
 */


/**
 * Prints HTML with meta information for the current post-date/time and author on single template.
 */
function shop_isle_posted_on() {
	$shop_isle_post_author = get_the_author();

	$time_string = '<time class="entry-date published updated date" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'l j F Y' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'l j F Y' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( ! empty( $time_string ) ) :
		echo '<a href="' . esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ) . '" rel="bookmark"><i class="material-icons">access_time</i>' . $time_string . '</a>';
	endif;

	if ( ! empty( $shop_isle_post_author ) ) :
		echo '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="author vcard"><i class="material-icons">person</i>' . esc_html( get_the_author() ) . '</a>';
	endif;

	$shop_isle_num_comments = get_comments_number();

	if ( $shop_isle_num_comments == 0 ) {
		$shop_isle_comments = __( 'No Comments', 'shop-isle' );
	} elseif ( $shop_isle_num_comments > 1 ) {
		$shop_isle_comments = $shop_isle_num_comments . __( ' Comments', 'shop-isle' );
	} else {
		$shop_isle_comments = __( '1 Comment', 'shop-isle' );
	}
	if ( ! empty( $shop_isle_comments ) ) :
		echo '<a href="' . esc_url( get_comments_link() ) . '"><i class="material-icons">comment</i>' . esc_html( $shop_isle_comments ) . '</a>';
	endif;

	$shop_isle_categories = get_the_category();
	$separator            = ', ';
	$shop_isleoutput      = '';
	// if ( $shop_isle_categories ) {
	// 	foreach ( $shop_isle_categories as $shop_isle_category ) {
	// 		$shop_isleoutput .= '<a href="' . esc_url( get_category_link( $shop_isle_category->term_id ) ) . '" title="' . esc_attr(
	// 			sprintf(
	// 				/* translators: s: category name */
	// 				__( 'View all posts in %s', 'shop-isle' ), $shop_isle_category->name
	// 			)
	// 		) . '">' . esc_html( $shop_isle_category->cat_name ) . '</a>' . $separator;
	// 	}
	// 	echo trim( $shop_isleoutput, $separator );
	// }

}

/**
 * Template pour le post-meta dans le loop template
 *
 * @return void
 */
function shop_isle_posted_on_loop() {
	$shop_isle_post_author = get_the_author();

	$time_string = '<time class="entry-date published updated date" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'l j F Y' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'l j F Y' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( ! empty( $time_string ) ) :
		echo '<a href="' . esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ) . '" rel="bookmark"><i class="material-icons">access_time</i>' . $time_string . '</a><br>';
	endif;

	if ( ! empty( $shop_isle_post_author ) ) :
		echo '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="author vcard"><i class="material-icons">person</i>' . esc_html( get_the_author() ) . '</a>';
	endif;

	$shop_isle_num_comments = get_comments_number();

	if ( $shop_isle_num_comments == 0 ) {
		$shop_isle_comments = __( 'No Comments', 'shop-isle' );
	} elseif ( $shop_isle_num_comments > 1 ) {
		$shop_isle_comments = $shop_isle_num_comments . __( ' Comments', 'shop-isle' );
	} else {
		$shop_isle_comments = __( '1 Comment', 'shop-isle' );
	}
	if ( ! empty( $shop_isle_comments ) ) :
		echo '<a href="' . esc_url( get_comments_link() ) . '"><i class="material-icons">comment</i>' . esc_html( $shop_isle_comments ) . '</a>';
	endif;

	$shop_isle_categories = get_the_category();
	$separator            = ', ';
	$shop_isleoutput      = '';
	// if ( $shop_isle_categories ) {
	// 	foreach ( $shop_isle_categories as $shop_isle_category ) {
	// 		$shop_isleoutput .= '<a href="' . esc_url( get_category_link( $shop_isle_category->term_id ) ) . '" title="' . esc_attr(
	// 			sprintf(
	// 				/* translators: s: category name */
	// 				__( 'View all posts in %s', 'shop-isle' ), $shop_isle_category->name
	// 			)
	// 		) . '">' . esc_html( $shop_isle_category->cat_name ) . '</a>' . $separator;
	// 	}
	// 	echo trim( $shop_isleoutput, $separator );
	// }

}

