const darkModeToggle = document.querySelector('[data-dark-mode-toggle-button]')
const html = document.querySelector('html')

const theme = localStorage.getItem('theme')
html.classList = ""
html.classList.add(theme)


// html.classList.toggle('dark')
darkModeToggle?.addEventListener('click', () => {
    html.classList.toggle('dark')
    
    if (theme === 'dark') {
        localStorage.setItem('theme', 'light')
    } else {
        localStorage.setItem('theme', 'dark')
    }
    document.querySelector('[data-sun-icon]').classList.toggle('hidden')
    document.querySelector('[data-moon-icon]').classList.toggle('hidden')
})

