<?php
function my_theme_enqueue_styles() {

    $parent_style = 'shop-isle-main-style';

    wp_enqueue_style('materialize-style', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'shop-isle-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'hana-style',
        get_stylesheet_directory_uri() . '/dist/app.css',
        wp_get_theme()->get('Version')
    );

    // wp_enqueue_script('jquery-3', 'https://code.jquery.com/jquery-3.2.1.min.js');
    // wp_enqueue_script('jquery-migrate-3', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js');
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/aef257fb83.js', array(), false, true);
    wp_enqueue_script('materialize-script', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js', array(), false, true);
    wp_enqueue_script( 'hana-script',
        get_stylesheet_directory_uri() . '/dist/app.js',
        array(), false, true
    );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/**
 * Dequeue the Parent Theme scripts.
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function my_site_WI_dequeue_script() {
    wp_deregister_script( 'jquery' ); //jQuery 1.12, no thanks!
}
 
// add_action( 'wp_print_scripts', 'my_site_WI_dequeue_script', 100 );
// 
/**
 * Dequeue the Bootstrap CSS.
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
**/
function wp_dequeue_styles() {
   wp_dequeue_style( 'bootstrap' );
   wp_dequeue_style( 'bootstrap-css' );
}
add_action( 'wp_print_styles', 'wp_dequeue_styles', 100);

// register menus
function register_my_menus() {
  register_nav_menus(
    array(
      'primary_mobile_menu' => __( 'Primary Mobile Menu' ),
      'secondary_mobile_menu' => __( 'Secondary Mobile Menu' ),
      'primary_desktop_menu' => __( 'Primary Desktop Menu' ),
      'secondary_desktop_menu' => __( 'Secondary Desktop Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>