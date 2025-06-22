<?php

/**
 * Change the URL of of the logo available on the WordPress login page.
 *
 * @return string
 */
function custom_wp_login_logo_link()
{
	return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'custom_wp_login_logo_link' );

/**
 * Create a global CSS variable that used for the background image of the WordPress login logo.
 *
 * @return void
 */
function custom_login_screen_logo()
{
	?>

    <style type="text/css">
        :root {
            --theme-logo-url: url('<?php echo THEME_LOGO_URL; ?>');
        }
    </style>

	<?php
}

add_action( 'login_head', 'custom_login_screen_logo' );

/**
 * Use hooks to replace the admin bar logo.
 *
 * @return void
 */
function replace_admin_bar_logo()
{
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
	add_action( 'admin_bar_menu', 'custom_admin_bar_logo' );
}

add_action( 'add_admin_bar_menus', 'replace_admin_bar_logo' );

/**
 * Add an element to the admin bar for the custom theme logo.
 *
 * @param object $wp_admin_bar The WP Admin bar object provided by the admin_bar_menu hook.
 * @return void
 */
function custom_admin_bar_logo( $wp_admin_bar )
{
	$wp_admin_bar->add_menu(
		[
			'id' => 'theme-logo',
			'title' => '<img src="' . THEME_ICON_URL . '" alt="Admin Bar Logo" >',
			'href' => home_url( '/' ),
			'meta' => [
				'title' => get_bloginfo( 'name' ),
			],
		]
	);
}

/**
 * Add custom text to the bottom of the WordPress dashboard pages.
 *
 * @return void
 */
function custom_admin_footer_text()
{
	?>

    <span id="footer-thankyou">
		<?php esc_html_e( 'Developed by', THEME_TD ); ?>

		<a href="<?php echo esc_url( RA3VALIK_URL ); ?>" title="<?php esc_attr_e( 'Ra3Valik', THEME_TD ); ?>"
           target="_blank">
			<?php svg_inline( RA3VALIK_LOGO_SVG_PATH ); ?>
		</a>
	</span>

	<?php
}

add_filter( 'admin_footer_text', 'custom_admin_footer_text' );
