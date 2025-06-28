<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_global_sections' );
function crb_attach_global_sections()
{
	Container::make( 'theme_options', __( 'Глобальные секции', THEME_TD ) )
		->add_tab( HOW_IT_WORKS_TITLE, HOW_IT_WORKS_FIELDS )
		->add_tab( TELEGRAM_REGISTER_SECTIONS_TITLE, TELEGRAM_REGISTER_SECTIONS_FIELDS )
		->add_tab( ACTIVE_GAME_SECTION_TITLE, ACTIVE_GAME_SECTION_FIELDS )
		->add_tab( FAQ_SECTION_TITLE, FAQ_SECTION_FIELDS )
		->add_tab( TESTIMONIALS_SECTION_TITLE, TESTIMONIALS_SECTION_FIELDS );
}