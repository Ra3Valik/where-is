<?php

use Carbon_Fields\Field;

const GLOBAL_SECTIONS_URL = '/wp-admin/admin.php?page=crb_carbon_fields_container_cdf36559.php';
const FIELDS_IN_GLOBAL_OPTIONS_HTML = '<div style="padding: 10px 15px; background: #fef9e7; border-left: 4px solid #f1c40f; font-size: 14px;">
	<strong>ℹ️ Обратите внимание:</strong> эта секция подключается глобально. Все настройки берутся из <a href="' . GLOBAL_SECTIONS_URL . '" target="_blank"><strong>Глобальных секций</strong></a>, а не из полей страницы.
</div>';

define( 'HERO_SECTIONS_TITLE', __( 'Главная', THEME_TD ) );
define( 'HERO_SECTIONS_FIELDS', [
	Field::make( 'image', 'hero_background_image', __( 'Фоновое изображение', THEME_TD ) )
		->set_value_type( 'url' )
		->set_required(),

	Field::make( 'text', 'hero_title', __( 'Заголовок', THEME_TD ) )
		->set_required(),

	Field::make( 'textarea', 'hero_desc', __( 'Описание', THEME_TD ) ),

	Field::make( 'checkbox', 'hero_btn_enabled', __( 'Кнопка?', THEME_TD ) ),

	Field::make( 'text', 'hero_cta_btn_text', __( 'Текст кнопки', THEME_TD ) )
		->set_required()
		->set_conditional_logic( [
			[
				'field' => 'hero_btn_enabled',
				'operator' => '==',
				'value' => true,
			]
		] ),

	Field::make( 'text', 'hero_cta_btn_link', __( 'Ссылка', THEME_TD ) )
		->set_required()
		->set_conditional_logic( [
			[
				'field' => 'hero_btn_enabled',
				'operator' => '==',
				'value' => true,
			]
		] ),

	Field::make( 'checkbox', 'hero_cta_btn_new_tab', __( 'Открыть в новой вкладке?', THEME_TD ) )
		->set_conditional_logic( [
			[
				'field' => 'hero_btn_enabled',
				'operator' => '==',
				'value' => true,
			]
		] ),
] );

define( 'HOW_IT_WORKS_TITLE', __( 'Как это работает', THEME_TD ) );
define( 'HOW_IT_WORKS_FIELDS', [
	Field::make( 'text', 'how_it_works_title', __( 'Заголовок', THEME_TD ) )
		->set_required(),

	Field::make( 'textarea', 'how_it_works_subtitle', __( 'Подзаголовок', THEME_TD ) ),

	Field::make( 'complex', 'how_it_works_steps', __( 'Шаги "Как это работает"', THEME_TD ) )
		->set_required()
		->set_layout( 'tabbed-horizontal' )
		->add_fields( [
			Field::make( 'text', 'title', __( 'Заголовок шага', THEME_TD ) ),

			Field::make( 'file', 'icon', __( 'SVG иконка', THEME_TD ) )
				->set_type( 'image' )
				->set_value_type( 'url' ),
		] ),
] );

