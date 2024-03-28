const openMenu = document.getElementById('openMenu');
const closeMenu = document.getElementById('closeMenu');
const menu = document.getElementById('menu');

openMenu.addEventListener('click', () => {
    menu.style.display = 'flex';
    openMenu.style.display = 'none';
})
closeMenu.addEventListener('click', () => {
    menu.removeAttribute('style');
    openMenu.style.display = 'block';
})