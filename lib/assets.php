<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( THEME_TD . '-style', get_template_directory_uri() . '/dist/style.css', [], null );
	wp_enqueue_script( THEME_TD . '-main', get_template_directory_uri() . '/dist/main.js', [], null, true );
} );

add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( THEME_TD . '-admin-style', get_template_directory_uri() . '/dist/adminStyle.css', [], null );
	wp_enqueue_script( THEME_TD . '-admin', get_template_directory_uri() . '/dist/admin.js', [], null, true );
} );

/**
 * Enqueue the branding styles.
 *
 * @return void
 */
function enqueue_branding_styles()
{
	wp_enqueue_style( THEME_TD . '-branding', get_template_directory_uri() . '/dist/branding.css', [], null );
}

add_action( 'admin_enqueue_scripts', 'enqueue_branding_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_branding_styles_frontend' );
add_action( 'login_head', 'enqueue_branding_styles' );

/**
 * Prepare the branding styles to be enqueued.
 *
 * @return void
 */
function enqueue_branding_styles_frontend()
{
	if ( is_user_logged_in() ) {
		enqueue_branding_styles();
	}
}
