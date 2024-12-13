import './bootstrap';

const mobileMenuToggleBtn = document.querySelector('[data-mobile-menu-toggle-btn]')
const mobileMenuClosed = document.querySelector('[data-mobile-menu-closed-icon]')
const mobileMenuOpen = document.querySelector('[data-mobile-menu-open-icon]')
const mobileMenuLinks = document.querySelector('[data-mobile-menu-links]')
const userOptionBtn = document.querySelector('[data-user-option-btn]')
const userOptionList = document.querySelector('[data-user-option-list]')

console.log(mobileMenuClosed, mobileMenuOpen)

mobileMenuToggleBtn.addEventListener('click', () => {
  mobileMenuOpen.classList.toggle('hidden')
  mobileMenuClosed.classList.toggle('hidden')
  mobileMenuLinks.classList.toggle('hidden')
})

userOptionBtn.addEventListener('click', () => {
  userOptionList.classList.toggle('hidden')
})