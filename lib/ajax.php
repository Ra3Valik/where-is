<?php

/**
 * Register tg users
 */
add_action( 'wp_ajax_nopriv_register_telegram_user', 'handle_telegram_registration' );
add_action( 'wp_ajax_register_telegram_user', 'handle_telegram_registration' );
function handle_telegram_registration()
{
	$tg_id = sanitize_text_field( $_POST['tg_id'] );
	$username = sanitize_text_field( $_POST['username'] );
	$first_name = sanitize_text_field( $_POST['first_name'] );

	if ( empty( $tg_id ) ) {
		wp_send_json_error( ['message' => __( 'Telegram ID обязателен', THEME_TD )] );
	}

	$user_query = get_users( [
		'meta_key' => 'tg_id',
		'meta_value' => $tg_id,
		'number' => 1,
		'count_total' => false,
	] );

	if ( !empty( $user_query ) ) {
		wp_send_json_success( ['message' => __( 'Пользователь уже зарегистрирован', THEME_TD )] );
	}

	$login = 'tg_' . $tg_id;
	$random_password = wp_generate_password( 12, false );
	$user_id = wp_create_user( $login, $random_password );

	if ( is_wp_error( $user_id ) ) {
		wp_send_json_error( ['message' => __( 'Ошибка регистрации', THEME_TD )] );
	}

	update_user_meta( $user_id, 'tg_id', $tg_id );
	update_user_meta( $user_id, 'tg_username', $username );
	update_user_meta( $user_id, 'tg_first_name', $first_name );

	wp_send_json_success( ['message' => __( 'Регистрация прошла успешно', THEME_TD )] );
}

/**
 * Send message to all users of game
 */
add_action( 'wp_ajax_send_message_to_game_users', function () {
	if ( !current_user_can( 'edit_posts' ) ) {
		wp_send_json_error( ['message' => 'Недостаточно прав'] );
	}

	$game_id = intval( $_POST['game_id'] );
	$message = sanitize_text_field( $_POST['message'] );

	if ( !$game_id || !$message ) {
		wp_send_json_error( ['message' => 'Данные неполные'] );
	}

	$user_ids = carbon_get_post_meta( $game_id, 'assoc_users' );

	if ( empty( $user_ids ) ) {
		wp_send_json_error( ['message' => 'Нет участников'] );
	}

	$count = 0;
	foreach ( $user_ids as $uid ) {
		$tg_id = get_user_meta( $uid, 'tg_id', true );
		if ( $tg_id && send_telegram_message( $tg_id, $message ) ) {
			$count++;
		}
	}

	wp_send_json_success( ['message' => "Сообщение отправлено {$count} участникам"] );
} );

/**
 * Handle button on game edit screen
 */
add_action( 'admin_footer', function () {
	$screen = get_current_screen();
	if ( $screen->post_type !== 'game' ) return;
	?>
    <script>
        jQuery(document).ready(function ($) {
            $('#send-to-game-users').on('click', function (e) {
                e.preventDefault();
                const message = $('textarea[name="crb_message_to_all"]').val();
                const game_id = $(this).data('game-id');

                if (!message || !game_id) return alert('Введите сообщение!');

                $.post(ajaxurl, {
                    action: 'send_message_to_game_users',
                    game_id: game_id,
                    message: message
                }, function (res) {
                    alert(res.data.message);
                });
            });
        });
    </script>
	<?php
} );


/**
 * Add Testimonial form
 */
add_action( 'wp_ajax_submit_testimonial_ajax', 'handle_testimonial_ajax' );
add_action( 'wp_ajax_nopriv_submit_testimonial_ajax', 'handle_testimonial_ajax' );

function handle_testimonial_ajax()
{
	if (
		!isset( $_POST['testimonial_nonce'] ) ||
		!wp_verify_nonce( $_POST['testimonial_nonce'], 'submit_testimonial' ) ||
		!empty( $_POST['testimonial_email'] )
	) {
		wp_send_json_error( ['message' => 'Ошибка безопасности.'] );
	}

	$name = sanitize_text_field( $_POST['testimonial_name'] );
	$text = sanitize_textarea_field( $_POST['testimonial_text'] );
	if ( !$name || !$text ) {
		wp_send_json_error( ['message' => 'Имя и отзыв обязательны.'] );
	}

	$post_id = wp_insert_post( [
		'post_type' => 'testimonial',
		'post_title' => $name,
		'post_content' => $text,
		'post_status' => 'pending',
	] );

	if ( is_wp_error( $post_id ) ) {
		wp_send_json_error( ['message' => 'Ошибка при создании отзыва.'] );
	}

	if ( !empty( $_FILES['testimonial_avatar']['name'] ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';

		$attachment_id = media_handle_upload( 'testimonial_avatar', $post_id );

		if ( is_wp_error( $attachment_id ) ) {
			wp_send_json_error( ['message' => 'Ошибка загрузки файла: ' . $attachment_id->get_error_message()] );
		}

		$image_url = wp_get_attachment_url( $attachment_id );
		carbon_set_post_meta( $post_id, 'avatar', esc_url( $image_url ) );
	}

	wp_send_json_success( ['message' => __( 'Спасибо! Ваш отзыв отправлен.', THEME_TD )] );
}

