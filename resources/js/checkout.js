import { updateCartUi, calculateTotalPrice } from "./helpers";

if (document.URL.includes("checkout")) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    const totalPriceElements = document.querySelectorAll("[data-total-price]");
    const form = document.querySelector("[data-form-checkout]");
    const notInCart = document.querySelector("[data-not-in-cart-checkout]");
    const totalPrice = calculateTotalPrice();
    const userBalance = document.querySelector("[data-user-balance]")

    totalPriceElements.forEach(
        (totalPriceElement) => (totalPriceElement.textContent = totalPrice)
    );

    updateCartUi(document.querySelector("[data-carts-checkout]"));

    if (cartsArray.length) {
        form.classList.remove("hidden");
        notInCart.classList.add("hidden");
    } else {
        form.classList.add("hidden");
        notInCart.classList.remove("hidden");
    }
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        if (isAuthenticated & +userBalance.textContent >= +totalPrice) {
            let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
            const allStockSufficient  = cartsArray.every(cart => cart.stock >= cart.quantity)
            console.log(allStockSufficient)
            if (allStockSufficient) {
                localStorage.removeItem("cartsArray");
                form.submit()
            }

        } else {
        }
    })
}
