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

function send_telegram_message( $chat_id, $text )
{
	$token = carbon_get_theme_option( 'tg_bot_token' );
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