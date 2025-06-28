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
				<a href="' . esc_url( $user_url ) . '" class="btn btn-outline btn-mobile btn-cabinet">' . __( 'Кабинет', THEME_TD ) . '</a>
				<a href="' . esc_url( wp_logout_url( home_url() ) ) . '" class="btn btn-secondary btn-mobile">' . __( 'Выход', THEME_TD ) . '</a>
			</li>';
		} else {
			$items .= '<li class="menu-cta menu-cta-logged-out">
				<a href="' . TELEGRAM_REGISTER_URL . '" class="btn btn-accent btn-mobile tg-auth-btn">' . __( 'Вход через Telegram', THEME_TD ) . '</a>
			</li>';
		}
	}
	return $items;
}


add_action('admin_menu', 'add_pending_badge_to_testimonials');

function add_pending_badge_to_testimonials() {
	global $menu;

	$count = wp_count_posts('testimonial')->pending ?? 0;
	if ( ! $count ) return;

	foreach ($menu as $index => $item) {
		if (strpos($item[2], 'edit.php?post_type=testimonial') !== false) {
			$menu[$index][0] .= sprintf(
				' <span class="awaiting-mod">%d</span>',
				$count
			);
			break;
		}
	}
}


