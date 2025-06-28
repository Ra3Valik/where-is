<section class='testimonial-form-section'>
    <div class='testimonial-form-wrapper'>
        <div class='testimonial-form-container'>
            <h2 class='section-title'><?php _e( 'Оставьте отзыв', THEME_TD ); ?></h2>

            <div class="form-success"><?php _e( 'Спасибо! Ваш отзыв отправлен и ожидает проверки.', THEME_TD ); ?></div>

            <form method="post" enctype="multipart/form-data" class="testimonial-form" id="testimonialForm">
                <input type="text" name="testimonial_name" id="testimonialName"
                       placeholder="<?php _e( 'Ваше имя', THEME_TD ); ?>" required>
                <textarea name="testimonial_text" id="testimonialText"
                          placeholder="<?php _e( 'Ваш отзыв', THEME_TD ); ?>" required></textarea>
                <label>
					<?php _e( 'Фото:', THEME_TD ); ?>
                    <input type="file" name="testimonial_avatar" id="testimonialAvatar" accept="image/*"
                           data-placeholder="<?= DEFAULT_USER_PICTURE_URL ?>" required>
                </label>

                <input type='hidden' name='action' value='submit_testimonial_ajax'>

                <input type='text' name='testimonial_email' style='display:none;' autocomplete='off'>

				<?php wp_nonce_field( 'submit_testimonial', 'testimonial_nonce' ); ?>
                <button type="submit"><?php _e( 'Отправить отзыв', THEME_TD ); ?></button>
            </form>
        </div>

        <div class="testimonial-preview-container">
            <div class="testimonial-card preview-card">
                <div class="testimonial-avatar" id="previewAvatar">
                    <img src="<?= DEFAULT_USER_PICTURE_URL ?>" alt="avatar">
                </div>
                <div class="testimonial-name" id="previewName">Имя пользователя</div>
                <p class="testimonial-text" id="previewText">"Здесь будет ваш отзыв..."</p>
            </div>
        </div>
    </div>
</section>
