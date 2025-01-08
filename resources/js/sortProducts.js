const sortProductsBtn = document.querySelector("[data-sort-products-btn]");
const sortMenu = document.querySelector("[data-sort-menu]");

sortProductsBtn?.addEventListener('click', () => {
    sortMenu.classList.toggle('hidden')
})

