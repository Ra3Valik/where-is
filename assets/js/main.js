document.addEventListener('DOMContentLoaded', function () {

    // Mobile menu
    const burger = document.getElementById('burger');
    const menu = document.querySelector('.main-nav .menu');

    burger.addEventListener('click', function () {
        menu.classList.toggle('active');
    });
});