<?php

// Disable gutenberg editor
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Theme dependencies
 *
 * @return void
 */
function load_theme_dependencies()
{
	add_theme_support( 'title-tag' );        	# Add <title> tag for each page
	require_once( 'config/constants.php' );         	# Theme constants
	require_once( 'lib/assets.php' );         			# Theme styles and scripts
}

add_action( 'after_setup_theme', 'load_theme_dependencies' );