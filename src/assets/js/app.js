import { logo, banner } from "./images";
import { nav } from "./nav";
import { navigation } from "./navigation";
import { wc_custom } from "./wc_custom";
const $ = jQuery;

// navigation
nav.init();

// customization
wc_custom.init();
initMobileScripts();

const topNav = document.querySelector(".hide-on-scroll");
const topNavHeight = topNav.scrollHeight;
// hide topnav on scroll
window.addEventListener("scroll", hideTopNav);
window.addEventListener("resize", initMobileScripts);
$(".carousel.carousel-slider").carousel({
  fullWidth: true,
  indicators: true
});

$("#menu-desktop-secondary-menu li.cart a").append(
  $("#secondary-desktop-cart-number")
);
$("#menu-mobile-primary-menu li.cart a").append(
  $("#primary-mobile-cart-number")
);

function hideTopNav(e) {
  if (window.scrollY > topNavHeight) {
    topNav.classList.add("hidden");
  } else {
    topNav.classList.remove("hidden");
  }
}

function initMobileScripts() {
  const sousMenu = document.querySelector(".sous-menu");
  const mobNav = document.querySelector(".nav-content.hide-on-large-only");
  const desktopNav = document.querySelector("header.header .container");

  // Mobile scripts
  if (window.innerWidth <= 768) {
    // init mobile nav
    $(".button-collapse").sideNav();
    nav.mobile.init();

    // sous menu à déplacer
    mobNav.append(sousMenu);
  } else {
    desktopNav.append(sousMenu);
  }
}
