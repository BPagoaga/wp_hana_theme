const nav = {
  mobile: {
    init() {
      const tabsLinks = document.querySelectorAll(".tab");

      tabsLinks.forEach(link => link.addEventListener("click", this.goToUrl));
    },
    goToUrl(e) {
      const link = e.target.parentElement;
      const url = link.href;
      if (!link.parentElement.classList.contains("catalog")) {
        window.location = url;
      }
    }
  },
  init() {
    const catalogLinks = document.querySelectorAll(".catalog a");

    catalogLinks.forEach(link =>
      link.addEventListener("click", this.toggleHidden)
    );
  },
  toggleHidden(e) {
    const sousMenus = document.querySelectorAll(".sous-menu");
    e.preventDefault();
    sousMenus.forEach(sousMenu => sousMenu.classList.toggle("hidden"));
  }
};

export { nav };
