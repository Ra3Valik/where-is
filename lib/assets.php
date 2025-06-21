<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( THEME_TD . '-style', get_template_directory_uri() . '/dist/style.css', [], null );
	wp_enqueue_script( THEME_TD . '-main', get_template_directory_uri() . '/dist/main.js', [], null, true );
} );

add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( THEME_TD . '-admin-style', get_template_directory_uri() . '/dist/adminStyle.css', [], null );
	wp_enqueue_script( THEME_TD . '-admin', get_template_directory_uri() . '/dist/admin.js', [], null, true );
} );
