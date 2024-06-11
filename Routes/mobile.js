const ICON_NAV = document.getElementById('icon-nav')
const NAV_MENU = document.getElementById('nav') 
ICON_NAV.addEventListener('click',e => {
    NAV_MENU.classList.toggle('active')
})