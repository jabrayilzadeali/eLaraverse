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

function removeCart(id) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray"));
    cartsArray = cartsArray.filter(
        (c) => c.id !== +id
    );
    localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
}

function carts_functionality() {
    const addToCartBtns = document.querySelectorAll("[data-add-to-cart]");
    const removeFromCartBtns = document.querySelectorAll(
        "[data-remove-from-cart]"
    );
    let cartsArray = JSON.parse(localStorage.getItem('cartsArray') || '[]');
    console.log(cartsArray)
    addToCartBtns.forEach((addToCartBtn) => {
        addToCartBtn.addEventListener("click", () => {
            console.log('button clicked')
            const { id, img, title, price, quantity } = addToCartBtn.dataset;
            cartsArray.push({
                id: +id,
                title,
                img,
                price: +price,
                quantity,
            });
            localStorage.setItem("cartsArray", JSON.stringify(cartsArray));
            addToCartBtn.classList.toggle("hidden");
            addToCartBtn.nextElementSibling.classList.toggle("hidden");
        });
    });

    removeFromCartBtns.forEach((removeFromCartBtn) => {
        removeFromCartBtn.addEventListener("click", () => {
            removeCart(removeFromCartBtn.dataset.id)
            removeFromCartBtn.classList.toggle("hidden");
            removeFromCartBtn.previousElementSibling.classList.toggle("hidden");
        });
    });
}
carts_functionality();
// const removeCartBtns = document.querySelectorAll('[data-remove-cart]')

carts.addEventListener('click', (e) => {
    if (e.target.matches('[data-remove-cart]')) {
        const id = e.target.dataset.removeCart;
        removeCart(id)
        const el = document.querySelector(`[data-remove-from-cart][data-id="${id}"]`)
        el.classList.toggle('hidden')
        el.previousElementSibling.classList.toggle("hidden");
        updateCartUi()
        // e.target.parentElement.remove()
        // console.log(e.target)
    }
})

cartCloseBtn.addEventListener("click", () => {
    checkout.classList.toggle("hidden");
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

function createTemplate(id, img, title, price, quantity = 1) {
    return `
        <li data-cart-id="${id}" class="flex py-6">
            <div
                class="overflow-hidden border border-gray-200 rounded-md size-24 shrink-0">
                <img src="${ img }"
                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                    class="object-cover size-full">
            </div>

            <div class="flex flex-col flex-1 ml-4">
                <div>
                    <div
                        class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">${ title }</a>
                        </h3>
                        <p class="ml-4">${ price }</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Salmon</p>
                </div>
                <div class="flex items-end justify-between flex-1 text-sm">
                    <p class="text-gray-500">Qty ${ quantity }</p>

                    <div class="flex">
                        <button data-remove-cart="${ id }" type="button"
                            class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                    </div>
                </div>
            </div>
        </li>
    `;

}

function updateCartUi() {
    let cartsArray = JSON.parse(localStorage.getItem('cartsArray') || '[]');
    console.log(cartsArray)
    carts.innerHTML = ""
    if (Array.isArray(cartsArray) && cartsArray.length > 0) {
        const totalPrice = cartsArray.reduce((accumulator, currentValue) => currentValue.price + accumulator, 0)

        document.querySelector('[data-total-price]').textContent = totalPrice
        let html = ""
        cartsArray.forEach(({id, img, title, price}) => {
            html += createTemplate(id, img, title, price)
        })
        carts.innerHTML = html
    }
}



function updateProductsUi() {
    const cartsArray = JSON.parse(localStorage.getItem('cartsArray') || '[]');
    console.log(cartsArray)
    if (Array.isArray(cartsArray) && cartsArray.length > 0) {
        cartsArray.forEach(({id}) => {
            const el = document.querySelector(`[data-remove-from-cart][data-id="${id}"]`)
            el.classList.toggle('hidden')
            el.previousElementSibling.classList.toggle("hidden");
        })

    }
    
}
updateProductsUi()

cartBtn.addEventListener("click", () => {
    updateCartUi()
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
