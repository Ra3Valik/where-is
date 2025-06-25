<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options()
{
	Container::make( 'theme_options', __( 'Настройки темы', THEME_TD ) )
		->add_tab( __( 'Логотип', THEME_TD ), [
			Field::make( 'image', 'theme_logo', __( 'Логотип сайта', THEME_TD ) )
				->set_value_type( 'url' )
				->set_width( 33 )
				->set_required(),

			Field::make( 'image', 'theme_logo_tablet', __( 'Логотип сайта на планшетах', THEME_TD ) )
				->set_value_type( 'url' )
				->set_width( 33 )
				->set_required(),

			Field::make( 'image', 'theme_icon', __( 'Иконка сайта', THEME_TD ) )
				->set_width( 33 )
				->set_value_type( 'url' )
				->set_required(),
		] )
		->add_tab( __( 'Настройки Telegram', THEME_TD ), [
			Field::make( 'text', 'tg_bot_username', __( 'Тэг Телеграм Бота', THEME_TD ) )
				->set_help_text( __( 'Без "@"', THEME_TD ) )
				->set_required(),

			Field::make( 'text', 'tg_bot_id', __( 'ID Телеграм Бота', THEME_TD ) )
				->set_help_text( __( 'Можно узнать в боте @userinfobot переслав ему любое сообщение вашего бота', THEME_TD ) )
				->set_required(),

			Field::make( 'text', 'tg_bot_token', __( 'Токен Телеграм Бота', THEME_TD ) )
				->set_required(),
		] );
}