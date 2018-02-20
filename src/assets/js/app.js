import { logo, banner } from "./images";
import { nav } from "./nav";
const $ = jQuery;

// navigation
nav.init();

const topNav = document.querySelector(".hide-on-scroll");
const topNavHeight = topNav.scrollHeight;
// hide topnav on scroll
window.addEventListener("scroll", hideTopNav);

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
}