define( 'TELEGRAM_REGISTER_SECTIONS_TITLE', __( 'Присоединяйтесь в ТГ', THEME_TD ) );
define( 'TELEGRAM_REGISTER_SECTIONS_FIELDS', [
	Field::make( 'text', 'section_tg_register_title', __( 'Заголовок', THEME_TD ) )
		->set_default_value( __( 'Готов к следующей игре?', THEME_TD ) )
		->set_help_text( __( 'Отображается вверху секции независимо от состояния пользователя', THEME_TD ) ),

	// 🔷 Тексты под заголовком в зависимости от статуса пользователя
	Field::make( 'text', 'section_tg_register_text_guest', __( 'Текст для незарегистрированных', THEME_TD ) )
		->set_default_value( __( 'Присоединяйся через Telegram — это просто и быстро.', THEME_TD ) )
		->set_help_text( __( 'Показывается, если пользователь не авторизован через Telegram', THEME_TD ) ),

	Field::make( 'text', 'section_tg_register_text_logged_in', __( 'Текст для зарегистрированных', THEME_TD ) )
		->set_default_value( __( 'Следующая игра уже скоро. Успей зарегистрироваться!', THEME_TD ) )
		->set_help_text( __( 'Показывается, если есть запланированная игра, и пользователь авторизован', THEME_TD ) ),

	Field::make( 'text', 'section_tg_register_text_no_game', __( 'Текст если игр нет', THEME_TD ) )
		->set_default_value( __( 'Пока нет запланированных игр. Подпишись в Telegram, чтобы не пропустить!', THEME_TD ) )
		->set_help_text( __( 'Показывается, если нет ближайших запланированных игр', THEME_TD ) ),

	// 🔷 Тексты кнопок в зависимости от статуса
	Field::make( 'text', 'section_tg_register_btn_guest', __( 'Кнопка для незарегистрированных', THEME_TD ) )
		->set_default_value( __( '🚀 Зарегистрироваться в Telegram', THEME_TD ) )
		->set_help_text( __( 'Кнопка ведёт в Telegram-бота, если пользователь не авторизован', THEME_TD ) ),

	Field::make( 'text', 'section_tg_register_btn_join', __( 'Кнопка "Записаться на игру"', THEME_TD ) )
		->set_default_value( __( '✅ Записаться на игру', THEME_TD ) )
		->set_help_text( __( 'Кнопка отправляет форму участия, если пользователь авторизован и игра запланирована', THEME_TD ) ),

	Field::make( 'text', 'section_tg_register_btn_joined', __( 'Кнопка "Уже участвует"', THEME_TD ) )
		->set_default_value( __( '🎉 Вы уже записаны', THEME_TD ) )
		->set_help_text( __( 'Показывается, если пользователь уже записан в текущую игру', THEME_TD ) ),

	Field::make( 'text', 'section_tg_register_btn_notify', __( 'Кнопка "Подписаться на уведомления"', THEME_TD ) )
		->set_default_value( __( '🔔 Подписаться на уведомления', THEME_TD ) )
		->set_help_text( __( 'Отображается, если игр нет, но пользователь авторизован', THEME_TD ) ),
] );

define( 'ACTIVE_GAME_SECTION_TITLE', __( 'Активная игра', THEME_TD ) );
define( 'ACTIVE_GAME_SECTION_FIELDS', [
	Field::make( 'text', 'active_game_title', __( 'Заголовок блока', THEME_TD ) )
		->set_default_value( '⌛ Активная игра' )
		->set_help_text( __( 'Заголовок блока', THEME_TD ) ),

	Field::make( 'text', 'active_game_preview_icon', __( 'Иконка в превью', THEME_TD ) )
		->set_default_value( '📷' )
		->set_help_text( __( 'Эмодзи или символ', THEME_TD ) ),

	Field::make( 'textarea', 'active_game_preview_text', __( 'Текст превью', THEME_TD ) )
		->set_default_value( "Фото-задание будет\nв Telegram" )
		->set_rows( 2 )
		->set_help_text( __( 'Текст рядом с иконкой превью', THEME_TD ) ),

	Field::make( 'text', 'active_game_button_text', __( 'Текст кнопки участия', THEME_TD ) )
		->set_default_value( 'Принять участие' ),

	Field::make( 'text', 'active_game_no_game_title', __( 'Заголовок при отсутствии игры', THEME_TD ) )
		->set_default_value( 'Игры пока нет' ),

	Field::make( 'textarea', 'active_game_no_game_subtitle', __( 'Подзаголовок при отсутствии игры', THEME_TD ) )
		->set_default_value( "Мы готовим новое задание.\nСледите за обновлениями в Telegram." )
		->set_rows( 2 ),

	Field::make( 'text', 'active_game_archive_link_text', __( 'Текст ссылки на архив', THEME_TD ) )
		->set_default_value( '📂 Архив завершённых игр' ),

	Field::make( 'text', 'active_game_archive_link_url', __( 'URL ссылки на архив', THEME_TD ) )
		->set_default_value( '/games' ),
] );


define( 'FAQ_SECTION_TITLE', __( 'Вопрос - ответ', THEME_TD ) );
define( 'FAQ_SECTION_FIELDS', [
	Field::make( 'complex', 'faq_global_list', __( 'Вопросы и ответы (FAQ)', THEME_TD ) )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( [
			Field::make( 'text', 'question', __( 'Вопрос', THEME_TD ) ),
			Field::make( 'rich_text', 'answer', __( 'Ответ', THEME_TD ) ),
		] )
] );