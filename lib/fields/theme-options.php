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
				->set_width( 50 )
				->set_required(),

			Field::make( 'image', 'theme_icon', __( 'Иконка сайта', THEME_TD ) )
				->set_width( 50 )
				->set_value_type( 'url' )
				->set_required(),
		] )
		->add_tab( __( 'Настройки Telegram', THEME_TD ), [
			Field::make( 'text', 'tg_bot_token', __( 'Telegram Bot Token', THEME_TD ) )
				->set_required(),
		] );
}