export function initGameTimer() {
    const section = document.querySelector('.active-game-section__content');
    if (!section) return;

    const countdownEl = section.querySelector('.timer-countdown');
    const labelEl = section.querySelector('.timer-label');

    const startTime = new Date(section.dataset.start.replace(/-/g, '/')).getTime();
    const duration = parseInt(section.dataset.duration || 60) * 60 * 1000;
    const endTime = startTime + duration;

    function updateTimer() {
        const now = new Date().getTime();

        if (now < startTime) {
            const remaining = startTime - now;
            labelEl.textContent = 'До начала:';
            countdownEl.textContent = formatTime(remaining);
        } else if (now < endTime) {
            const remaining = endTime - now;
            labelEl.textContent = 'До конца:';
            countdownEl.textContent = formatTime(remaining);
        } else {
            labelEl.textContent = '';
            countdownEl.textContent = '⏳ Игра завершена';
            clearInterval(timerInterval);
        }
    }

    function formatTime(ms) {
        const totalSeconds = Math.floor(ms / 1000);
        const hours = Math.floor(totalSeconds / 3600);
        const minutes = Math.floor((totalSeconds % 3600) / 60);
        const seconds = totalSeconds % 60;
        return [hours, minutes, seconds].map(unit => String(unit).padStart(2, '0')).join(':');
    }

    updateTimer();
    const timerInterval = setInterval(updateTimer, 1000);
}
