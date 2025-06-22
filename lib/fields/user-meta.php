<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function () {
	Container::make( 'user_meta', 'Telegram Инфо' )
		->add_fields( [
			Field::make( 'text', 'tg_id', __( 'Telegram ID', THEME_TD ) ),

			Field::make( 'text', 'tg_username', __( 'Telegram username', THEME_TD ) ),

			Field::make( 'text', 'tg_first_name', __( 'Имя пользователя', THEME_TD ) ),

			Field::make( 'checkbox', 'is_admin_player', __( 'Может быть модератором игры?', THEME_TD ) )
				->set_option_value( '1' )
				->set_default_value( false )
				->set_help_text( __( 'Установите, если пользователь может модерировать игры', THEME_TD ) ),

			Field::make( 'set', 'games_won', __( 'Игры, в которых побеждал', THEME_TD ) )
				->set_classes( ['hidden'] )
		] );
} );
