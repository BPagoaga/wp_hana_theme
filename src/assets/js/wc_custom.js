export const wc_custom = {
  init() {
    const wcBackwardButtons = document.querySelectorAll(".wc-backward");

    wcBackwardButtons.forEach(button => {
      button.classList.add("btn");
      button.classList.remove("wc-backward");
    });
  }
};
