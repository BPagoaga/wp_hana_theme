<?php
require 'functions/my_theme_enqueue_styles.php';
require 'functions/register_menus.php';
require 'functions/register_widgets.php';
require 'functions/custom_sections.php';
require 'functions/custom_loop_functions.php';
require 'inc/woocommerce/functions.php';

//Remove a function from the parent theme
function remove_parent_filters(){ //Have to do it after theme setup, because child theme functions are loaded first
	remove_filter('woocommerce_page_title', 'shop_isle_header_shop_page');
}
add_action( 'after_setup_theme', 'remove_parent_filters' );

