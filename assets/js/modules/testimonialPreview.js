export function initTestimonialForm() {
    const form = document.querySelector('#testimonialForm');
    if (!form) return;

    const nameInput = document.querySelector('#testimonialName');
    const textInput = document.querySelector('#testimonialText');
    const avatarInput = document.querySelector('#testimonialAvatar');

    const previewName = document.querySelector('#previewName');
    const previewText = document.querySelector('#previewText');
    const previewAvatar = document.querySelector('#previewAvatar img');

    const submitButton = form.querySelector('button[type="submit"]');
    const successBlock = document.querySelector('.form-success');

    // === Превью ===
    if (nameInput && previewName) {
        nameInput.addEventListener('input', () => {
            previewName.textContent = nameInput.value.trim() || 'Имя пользователя';
        });
    }

    if (textInput && previewText) {
        textInput.addEventListener('input', () => {
            const text = textInput.value.trim();
            previewText.textContent = text ? `"${text}"` : 'Здесь будет ваш отзыв...';
        });
    }

    if (avatarInput && previewAvatar) {
        avatarInput.addEventListener('change', () => {
            const file = avatarInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previewAvatar.src = reader.result;
                };
                reader.readAsDataURL(file);
            } else {
                previewAvatar.src = avatarInput.dataset.placeholder || '';
            }
        });
    }

    // === AJAX-отправка ===
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Блокируем кнопку
        submitButton.disabled = true;
        submitButton.classList.add('is-loading');
        const originalText = submitButton.textContent;
        submitButton.textContent = 'Отправка...';

        // Создаём данные
        const formData = new FormData(form);

        try {
            const response = await fetch(themeData.ajax_url, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const result = await response.json();

            if (result.success) {
                form.reset();
                // Обновим предпросмотр
                if (previewName) previewName.textContent = 'Имя пользователя';
                if (previewText) previewText.textContent = 'Здесь будет ваш отзыв...';
                if (previewAvatar) previewAvatar.src = avatarInput?.dataset.placeholder || '';

                console.log(successBlock);
                if (successBlock) {
                    successBlock.classList.add('visible');
                    setTimeout(() => {
                        successBlock.classList.remove('visible');
                    }, 10000); // 10 сек
                }
            } else {
                alert(result.data?.message || 'Ошибка при отправке');
            }
        } catch (err) {
            alert('Ошибка: ' + err.message);
        } finally {
            submitButton.disabled = false;
            submitButton.classList.remove('is-loading');
            submitButton.textContent = originalText;
        }
    });
}
