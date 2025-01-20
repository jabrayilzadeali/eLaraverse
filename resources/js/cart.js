import { updateCartUi, sendDataToBackend } from "./helpers";
const navbarCarts = document.querySelector("[data-carts]");
const checkoutCarts = document.querySelector("[data-carts-checkout]");

const addToCartBtns = document.querySelectorAll("[data-add-to-cart]");
const removeFromCartBtns = document.querySelectorAll("[data-remove-from-cart]");
const addToCartInShowBtn = document.querySelector("[data-add-to-cart-in-show]");

if (isAuthenticated && localStorage.getItem("firstTimeLogin") === "true") {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    sendDataToBackend(cartsArray, "POST", "http://127.0.0.1:8000/fetch_carts")
        .then((carts) => {
            localStorage.setItem("firstTimeLogin", false);
            localStorage.setItem("cartsArray", JSON.stringify(carts.carts));
            updateCartUi();
        })
        .catch((error) => {
            console.error("Error fetching carts:", error);
        });
}


export function addCart(id, img, title, price, discounted_price, discount, quantity, stock = 0) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    if (cartsArray.length) {
        const c = cartsArray.find((cart) => +cart.id === +id);
        if (c) {
            c.quantity += +quantity;
        } else {
            cartsArray.push({
                id: +id,
                title,
                img,
                price: +price,
                quantity: +quantity,
                discount: +discount,
                discounted_price: +discounted_price,
                stock: +stock,
            });
        }
    } else {
        cartsArray.push({
            id: +id,
            title,
            img,
            price: +price,
            quantity: +quantity,
            discount: +discount,
            discounted_price: +discounted_price,
            stock: +stock,
        });
    }
    if (isAuthenticated) {
        sendDataToBackend(cartsArray, "POST", "http://127.0.0.1:8000/cart");
    }
    localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
}

export function removeCart(id) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    const removedItem = cartsArray.find((c) => c.id === +id);
    cartsArray = cartsArray.filter((c) => c.id !== +id);
    localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
    if (isAuthenticated) {
        sendDataToBackend(removedItem, "DELETE", "http://127.0.0.1:8000/cart");
    }
    updateCartUi();
}

function cartOperations(e) {
    const removeCartEl = e.target.matches("[data-remove-cart]");
    const increaseQuantity = e.target.closest("[data-increase-quantity]");
    const decreaseQuantity = e.target.closest("[data-decrease-quantity]");
    if (removeCartEl) {
        const id = e.target.dataset.removeCart
        removeCart(id);
        const el = document.querySelector(
            `[data-remove-from-cart][data-id="${id}"]`
        );
        el?.classList.toggle("hidden");
        el?.previousElementSibling.classList.toggle("hidden");
    } else if (increaseQuantity) {
        let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
        const id = increaseQuantity.dataset.increaseQuantity;
        const c = cartsArray.find((cart) => +cart.id === +id);
        c.quantity++;
        if (isAuthenticated) {
            sendDataToBackend(
                c,
                "PATCH",
                "http://127.0.0.1:8000/change_cart_quantity"
            );
        }
        localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
    } else if (decreaseQuantity) {
        let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
        const id = decreaseQuantity.dataset.decreaseQuantity;
        const c = cartsArray.find((cart) => +cart.id === +id);
        if (c.quantity <= 1) {
            removeCart(id);
            const el = document.querySelector(
                `[data-remove-from-cart][data-id="${id}" ]`
            );
            el?.classList.toggle("hidden");
            el?.previousElementSibling.classList.toggle("hidden");
        } else {
            c.quantity--;

            if (isAuthenticated) {
                sendDataToBackend(
                    c,
                    "PATCH",
                    "http://127.0.0.1:8000/change_cart_quantity"
                );
            }

            localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
        }
    }
    updateCartUi()
    if (document.URL.includes("checkout")) {
        updateCartUi(document.querySelector('[data-carts-checkout]'))
    }
}

navbarCarts?.addEventListener("click", (e) => cartOperations(e));
checkoutCarts?.addEventListener("click", (e) => cartOperations(e));


addToCartInShowBtn?.addEventListener("click", (e) => {
    if (e.target.matches("button")) {
        const { id, img, title, price, discountedPrice, discount, stock } = e.target.dataset;
        console.log(price, discountedPrice, discount)
        const quantity = e.target.previousElementSibling.value;
        addCart(id, img, title, price, discountedPrice, discount, quantity, stock);
        updateCartUi();
    }
});

addToCartBtns?.forEach((addToCartBtn) => {
    addToCartBtn.addEventListener("click", () => {
        const { id, img, title, price, discountedPrice, discount, quantity, stock } = addToCartBtn.dataset;
        console.log(discountedPrice)
        addCart(id, img, title, price, discountedPrice, discount, quantity, stock);
        addToCartBtn.classList.toggle("hidden");
        addToCartBtn.nextElementSibling.classList.toggle("hidden");
    });
});

removeFromCartBtns?.forEach((removeFromCartBtn) => {
    removeFromCartBtn.addEventListener("click", () => {
        removeCart(removeFromCartBtn.dataset.id);
        removeFromCartBtn.classList.toggle("hidden");
        removeFromCartBtn.previousElementSibling.classList.toggle("hidden");
    });
});