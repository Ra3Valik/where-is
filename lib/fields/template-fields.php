<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_home_page_fields' );
function crb_attach_home_page_fields()
{
	Container::make( 'post_meta', __( 'Настройки темы', THEME_TD ) )
		->where( 'post_template', '=', 'templates/home-page-template.php' )
		->add_tab( HERO_SECTIONS_TITLE, HERO_SECTIONS_FIELDS )
		->add_tab( HOW_IT_WORKS_TITLE, [
			Field::make( 'html', 'hiwt_in_gs' )
				->set_html( FIELDS_IN_GLOBAL_OPTIONS_HTML ),
		] )
		->add_tab( TELEGRAM_REGISTER_SECTIONS_TITLE, [
			Field::make( 'html', 'tr_in_gs' )
				->set_html( FIELDS_IN_GLOBAL_OPTIONS_HTML ),
		] );
}