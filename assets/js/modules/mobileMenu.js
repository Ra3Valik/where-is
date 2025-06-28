export function initMobileMenu() {
    const burger = document.getElementById('burger');
    const menu = document.querySelector('.main-nav .menu');

    if (!burger || !menu) return;

    burger.addEventListener('click', () => {
        menu.classList.toggle('active');
    });
}
