import {initMobileMenu} from './modules/mobileMenu.js';
import {initTelegramAuth} from './modules/telegramAuth.js';
import {initGameTimer} from './modules/gameTimer.js';
import {initFAQAccordion} from './modules/faqAccordion.js';
import {initTestimonialForm} from './modules/testimonialForm.js';
import ModalManager from './modules/modalManager';
import PartnersSlider from './modules/partnersSlider';
import TestimonialsSwiper from './modules/testimonialsSwiper';

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initTelegramAuth();
    initGameTimer();
    initFAQAccordion();
    initTestimonialForm();
    new ModalManager();
    new PartnersSlider();
    new TestimonialsSwiper();
});
