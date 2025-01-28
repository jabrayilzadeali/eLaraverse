import { setUrlParams, setUrlParam, removeParams, deleteUrlParam } from "./helpers";
const sortProductsBtn = document.querySelector("[data-sort-products-btn]");
const sortMenu = document.querySelector("[data-sort-menu]");

sortProductsBtn?.addEventListener('click', () => {
    sortMenu.classList.toggle('hidden')
})

sortMenu?.addEventListener('click', (e) => {
    console.log(e.target)
    // setUrlParams(e.target.dataset.sortBy, e.target.dataset.direction)
    if (typeof e.target.dataset.sortBy === 'undefined') {
        window.location.href = window.location.href.split('?')[0]
        return
    }
    // removeParams('sort', 'page')
    removeParams('sort')
    removeParams('page')
    setUrlParam(`sort[${e.target.dataset.sortBy}]`, e.target.dataset.sortDirection)

})

