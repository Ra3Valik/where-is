<?php

add_action( 'rest_api_init', function () {
	register_rest_route( 'telegram-auth/v1', '/callback', [
		'methods' => 'GET',
		'callback' => 'handle_telegram_auth_callback',
		'permission_callback' => '__return_true',
	] );
} );

function handle_telegram_auth_callback( $request )
{
	$params = $request->get_query_params();

	if ( !telegram_auth_is_valid( $params ) ) {
		wp_die( __( 'Ошибка авторизации Telegram. Попробуйте снова.', THEME_TD ) );
	}

	$tg_id = intval( $params['id'] );
	$tg_username = sanitize_user( $params['username'] ?? '' );
	$first_name = sanitize_text_field( $params['first_name'] ?? '' );

	// Ищем по Telegram ID
	$user = get_user_by( 'login', 'tg_' . $tg_id );
	error_log( print_r( $user, true ) );

	if ( empty( $user ) ) {
		// Создаём нового пользователя
		$username = 'tg_' . $tg_id;
		$password = wp_generate_password();

		$user_id = wp_insert_user( [
			'user_login' => $username,
			'user_pass' => $password,
			'display_name' => $first_name ?: $username,
			'show_admin_bar_front' => false,
		] );

		if ( is_wp_error( $user_id ) ) {
			wp_die( __( 'Ошибка при создании пользователя. Попробуйте позже.', THEME_TD ) );
		}


		carbon_set_user_meta( $user_id, 'tg_id', $tg_id );
		carbon_set_user_meta( $user_id, 'tg_username', $tg_username );
		carbon_set_user_meta( $user_id, 'tg_first_name', $first_name );

		$user = get_user_by( 'id', $user_id );
	}

	// Авторизация
	wp_set_current_user( $user->ID );
	wp_set_auth_cookie( $user->ID );

	// Перенаправление на главную
	wp_redirect( home_url() );
	exit;
}
