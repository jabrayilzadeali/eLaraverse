import "./bootstrap";
import "./carousel";
import "./theme";
import "./navbar";
import "./userOptions";
import "./productsMobileFilter";
import "./sortProducts";
import "./changeProductTab";
import "./auth";
import "./cartToggle";
import {
    updateCartUi,
    calculateTotalPrice,
    sendDataToBackend,
    updateProductsUi,
} from "./helpers";

const checkoutBtn = document.querySelector("[data-checkout-btn]");
const carts = document.querySelector("[data-carts]");
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

addToCartInShowBtn?.addEventListener("click", (e) => {
    if (e.target.matches("button")) {
        const { id, title, price, img } = e.target.dataset;
        const quantity = e.target.previousElementSibling.value;
        addCart(id, img, title, price, quantity);
        updateCartUi();
    }
});

function addCart(id, img, title, price, quantity) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    if (cartsArray.length) {
        const c = cartsArray.find((cart) => +cart.id === +id);
        console.log(cartsArray, id, c);
        if (c) {
            c.quantity += +quantity;
        } else {
            cartsArray.push({
                id: +id,
                title,
                img,
                price: +price,
                quantity: +quantity,
            });
        }
    } else {
        console.log(cartsArray);
        cartsArray.push({
            id: +id,
            title,
            img,
            price: +price,
            quantity: +quantity,
        });
    }
    if (isAuthenticated) {
        console.log("here okay", cartsArray);
        sendDataToBackend(cartsArray, "POST", "http://127.0.0.1:8000/cart");
    }
    localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
}

function removeCart(id) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    const removedItem = cartsArray.find((c) => c.id === +id);
    cartsArray = cartsArray.filter((c) => c.id !== +id);
    localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
    if (isAuthenticated) {
        console.log("Removed this item from db?", removedItem);
        sendDataToBackend(removedItem, "DELETE", "http://127.0.0.1:8000/cart");
    }
    updateCartUi();
}

addToCartBtns?.forEach((addToCartBtn) => {
    addToCartBtn.addEventListener("click", () => {
        const { id, img, title, price, quantity } = addToCartBtn.dataset;
        addCart(id, img, title, price, quantity);
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

carts?.addEventListener("click", (e) => {
    const removeCartEl = e.target.matches("[data-remove-cart]");
    console.log(removeCartEl);
    const increaseQuantity = e.target.closest("[data-increase-quantity]");
    const decreaseQuantity = e.target.closest("[data-decrease-quantity]");
    if (removeCartEl) {
        const id = e.target.dataset.removeCart;
        removeCart(id);
        const el = document.querySelector(
            `[data-remove-from-cart][data-id="${id}"]`
        );
        el?.classList.toggle("hidden");
        el?.previousElementSibling.classList.toggle("hidden");
        updateCartUi();
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
        updateCartUi();
    } else if (decreaseQuantity) {
        let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
        const id = decreaseQuantity.dataset.decreaseQuantity;
        const c = cartsArray.find((cart) => +cart.id === +id);
        console.log(c.quantity);
        if (c.quantity <= 1) {
            removeCart(id);
            const el = document.querySelector(
                `[data-remove-from-cart][data-id="${id}" ]`
            );
            el?.classList.toggle("hidden");
            el?.previousElementSibling.classList.toggle("hidden");
        } else {
            console.log("quantity: ", c.quantity);

            c.quantity--;

            if (isAuthenticated) {
                console.log(c);
                sendDataToBackend(
                    c,
                    "PATCH",
                    "http://127.0.0.1:8000/change_cart_quantity"
                );
            }
            localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
        }
        updateCartUi();
        console.log("decrease quantity");
    }
});

async function getData(queryParam) {
    const url = `http://127.0.0.1:8000/api/cart/index?query=${queryParam}`;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log(json);
    } catch {
        console.error(error.message);
    }
}

if (document.URL.includes("checkout")) {
    const totalPrice = calculateTotalPrice();
    const totalPriceElements = document.querySelectorAll("[data-total-price]");
    totalPriceElements.forEach(
        (totalPriceElement) => (totalPriceElement.textContent = totalPrice)
    );
}

updateProductsUi();

localStorage.setItem("firstTimeLogin", false);
