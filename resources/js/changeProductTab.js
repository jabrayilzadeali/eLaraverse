const newItems = document.querySelector('[data-new-items]')
const discountedItems = document.querySelector('[data-discounted-items]')
const mostWatchedItems = document.querySelector('[data-most-watched-items]')

function activeTab(active) {
    newItems.classList = active === 'newItems' ? tabActiveClasses : tabNotActiveClasses
    discountedItems.classList = active === 'discountedItems' ? tabActiveClasses : tabNotActiveClasses
    mostWatchedItems.classList = active === 'mostWatchedItems' ? tabActiveClasses : tabNotActiveClasses
}

const tabActiveClasses = "p-3 font-bold text-gray-200 bg-gray-800 rounded-md"
const tabNotActiveClasses = "p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"

newItems?.addEventListener('click', () => {
    activeTab('newItems')
})

discountedItems?.addEventListener('click', () => {
    activeTab('discountedItems')
})

mostWatchedItems?.addEventListener('click', () => {
    activeTab('mostWatchedItems')
})

