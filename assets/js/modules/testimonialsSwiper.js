import Swiper from 'swiper/bundle';

export default class TestimonialsSwiper {
    constructor() {
        this.el = document.querySelector('.testimonials-swiper');
        if (!this.el) return;

        this.init();
    }

    init() {
        const paginationEl = this.el.querySelector('.swiper-pagination');
        const prevEl = this.el.querySelector('.swiper-button-prev');
        const nextEl = this.el.querySelector('.swiper-button-next');

        if (!paginationEl || !prevEl || !nextEl) {
            console.error('Navigation elements not found');
            return;
        }

        new Swiper(this.el, {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: this.el.querySelector('.swiper-pagination'),
                clickable: true
            },
            navigation: {
                nextEl: this.el.querySelector('.swiper-button-next'),
                prevEl: this.el.querySelector('.swiper-button-prev')
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1168: { slidesPerView: 3 }
            }
        });
    }
}
