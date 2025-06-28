<?php
$active_game = get_posts( [
	'post_type' => 'game',
	'meta_key' => '_game_status',
	'meta_value' => 'active',
	'posts_per_page' => 1,
] )[0] ?? null;

$is_logged_in = is_user_logged_in();

$title = carbon_get_theme_option( 'active_game_title' );
$preview_icon = carbon_get_theme_option( 'active_game_preview_icon' );
$preview_text = nl2br( carbon_get_theme_option( 'active_game_preview_text' ) );
$button_text = carbon_get_theme_option( 'active_game_button_text' );

$no_game_title = carbon_get_theme_option( 'active_game_no_game_title' );
$no_game_subtitle = nl2br( carbon_get_theme_option( 'active_game_no_game_subtitle' ) );
$archive_link_text = carbon_get_theme_option( 'active_game_archive_link_text' );
$archive_link_url = carbon_get_theme_option( 'active_game_archive_link_url' );
?>

<section id="active-game" class="active-game-section">
    <div class="active-game-section__container">
        <h2 class="active-game-section__title"><?= esc_html( $title ) ?></h2>

		<?php if ( $active_game ): ?>
			<?php
			$game_id = $active_game->ID;
			$start = carbon_get_post_meta( $game_id, 'game_start' );
			$limit = carbon_get_post_meta( $game_id, 'winner_limit' );
			$duration_minutes = 60;
			$start_timestamp = strtotime( $start );
			?>
            <div class='active-game-section__content'
                 data-start="<?= esc_attr( date( 'Y-m-d H:i:s', $start_timestamp ) ) ?>"
                 data-duration="<?= esc_attr( $duration_minutes ) ?>">

                <div class='active-game-section__preview'>
                    <div class='preview-icon'><?= esc_html( $preview_icon ) ?></div>
                    <div class='preview-text'><?= $preview_text ?></div>
                </div>

                <div class='active-game-section__info'>
                    <div class='active-game-section__start'>
						<?= esc_html__( 'Начало:', THEME_TD ) ?>
						<?= date( 'd.m.Y H:i', $start_timestamp ) ?>
                    </div>
                    <div class="active-game-section__limit">
						<?= esc_html__( 'Победителей:', THEME_TD ) ?>
						<?= esc_html( $limit ) ?>
                    </div>

                    <div class="active-game-section__timer">
                        <span class="timer-label"><?= esc_html__( 'До начала:', THEME_TD ) ?></span>
                        <span class="timer-countdown">00:00:00</span>
                    </div>

					<?php if ( $is_logged_in ): ?>
                        <a href="#register" class="btn btn-accent"><?= esc_html( $button_text ) ?></a>
					<?php else: ?>
                        <div class="login-warning">
                            <p><?= esc_html__( 'Чтобы участвовать в игре, войдите через Telegram.', THEME_TD ) ?></p>
                            <a href="#"
                               class="btn btn-accent tg-auth-btn"><?= esc_html__( 'Войти через Telegram', THEME_TD ) ?></a>
                        </div>
					<?php endif; ?>
                </div>
            </div>
		<?php else: ?>
            <div class="active-game-section__no-game enhanced">
                <div class="no-game-bg-icon">⌛</div>
                <h3 class="no-game-title"><?= esc_html( $no_game_title ) ?></h3>
                <p class="no-game-subtitle">
					<?= $no_game_subtitle ?><br>
                    <a href="<?= TELEGRAM_REGISTER_URL ?>" target="_blank"><?= esc_html__( 'Telegram', THEME_TD ) ?></a>.
                </p>

                <div class="active-game-section__archive-link">
                    <a href="<?= esc_url( $archive_link_url ) ?>"><?= esc_html( $archive_link_text ) ?></a>
                </div>
            </div>
		<?php endif; ?>
    </div>
</section>
