const hamburger = document.getElementById('hamburger-btn');
const darkModeToggle = document.getElementById('dark-mode-button');
const darkModeToggleMobile = document.getElementById('dark-mode-button-mobile');
const navMobileMenu = document.getElementById('navbar-mobile')
const darkModeTitle = document.getElementById('toggle-dark-mode-label');
const navMenuPromo = document.getElementById('nav-menu-promo');

let darkModeState = false;

hamburger.addEventListener('click', () => {
    navMobileMenu.classList.toggle('open')
})

darkModeToggle.addEventListener('click', () => {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');

    darkModeState = !darkModeState
    
    if (darkModeState) {
        darkModeTitle.innerHTML = "Mode Terang"
    } else {
        darkModeTitle.innerHTML = "Mode Gelap"
    }
    
})

darkModeToggleMobile.addEventListener('click', () => {
    const body = document.querySelector('body');
    body.classList.toggle('dark-mode');
})

navMenuPromo.addEventListener('click', () => {
    alert('Menu promo belum tersedia.');
})
