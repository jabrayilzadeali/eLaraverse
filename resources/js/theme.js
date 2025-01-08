const darkModeToggle = document.querySelector('[data-dark-mode-toggle-button]')

darkModeToggle?.addEventListener('click', () => {
    document.querySelector('html').classList.toggle('dark')
    document.querySelector('[data-sun-icon]').classList.toggle('hidden')
    document.querySelector('[data-moon-icon]').classList.toggle('hidden')
})

