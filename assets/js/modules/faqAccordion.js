export function initFAQAccordion() {
    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            // Закрываем все
            items.forEach(i => {
                i.classList.remove('is-open');
                i.querySelector('.faq-question').classList.remove('open');
            });

            // Открываем, если не был открыт
            if (!isOpen) {
                item.classList.add('is-open');
                question.classList.add('open');
            }
        });
    });
}
