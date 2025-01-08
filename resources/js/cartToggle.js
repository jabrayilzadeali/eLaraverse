const cartBtn = document.querySelector("[data-cart-button]");
const cartCloseBtn = document.querySelector("[data-cart-close-btn]");
const checkout = document.querySelector("[data-checkout]");
import { updateCartUi } from "./helpers"

cartBtn?.addEventListener("click", () => {
    updateCartUi();
    checkout.classList.toggle("hidden");
});

cartCloseBtn?.addEventListener("click", () => {
    checkout.classList.toggle("hidden");
});
