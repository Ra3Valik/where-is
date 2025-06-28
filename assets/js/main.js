import { initMobileMenu } from './modules/mobileMenu.js';
import { initTelegramAuth } from './modules/telegramAuth.js';
import { initGameTimer } from './modules/gameTimer.js';

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initTelegramAuth();
    initGameTimer();
});
