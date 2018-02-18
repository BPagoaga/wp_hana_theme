<?php

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