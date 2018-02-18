<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shop_isle_child_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Sidebar', 'shop-isle-child' ),
      'id'            => 'sidebar-1',
      'description'   => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Footer area 1', 'shop-isle-child' ),
      'id'            => 'sidebar-footer-area-1',
      'description'   => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name'          => __( 'Sous-menu', 'shop-isle-child' ),
      'id'            => 'sidebar-sous-menu',
      'description'   => '',
    )
  );

}
add_action( 'init', 'shop_isle_child_widgets_init' );