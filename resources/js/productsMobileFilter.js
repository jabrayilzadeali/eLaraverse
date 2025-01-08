const mobileFilterMenu = document.querySelector("[data-mobile-filter-menu]")
const mobileFilterOpen = document.querySelector("[data-mobile-filter-open]")
const mobileFilterClose = document.querySelector("[data-mobile-filter-close]")

mobileFilterOpen?.addEventListener('click', () => {
    mobileFilterMenu.classList.remove('hidden')
})

mobileFilterClose?.addEventListener('click', () => {
    mobileFilterMenu.classList.add('hidden')
})

