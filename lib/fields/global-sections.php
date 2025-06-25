<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_global_sections' );
function crb_attach_global_sections()
{
	Container::make( 'theme_options', __( 'Глобальные секции', THEME_TD ) )
		->add_tab( __( 'Как это работает', THEME_TD ), HOW_IT_WORKS_FIELDS );
}