<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_home_page_fields' );
function crb_attach_home_page_fields()
{
	Container::make( 'post_meta', __( 'Настройки Страницы', THEME_TD ) )
		->where( 'post_template', '=', 'templates/home-page-template.php' )
		->where( 'post_type', '=', 'page' )
		->add_tab( HERO_SECTIONS_TITLE, HERO_SECTIONS_FIELDS )
		->add_tab( HOW_IT_WORKS_TITLE, make_section_with_toggle(
			'how_it_works',
			HOW_IT_WORKS_FIELDS
		) )
		->add_tab( ACTIVE_GAME_SECTION_TITLE, make_section_with_toggle(
			'active_game',
			ACTIVE_GAME_SECTION_FIELDS
		) )
		->add_tab( FAQ_SECTION_TITLE, make_section_with_toggle(
			'faq',
			FAQ_SECTION_FIELDS
		) )
		->add_tab( TESTIMONIALS_SECTION_TITLE, make_section_with_toggle(
			'testimonials',
			TESTIMONIALS_SECTION_FIELDS
		) );
//		->add_tab( TELEGRAM_REGISTER_SECTIONS_TITLE, [
//			Field::make( 'html', 'tr_in_gs' )
//				->set_html( FIELDS_IN_GLOBAL_OPTIONS_HTML ),
//		] );
}