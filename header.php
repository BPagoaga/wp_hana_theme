<?php
/**
 * The header for our theme.
 *
 * @package shop-isle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php } ?>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php do_action( 'shop_isle_before_header' ); ?>

    <!-- Preloader -->
    <?php

    /* Preloader */
    if ( is_front_page() && ! is_customize_preview() ) :

        $shop_isle_disable_preloader = get_theme_mod( 'shop_isle_disable_preloader' );

        if ( isset( $shop_isle_disable_preloader ) && ( $shop_isle_disable_preloader != 1 ) ) :

            echo '<div class="page-loader">';
                echo '<div class="loader">' . __( 'Loading...', 'shop-isle' ) . '</div>';
            echo '</div>';

        endif;

    endif;

    $header_class = '';
    $hide_top_bar = get_theme_mod( 'shop_isle_top_bar_hide', true );
    if ( (bool) $hide_top_bar === false ) {
        $header_class .= 'header-with-topbar';
    }
    ?>

    <header class="header <?php echo esc_attr( $header_class ); ?>">
    <!-- navbar top fixed-->
        <div class="navbar-fixed">
            <nav class="component extended hide-on-scroll active">
              <div class="nav-wrapper flex-container">
                <!-- Hamburger -->
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="material-icons">account_circle</i>
                </a>
                <figure class="hide-on-med-and-down">
                    <?php the_custom_logo(); ?>
                </figure>
                <?php if ( is_front_page() ) : ?>
                    <h1 class="site-title"><a href="<?= esc_url( home_url( '/' ) ) ?>" title="<?= esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" rel="home"><?= get_bloginfo( 'name' ) ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?= esc_url( home_url( '/' ) ) ?>" title="<?= esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" rel="home"><?= get_bloginfo( 'name' ) ?></a></p>
                <?php endif; ?>
                <!-- secondary desktop menu -->
                <?php include 'inc/structure/nav/_secondary_desktop.php'; ?>
              </div>
              <div class="nav-content hide-on-large-only">
                    <!-- primary mobile menu -->
                    <?php include 'inc/structure/nav/_primary_mobile.php'; ?>
                </div>
            </nav>
        </div>
        <!-- Mobile nav-->
        <!-- secondary mobile -->
        <?php include 'inc/structure/nav/_secondary_mobile.php'; ?>
        <div class="container">
            <img src="<?= get_stylesheet_directory_uri() . '/dist/banniere-Hana-test-2.png' ?>" class="responsive-img banner">
            <!-- Navigation principale -->
            <?php include 'inc/structure/nav/_primary_desktop.php'; ?>

        </div>

    </header>
