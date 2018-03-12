<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
echo "single article";

	/*
	 * @hooked shop_isle_post_header - 10
	 * @hooked shop_isle_post_meta - 20
	 * @hooked shop_isle_post_content - 30
	 */
	do_action( 'shop_isle_single_post' );


