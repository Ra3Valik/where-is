<?php


/**
 * Display the markup of an SVG file directly in the HTML markup without using an img tag.
 *
 * @param string $svg_path_or_url The URL or the absolute path of an SVG file.
 * @return void
 */
function svg_inline( $svg_path_or_url )
{
	echo get_svg_inline( $svg_path_or_url );
}

/**
 * Get the markup of an SVG file.
 *
 * @param string $svg_path_or_url The URL or the absolute path of an SVG file.
 * @return string
 */
function get_svg_inline( $svg_path_or_url )
{
	$path = convert_url_to_path( $svg_path_or_url );
	$svg = file_get_contents( $path );

	return $svg;
}

/**
 * Convert a website URL to an absolute path.
 *
 * @param string $url The absolute path of the file.
 * @return string
 */
function convert_url_to_path( $url )
{
	if ( stripos( $url, '://' ) !== false ) {
		$path = str_replace( trailingslashit( get_bloginfo( 'url' ) ), ABSPATH, $url );
		return $path;
	}

	return $url;
}

/**
 * Send message via telegram
 *
 * @param $chat_id
 * @param $text
 * @return bool
 */
function send_telegram_message( $chat_id, $text )
{
	$token = TELEGRAM_BOT_TOKEN;
	if ( !$token || !$chat_id || !$text ) return false;

	$url = "https://api.telegram.org/bot{$token}/sendMessage";
	$response = wp_remote_post( $url, [
		'body' => [
			'chat_id' => $chat_id,
			'text' => $text,
			'parse_mode' => 'HTML',
		]
	] );

	return !is_wp_error( $response );
}


/**
 * Check telegram hash for true users
 *
 * @param $data
 * @return bool
 */
function telegram_auth_is_valid( $data )
{
	if ( !isset( $data['hash'] ) ) return false;

	$check_hash = $data['hash'];
	unset( $data['hash'] );

	$token = TELEGRAM_BOT_TOKEN;
	$secret_key = hash( 'sha256', $token, true );

	ksort( $data );
	$data_check_string = '';
	foreach ( $data as $key => $value ) {
		$data_check_string .= $key . '=' . $value . "\n";
	}
	$data_check_string = rtrim( $data_check_string );

	$hash = hash_hmac( 'sha256', $data_check_string, $secret_key );

	return hash_equals( $hash, $check_hash );
}

/**
 * Apply conditional logic to fields array.
 *
 * @param array $fields
 * @param string $field_id
 * @param mixed $value
 *
 * @return array
 */
function apply_conditional_logic_to_fields( array $fields, string $field_id, $value ) : array
{
	$cloned_fields = [];

	foreach ( $fields as $field ) {
		$cloned_field = clone $field; // IMPORTANT! Clone, because another way broke fields
		$cloned_field->set_conditional_logic( [
			[
				'field' => $field_id,
				'operator' => '==',
				'value' => $value,
			]
		] );
		$cloned_fields[] = $cloned_field;
	}

	return $cloned_fields;
}

use Carbon_Fields\Field;

/**
 * Generates a conditional section that allows switching between global and local settings.
 *
 * @param string $section_key          Unique key for the section (e.g. 'faq', 'how_it_works').
 * @param array $fields                The actual local fields to show if global is disabled.
 * @param string $toggle_label         Optional label for the toggle checkbox.
 *
 * @return array                       Array of Carbon Fields for the section.
 */
function make_section_with_toggle(
	string $section_key,
	array  $fields,
	string $toggle_label = ''
) : array
{
	$checkbox_field_name = "use_{$section_key}_global_settings";
	$html_field_name = "{$section_key}_global_info_html";

	if ( empty( $toggle_label ) ) {
		$toggle_label = sprintf( __( 'Использовать настройки из глобальных секций для %s', THEME_TD ), strtoupper( $section_key ) );
	}

	$conditioned_fields = apply_conditional_logic_to_fields( $fields, $checkbox_field_name, false );

	return array_merge( [
		// Toggle: global vs local
		Field::make( 'checkbox', $checkbox_field_name, $toggle_label )
			->set_default_value( true ),

		// Info message if using global
		Field::make( 'html', $html_field_name )
			->set_html( FIELDS_IN_GLOBAL_OPTIONS_HTML )
			->set_conditional_logic( [
				[
					'field' => $checkbox_field_name,
					'operator' => '=',
					'value' => true,
				]
			] ),
	], $conditioned_fields );
}

