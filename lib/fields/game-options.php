<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function () {
	Container::make( 'post_meta', 'Настройки игры' )
		->where( 'post_type', '=', 'game' )
		->add_fields( [
			Field::make( 'image', 'game_photo', __( 'Фото-задание', THEME_TD ) )
				->set_width( 50 )
				->set_required(),

			Field::make( 'date_time', 'game_start', __( 'Начало игры', THEME_TD ) )
				->set_storage_format( 'Y-m-d H:i:s' )
				->set_input_format( 'd.m.Y H:i', 'd.m.Y H:i' )
				->set_width( 50 )
				->set_help_text( __( 'Когда начнётся игра', THEME_TD ) ),

			Field::make( 'text', 'winner_limit', __( 'Количество победителей', THEME_TD ) )
				->set_attribute( 'type', 'number' )
				->set_width( 50 )
				->set_default_value( 1 ),

			Field::make( 'select', 'game_status', __( 'Статус игры', THEME_TD ) )
				->set_width( 50 )
				->set_options( [
					'pending' => __( 'Ожидание', THEME_TD ),
					'active' => __( 'Активна', THEME_TD ),
					'finished' => __( 'Завершена', THEME_TD ),
				] ),

			Field::make( 'association', 'assoc_users', __( 'Участники игры', THEME_TD ) )
				->set_types( [
					[
						'type' => 'user',
						'query_args' => [
							'meta_key' => 'tg_id',
							'meta_compare' => 'EXISTS',
						],
					]
				] ),

			Field::make( 'select', 'game_admin', __( 'Администратор игры', THEME_TD ) )
				->set_options( function () {
					$mods = get_users( [
						'meta_key' => 'is_admin_player',
						'meta_value' => '1',
						'number' => -1,
					] );
					$options = [];
					foreach ( $mods as $user ) {
						$options[$user->ID] = $user->display_name . ' (@' . get_user_meta( $user->ID, 'tg_username', true ) . ')';
					}
					return $options;
				} ),

			Field::make( 'association', 'winners', __( 'Победители', THEME_TD ) )
				->set_classes( ['hidden'] )
				->set_types( [
					[
						'type' => 'user',
						'query_args' => [
							'meta_key' => 'tg_id',
							'meta_compare' => 'EXISTS',
						],
					],
				] ),

			Field::make( 'html', 'winners_list_html', __( 'Победители', THEME_TD ) )
				->set_html( function () {
					$game_id = get_the_ID();
					$winners = carbon_get_post_meta( $game_id, 'winners' ) ?: [];

					if ( empty( $winners ) ) {
						return '<em>'. __( 'Пока нет победителей.', THEME_TD ) . '</em>';
					}

					$out = '<ul>';
					foreach ( $winners as $user_id ) {
						$user = get_userdata( $user_id );
						if ( $user ) {
							$out .= '<li>' . esc_html( $user->display_name ) . ' (@' . esc_html( get_user_meta( $user_id, 'tg_username', true ) ) . ')</li>';
						}
					}
					$out .= '</ul>';
					return $out;
				} ),

			Field::make( 'checkbox', 'game_live', __( 'Игра в эфире?', THEME_TD ) )
				->set_default_value( false )
				->set_option_value( '1' ),

			Field::make( 'textarea', 'message_to_all', __( 'Сообщение всем игрокам', THEME_TD ) ),

			Field::make( 'html', 'send_all_button', '' )
				->set_html( '<button class="button button-primary" id="send-to-all">' . __( 'Отправить сообщение игрокам', THEME_TD ) . '</button>' ),
		] );
} );
