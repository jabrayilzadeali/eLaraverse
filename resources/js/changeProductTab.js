import { setUrlParam, deleteUrlParam, removeParams } from "./helpers"
const newItems = document.querySelector('[data-new-items]')
const discountedItems = document.querySelector('[data-discounted-items]')
const mostWatchedItems = document.querySelector('[data-most-watched-items]')

function activeTab(active) {
    newItems.classList = active === 'newItems' ? tabActiveClasses : tabNotActiveClasses
    discountedItems.classList = active === 'discountedItems' ? tabActiveClasses : tabNotActiveClasses
    // mostWatchedItems.classList = active === 'mostWatchedItems' ? tabActiveClasses : tabNotActiveClasses
}

const tabActiveClasses = "p-3 font-bold text-gray-200 bg-gray-800 rounded-md"
const tabNotActiveClasses = "p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"

const params = new URLSearchParams(window.location.search);
if (params.has("sort[discount]")) {
    console.log('okay sort in it')
    activeTab('discountedItems')
}

newItems?.addEventListener('click', () => {
    removeParams('sort')
    const url = window.location.href.split('?')[0]
    window.location.href = url
    activeTab('newItems')
})

discountedItems?.addEventListener('click', () => {
    setUrlParam('sort[discount]', 'desc')
    console.log("hello World")
    activeTab('discountedItems')
})

mostWatchedItems?.addEventListener('click', () => {
    activeTab('mostWatchedItems')
})

