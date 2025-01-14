export function updateCartUi(cartContainer = document.querySelector("[data-carts]")) {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    console.log('cartContainer: ', cartContainer)
    cartContainer.innerHTML = "";
    if (Array.isArray(cartsArray) && cartsArray.length > 0) {
        const totalPrice = calculateTotalPrice()
        // document.querySelectorAll("[data-total-price]").textContent = totalPrice;
        const totalPriceElements = document.querySelectorAll('[data-total-price]')
        totalPriceElements.forEach(totalPriceElement => totalPriceElement.textContent = totalPrice)
        
        let html = "";
        cartsArray.forEach(({ id, img, title, price, quantity }) => {
            html += createTemplate(id, img, title, price, quantity);
        });
        cartContainer.innerHTML = html;
    } else {
        document.querySelectorAll("[data-total-price]").forEach(
            (totalPriceElement) => ( totalPriceElement.textContent = 0 )
        );

        if (document.URL.includes("checkout")) {
            const form = document.querySelector("[data-form-checkout]");
            const notInCart = document.querySelector("[data-not-in-cart-checkout]")
            if (cartsArray.length) {
                form.classList.remove('hidden')
                notInCart.classList.add('hidden')
            } else {
                form.classList.add('hidden')
                notInCart.classList.remove('hidden')
            }
        }
    }
    if (document.URL.includes("checkout")) {
        const userBalance = +document.querySelector('[data-user-balance]').textContent
        const totalPrice = calculateTotalPrice()
        const hasBalance = userBalance >= totalPrice
        const hasNotBalanceEl = document.querySelector("[data-has-not-balance]");
        const hasBalanceEl = document.querySelector("[data-has-balance]");

        if (hasBalance) {
            hasNotBalanceEl.classList.add("hidden");
            hasBalanceEl.classList.remove("hidden");
        } else {
            hasNotBalanceEl.classList.remove("hidden");
            hasBalanceEl.classList.add("hidden");
        }
    }
}

export function updateProductsUi() {
    const cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    if (Array.isArray(cartsArray) && cartsArray.length > 0) {
        cartsArray.forEach(({ id }) => {
            const el = document.querySelector(
                `[data-remove-from-cart][data-id="${id}"]`
            );
            el?.classList.toggle("hidden");
            el?.previousElementSibling.classList.toggle("hidden");
        });
    }
}

export async function sendDataToBackend(params, method, url) {
    try {
        const response = await fetch(url, {
            method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="_token"]')
                    .content,
            },
            body: JSON.stringify(params),
        });
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        return json
    } catch (error) {
        console.error('Error sending Data', error)
    }
}

export function calculateTotalPrice() {
    let cartsArray = JSON.parse(localStorage.getItem("cartsArray") || "[]");
    return cartsArray.reduce(
        (accumulator, currentValue) =>
            currentValue.price * currentValue.quantity + accumulator,
        0
    );
}

export function createTemplate(id, img, title, price, quantity = 1) {
    const svg =
        quantity > 1
            ? `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 13H5v-2h14z" /></svg>`
            : `<svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z"/></svg>`;

    return `
        <li data-cart-id="${id}" class="flex py-6">
            <div
                class="overflow-hidden border border-gray-200 dark:border-gray-800 rounded-md size-24 shrink-0">
                <img src="storage/${img}"
                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                    class="object-cover size-full">
            </div>

            <div class="flex flex-col flex-1 ml-4">
                <div>
                    <div
                        class="flex justify-between text-base font-medium text-gray-900 dark:text-gray-100">
                        <h3>
                            <a href="#">${title}</a>
                        </h3>
                        <p class="ml-4">${price}</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Salmon</p>
                </div>
                <div class="flex items-end justify-between flex-1 text-sm">
                    <div class="flex text-dark gap-5">
                        <div data-decrease-quantity="${id}" class="text-black dark:text-gray-300">
                            ${svg}
                        </div>
                        <p class="text-gray-500 dark:text-gray-300">Qty ${quantity}</p>
                        <div data-increase-quantity="${id}" class="text-black dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"/></svg>
                        </div>
                    </div>

                    <div class="flex">
                        <button data-remove-cart="${id}" type="button"
                            class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Remove</button>
                    </div>
                </div>
            </div>
        </li>
    `;
}