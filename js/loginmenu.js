document.addEventListener('DOMContentLoaded', () => {
    let subMenu = document.querySelector('.sub-menu-wrap');
    let userBtn = document.querySelector('#user-btn');

    if (userBtn && subMenu) {
        console.log('Elementos encontrados.');
        userBtn.addEventListener('click', () => {
            console.log('Botón de usuario clickeado.');
            subMenu.classList.toggle('active');
        });
    } else {
        console.log('Elementos no encontrados.');
    }
});

window.onscroll = () => { 
    subMenu.classList.remove('active');
    userBtn.classList.remove('active');
}