import { logo, banner } from "./images";
const $ = jQuery;

// Mobile scripts
if (window.innerWidth <= 768) {
  const topNav = document.querySelector(".hide-on-scroll");
  const topNavHeight = topNav.scrollHeight;
  // init mobile nav
  $(".button-collapse").sideNav();

  // hide topnav on scroll
  window.addEventListener("scroll", hideTopNav);

  function hideTopNav(e) {
    if (window.scrollY > topNavHeight) {
      topNav.classList.add("hidden");
    } else {
      topNav.classList.remove("hidden");
    }
  }

  function debounce(func, wait = 20, immediate = true) {
    var timeout;
    return function() {
      var context = this,
        args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }
}
