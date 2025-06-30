import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

export default class PartnersSlider {
    constructor() {
        this.sliderEl = document.querySelector('.js-partners-slider');
        if (!this.sliderEl) return;

        this.initSlider();
    }

    initSlider() {
        const scrollbarEl = this.sliderEl.querySelector('.swiper-scrollbar');
        if (!scrollbarEl) {
            console.error('Scrollbar element not found');
            return;
        }
        new Swiper(this.sliderEl, {
            slidesPerView: 'auto',
            spaceBetween: 32,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                768: { slidesPerView: 4 },
                1024: { slidesPerView: 5 }
            }
        });
    }
}
