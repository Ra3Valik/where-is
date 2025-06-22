<?php

define( 'THEME_ICON_URL', carbon_get_theme_option( 'theme_icon' ) ?? get_theme_file_uri( 'assets/img/branding/favicon/android-chrome-512x512.png' ) );
define( 'THEME_LOGO_URL', carbon_get_theme_option( 'theme_logo' ) ?? get_theme_file_uri( 'assets/img/branding/logo.png' ) );
define( 'RA3VALIK_LOGO_SVG_PATH', get_theme_file_path( 'assets/img/branding/ra3valik.svg' ) );
