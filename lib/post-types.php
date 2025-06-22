<?php

add_action( 'init', function () {
	register_post_type( 'game', [
		'labels' => [
			'name' => __( 'Игры', THEME_TD ),
			'singular_name' => __( 'Игра', THEME_TD ),
			'add_new' => __( 'Добавить игру', THEME_TD ),
			'edit_item' => __( 'Редактировать игру', THEME_TD ),
			'new_item' => __( 'Новая игра', THEME_TD ),
			'view_item' => __( 'Посмотреть игру', THEME_TD ),
			'search_items' => __( 'Поиск игр', THEME_TD ),
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-games',
		'supports' => ['title'],
		'has_archive' => true,
		'rewrite' => ['slug' => 'games'],
	] );
} );
