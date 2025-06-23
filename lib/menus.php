<?php

register_nav_menus( [
	'main_menu' => esc_html__( 'Главное меню', THEME_TD ),
] );

add_filter( 'wp_nav_menu_items', 'add_cta_buttons_to_menu', 10, 2 );

function add_cta_buttons_to_menu( $items, $args )
{
	if ( $args->theme_location === 'main_menu' ) {
		if ( is_user_logged_in() ) {
			$current_user = wp_get_current_user();
			$user_url = home_url( '/user/' . $current_user->user_nicename );

			$items .= '<li class="menu-cta menu-cta-logged-in">
				<a href="' . esc_url( $user_url ) . '" class="btn btn-outline btn-mobile btn-cabinet">Кабинет</a>
				<a href="' . esc_url( wp_logout_url( home_url() ) ) . '" class="btn btn-secondary btn-mobile">Выход</a>
			</li>';
		} else {
			$items .= '<li class="menu-cta menu-cta-logged-out">
				<a href="https://t.me/' . TELEGRAM_BOT_TOKEN . '" class="btn btn-accent btn-mobile">Вход через Telegram</a>
			</li>';
		}
	}
	return $items;
}

