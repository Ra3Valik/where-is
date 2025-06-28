import {initMobileMenu} from './modules/mobileMenu.js';
import {initTelegramAuth} from './modules/telegramAuth.js';
import {initGameTimer} from './modules/gameTimer.js';
import {initFAQAccordion} from './modules/faqAccordion.js';
import {initTestimonialForm} from './modules/testimonialPreview.js';

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initTelegramAuth();
    initGameTimer();
    initFAQAccordion();
    initTestimonialForm();
});
