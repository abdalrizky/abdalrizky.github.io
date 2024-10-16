
const hamburger = document.getElementById('hamburger-btn')
const darkModeToggle = document.getElementById('dark-mode-button')
const darkModeToggleMobile = document.getElementById('dark-mode-button-mobile')
const navMobileMenu = document.getElementById('navbar-mobile')
const darkModeTitle = document.getElementById('toggle-dark-mode-label')
const darkModeTitleMobile = document.getElementById('toggle-dark-mode-label-mobile')
const navMenuPromo = document.getElementById('nav-menu-promo')
const navMenuPromoMobile = document.getElementById('nav-menu-promo-mobile')
const toggleDarkModeIcon = document.getElementById('toggle-dark-mode-icon')
const toggleDarkModeIconMobile = document.getElementById('toggle-dark-mode-icon-mobile')

let darkModeState = false

hamburger.addEventListener('click', () => {
    navMobileMenu.classList.toggle('open')
})

darkModeToggle.addEventListener('click', () => {
    const body = document.querySelector('body')
    body.classList.toggle('dark-mode')

    darkModeState = !darkModeState
    
    if (darkModeState) {
        toggleDarkModeIcon.setAttribute("src", "img/ic_sun.svg")
    } else {
        toggleDarkModeIcon.setAttribute("src", "img/ic_moon.svg")
    }
    
})

darkModeToggleMobile.addEventListener('click', () => {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');

    darkModeState = !darkModeState
    
    if (darkModeState) {
        toggleDarkModeIconMobile.setAttribute("src", "img/ic_sun.svg")
        darkModeTitleMobile.innerHTML = "Mode Terang"
    } else {
        toggleDarkModeIconMobile.setAttribute("src", "img/ic_moon.svg")
        darkModeTitleMobile.innerHTML = "Mode Gelap"
    }
})

navMenuPromo.addEventListener('click', () => {
    alert('Menu promo belum tersedia.')
})

navMenuPromoMobile.addEventListener('click', () => {
    alert('Menu promo belum tersedia.')
})