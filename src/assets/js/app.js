import { logo, banner } from "./images";
import { nav } from "./nav";
import { navigation } from "./navigation";
const $ = jQuery;

// navigation
nav.init();

const topNav = document.querySelector(".hide-on-scroll");
const topNavHeight = topNav.scrollHeight;
// hide topnav on scroll
window.addEventListener("scroll", hideTopNav);

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
// Mobile scripts
if (window.innerWidth <= 768) {
  // init mobile nav
  $(".button-collapse").sideNav();
  nav.mobile.init();
}
