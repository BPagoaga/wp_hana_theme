<?php
/**
 * The front-page.php
 *
 * Template Name: Front Page
 *
 * @package ShopIsle
 */

get_header();
/* Wrapper start */

echo '<div class="main front-page">';
$big_title = get_stylesheet_directory() . '/inc/sections/shop_isle_big_title_section.php';
// load_template( apply_filters( 'shop-isle-subheader', $big_title ) );

/* Wrapper start */
$shop_isle_bg = get_theme_mod( 'background_color' );

if ( isset( $shop_isle_bg ) && $shop_isle_bg != '' ) {
    echo '<div class="main front-page-main" style="background-color: #' . $shop_isle_bg . '">';
} else {

    echo '<div class="main front-page-main" style="background-color: #FFF">';

}

if ( defined( 'WCCM_VERISON' ) ) {

    /* Woocommerce compare list plugin */
    echo '<section class="module-small wccm-frontpage-compare-list">';
    echo '<div class="container">';
    do_action( 'shop_isle_wccm_compare_list' );
    echo '</div>';
    echo '</section>';

}

/******  Banners Section */
$banners_section = get_stylesheet_directory() . '/inc/sections/shop_isle_banners_section.php';
require_once( $banners_section );

/******* Products Section */
$latest_products = get_stylesheet_directory() . '/inc/sections/shop_isle_products_section.php';
require_once( $latest_products );

/******* Video Section */
$video = get_stylesheet_directory() . '/inc/sections/shop_isle_video_section.php';
require_once( $video );
?>


<!-- réassurance -->
<div class="container">
    <!-- <div class="divider"></div> -->
    <div class="row">
        <section class="col s12">
            <ul class="collection">
            <li class="collection-item avatar col s12 m4">
                    <i class="material-icons circle">local_shipping</i>

                <p>Livraison sous 5 jours
                </p>
            </li>
            <li class="collection-item avatar col s12 m4">

                <i class="material-icons circle">verified_user</i>
                <p>Paiement Sécurisé
                </p>
            </li>
            <li class="collection-item avatar col s12 m4">

                <i class="material-icons circle">build</i>
                <a href="#">Service Client
                </a>
            </li>
        </ul>
        </section>

    </div>
</div>
<!-- réassurance -->

<?php
/******* Products Slider Section */
$products_slider = get_stylesheet_directory() . '/inc/sections/shop_isle_products_slider_section.php';
require_once( $products_slider );


get_footer();

