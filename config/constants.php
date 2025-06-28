<?php

define( 'THEME_ICON_URL', carbon_get_theme_option( 'theme_icon' ) ?? get_theme_file_uri( 'assets/img/branding/favicon/android-chrome-512x512.png' ) );
define( 'THEME_LOGO_URL', carbon_get_theme_option( 'theme_logo' ) ?? get_theme_file_uri( 'assets/img/branding/logo_v2.png' ) );
define( 'THEME_LOGO_TABLET_URL', carbon_get_theme_option( 'theme_logo_tablet' ) ?? get_theme_file_uri( 'assets/img/branding/logo-tablet_v2.png' ) );
define( 'RA3VALIK_LOGO_SVG_PATH', get_theme_file_path( 'assets/img/branding/ra3valik.svg' ) );
define( 'TELEGRAM_BOT_TOKEN', carbon_get_theme_option( 'tg_bot_token' ) );
define( 'TELEGRAM_REGISTER_URL', 'https://t.me/' . TELEGRAM_BOT_TOKEN );
define( 'TELEGRAM_BOT_ID', carbon_get_theme_option( 'tg_bot_id' ) );
define( 'TELEGRAM_BOT_USERNAME', carbon_get_theme_option( 'tg_bot_username' ) );