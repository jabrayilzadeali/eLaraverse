import { updateCartUi } from "./helpers";

const logoutForm = document.querySelector("[data-logout-user]");

logoutForm?.addEventListener("submit", (e) => {
    localStorage.removeItem("cartsArray");
    updateCartUi();
});
