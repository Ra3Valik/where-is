<?php

use Carbon_Fields\Field;

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

define( 'HOW_IT_WORKS_FIELDS', [
	Field::make('text', 'how_it_works_title', __( 'Заголовок', THEME_TD ) )
		->set_required(),
	Field::make('textarea', 'how_it_works_subtitle', __( 'Подзаголовок', THEME_TD ) ),
	Field::make('complex', 'how_it_works_steps', __( 'Шаги "Как это работает"', THEME_TD ) )
		->set_required()
		->set_layout('tabbed-horizontal')
		->add_fields([
			Field::make('text', 'title', __( 'Заголовок шага', THEME_TD ) ),
			Field::make('file', 'icon', __( 'SVG иконка', THEME_TD ) )
				->set_type('image')
				->set_value_type('url'),
		]),
] );