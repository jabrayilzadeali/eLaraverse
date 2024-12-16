import "./bootstrap";

const mobileMenuToggleBtn = document.querySelector(
    "[data-mobile-menu-toggle-btn]"
);
const mobileMenuClosed = document.querySelector(
    "[data-mobile-menu-closed-icon]"
);
const mobileMenuOpen = document.querySelector("[data-mobile-menu-open-icon]");
const mobileMenuLinks = document.querySelector("[data-mobile-menu-links]");
const userOptionBtn = document.querySelector("[data-user-option-btn]");
const userOptionList = document.querySelector("[data-user-option-list]");

const checkout = document.querySelector("[data-checkout]");
const cartBtn = document.querySelector("[data-cart-button]");
const cartCloseBtn = document.querySelector("[data-cart-close-btn]");
const carts = document.querySelector("[data-carts]");
const carts_array = [];

function carts_functionality() {
    const addToCartBtns = document.querySelectorAll("[data-add-to-cart]");
    const removeFromCartBtns = document.querySelectorAll(
        "[data-remove-from-cart]"
    );
    addToCartBtns.forEach((addToCartBtn) => {
        addToCartBtn.addEventListener("click", () => {
            carts_array.push(+addToCartBtn.dataset.id);
            addToCartBtn.classList.toggle("hidden");
            addToCartBtn.nextElementSibling.classList.toggle("hidden");
            console.log(carts_array);
        });
    });

    removeFromCartBtns.forEach((removeFromCartBtn) => {
        removeFromCartBtn.addEventListener("click", () => {
            const index = carts_array.indexOf(+removeFromCartBtn.dataset.id);
            if (index > -1) {
                carts_array.splice(index, 1);
            }
            removeFromCartBtn.classList.toggle("hidden");
            removeFromCartBtn.previousElementSibling.classList.toggle("hidden");
            console.log(carts_array);
        });
    });
}
carts_functionality();
// const removeCartBtns = document.querySelectorAll('[data-remove-cart]')

cartCloseBtn.addEventListener("click", () => {
    checkout.classList.toggle("hidden");
});

async function getData(queryParam) {
  const url = `http://127.0.0.1:8000/api/cart/index?query=${queryParam}`
  try {
    const response = await fetch(url)
    if (!response.ok) {
      throw new Error (`Response status: ${response.status}`)
    }
    const json = await response.json()
    console.log(json)
  } catch {
    console.error(error.message)
  }
}

cartBtn.addEventListener("click", () => {
  getData(carts_array)
    // const csrfToken = document.querySelector('meta[name="csrf-token"]').content

    // fetch("http://127.0.0.1:8000/api/cart/index", {
    //     method: "POST",
    //     body: JSON.stringify(carts_array),
    //     headers: {
    //         "Content-type": "application/json; charset=UTF-8",
    //         "X-CSRF-Token":                 .content, // Include the token
    //     },
    // });

    fetch(``)
    checkout.classList.toggle("hidden");
});

mobileMenuToggleBtn?.addEventListener("click", () => {
    mobileMenuOpen.classList.toggle("hidden");
    mobileMenuClosed.classList.toggle("hidden");
    mobileMenuLinks.classList.toggle("hidden");
});

userOptionBtn?.addEventListener("click", () => {
    userOptionList.classList.toggle("hidden");
});
