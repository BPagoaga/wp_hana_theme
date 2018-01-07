const nav = {
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
