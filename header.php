<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <a href="<?= home_url() ?>" class="logo logo-desktop">
            <img src="<?= THEME_LOGO_URL ?>" alt="Логотип">
        </a>

        <a href="<?= home_url() ?>" class="logo logo-tablet">
            <img src="<?= THEME_LOGO_TABLET_URL ?>" alt="Логотип (tablet)">
        </a>

        <?php if ( has_nav_menu( 'main_menu' ) ) : ?>
            <nav class="main-nav">
                <ul>
					<?php
					wp_nav_menu( [
						'theme_location' => 'main_menu',
						'menu_class' => 'menu',
						'container' => false,
						'depth' => 1,
					] );
					?>
                </ul>
            </nav>
        <?php endif ?>

        <div class="header-cta">
			<?php if ( is_user_logged_in() ) :
				$current_user = wp_get_current_user();
				$user_url = home_url( '/user/' . $current_user->user_nicename );
				?>
                <a href="<?php echo esc_url( $user_url ); ?>" class="btn btn-outline btn-cabinet">Кабинет</a>
                <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="btn btn-secondary">Выход</a>
			<?php else : ?>
                <a href="https://t.me/<?= TELEGRAM_BOT_TOKEN ?>" class="btn btn-secondary">Вход через Telegram</a>
			<?php endif; ?>
        </div>

        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
