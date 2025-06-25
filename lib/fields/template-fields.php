<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_home_page_fields' );
function crb_attach_home_page_fields()
{
	Container::make( 'post_meta', __( 'Настройки темы', THEME_TD ) )
		->where( 'post_template', '=', 'templates/home-page-template.php' )
		->add_tab( __( 'Главная', THEME_TD ), HERO_SECTIONS_FIELDS );
}