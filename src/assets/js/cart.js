const addToCart = function() {};

const cart = {
  init() {
    const addToCartBtn = document.getElementById("add-to-cart");

    if (addToCartBtn !== null) {
      addToCartBtn.addEventListener("click", this.addToCart);
    }
  },
  addToCart(e) {
    console.log(e);
  }
};

export { cart };
