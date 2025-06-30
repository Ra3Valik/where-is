<?php

class ModalRenderer
{
	private static $modals = [];

	/**
	 * Add modal to render queue
	 *
	 * @param string $id       Modal unique ID
	 * @param string $template Template Path (related for theme path)
	 * @param array $data      Template Data
	 */
	public static function addModal( $id, $template, $data = [] )
	{
		self::$modals[$id] = [
			'template' => $template,
			'data' => $data
		];
	}

	/**
	 * Render all modals
	 */
	public static function renderModals()
	{
		foreach ( self::$modals as $id => $modal ) {
			echo '<div class="global-modal" id="' . esc_attr( $id ) . '" style="display:none;">';

			set_query_var( 'modal_data', $modal['data'] );
			get_template_part( $modal['template'] );

			echo '</div>';
		}
	}
}

// Register modals in footer
add_action( 'wp_footer', ['ModalRenderer', 'renderModals'] );
