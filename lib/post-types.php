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

	register_post_type( 'testimonial', [
		'labels' => [
			'name' => __( 'Отзывы', THEME_TD ),
			'singular_name' => __( 'Отзыв', THEME_TD ),
			'add_new' => __( 'Добавить отзыв', THEME_TD ),
			'add_new_item' => __( 'Добавить новый отзыв', THEME_TD ),
			'edit_item' => __( 'Редактировать отзыв', THEME_TD ),
			'new_item' => __( 'Новый отзыв', THEME_TD ),
			'view_item' => __( 'Просмотреть отзыв', THEME_TD ),
			'search_items' => __( 'Найти отзыв', THEME_TD ),
			'not_found' => __( 'Отзывов не найдено', THEME_TD ),
			'not_found_in_trash' => __( 'В корзине отзывов не найдено', THEME_TD ),
			'menu_name' => __( 'Отзывы', THEME_TD ),
		],
		'public' => false,              // 🚫 полностью скрываем публичный доступ
		'publicly_queryable' => false,              // 🚫 нельзя открыть в браузере
		'show_ui' => true,               // ✅ показываем в админке
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-testimonial',
		'supports' => ['title', 'editor'],
		'has_archive' => false,
		'rewrite' => false,              // 🚫 не генерировать URL
		'capability_type' => 'post',
		'show_in_rest' => false,
	] );
} );
