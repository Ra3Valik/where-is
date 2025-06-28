<?php

// Disable gutenberg editor
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * Theme dependencies
 *
 * @return void
 */
function load_theme_dependencies()
{
	add_theme_support( 'title-tag' );                        	# Add <title> tag for each page
	require_once( 'vendor/autoload.php' );                   		 	# Autoload dependencies
	require_once( 'config/base-constants.php' );            			# Hardcode constants
	require_once( 'lib/helpers.php' );                    				# Helpers functions
	require_once( 'lib/post-types.php' );                				# Custom post types
	\Carbon_Fields\Carbon_Fields::boot();                    			# Init Carbon Fields
	require_once( 'lib/fields/reused-fields.php' );            			# Reused Fields
	require_once( 'lib/fields/theme-options.php' );            			# Theme Options Fields
	require_once( 'lib/fields/global-sections.php' );        			# Theme Options Fields
	require_once( 'lib/fields/template-fields.php' );        			# Templates Fields
	require_once( 'lib/fields/user-meta.php' );                			# User Fields
	require_once( 'lib/fields/post-types-options.php' );            	# Post Type Options Fields

	// After Carbon Fields Loaded
	add_action( 'carbon_fields_fields_registered', function () {
		require_once( 'config/constants.php' );                			# Theme constants
		require_once( 'lib/assets.php' );                        		# Theme styles and scripts
		require_once( 'lib/ajax.php' );                        			# Ajax endpoints
		require_once( 'lib/api.php' );                        			# API endpoints
		require_once( 'lib/branding.php' );                        		# Brand wp screens and bars
		require_once( 'lib/menus.php' );                        		# Menu options
	} );
}

add_action( 'after_setup_theme', 'load_theme_dependencies' );


/**
 * Hide admin bar
 */
add_filter( 'show_admin_bar', function ( $show ) {
	if ( !current_user_can( 'administrator' ) ) {
		return false;
	}
	return $show;
} );
