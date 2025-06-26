<?php
$title = carbon_get_theme_option( 'section_tg_register_title' );
$text_guest = carbon_get_theme_option( 'section_tg_register_text_guest' );
$text_logged_in = carbon_get_theme_option( 'section_tg_register_text_logged_in' );
$text_no_game = carbon_get_theme_option( 'section_tg_register_text_no_game' );
$btn_guest = carbon_get_theme_option( 'section_tg_register_btn_guest' );
$btn_join = carbon_get_theme_option( 'section_tg_register_btn_join' );
$btn_joined = carbon_get_theme_option( 'section_tg_register_btn_joined' );
$btn_notify = carbon_get_theme_option( 'section_tg_register_btn_notify' );

$current_user = wp_get_current_user();
$is_logged_in = is_user_logged_in();
$tg_id = $is_logged_in ? get_user_meta( $current_user->ID, 'tg_id', true ) : null;

$args = [
	'post_type' => 'game',
	'posts_per_page' => 1,
	'meta_query' => [
		['key' => 'game_status', 'value' => 'pending']
	],
	'orderby' => 'meta_value',
	'meta_key' => 'game_start',
	'order' => 'ASC',
];

$query = new WP_Query( $args );
$next_game = $query->have_posts() ? $query->posts[0] : null;
$game_id = $next_game ? $next_game->ID : null;
$joined = $game_id && in_array( $current_user->ID, carbon_get_post_meta( $game_id, 'assoc_users' ) ?: [] );
?>

<section class="tg-register">
    <div class="tg-register__container">
        <div class="tg-register__content">
            <h2 class="tg-register__title"><?= esc_html( $title ) ?></h2>
            <p class="tg-register__text">
				<?php if ( !$is_logged_in || !$tg_id ): ?>
					<?= esc_html( $text_guest ) ?>
				<?php elseif ( $next_game ): ?>
					<?= esc_html( $text_logged_in ) ?>
				<?php else: ?>
					<?= esc_html( $text_no_game ) ?>
				<?php endif; ?>
            </p>

			<?php if ( !$is_logged_in || !$tg_id ): ?>
                <a href="https://t.me/<?= TELEGRAM_BOT_TOKEN ?>" class="tg-auth-btn btn btn-accent" target="_blank">
					<?= esc_html( $btn_guest ) ?>
                </a>
			<?php elseif ( $next_game && !$joined ): ?>
                <form action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post">
                    <input type="hidden" name="action" value="join_game">
                    <input type="hidden" name="game_id" value="<?= esc_attr( $game_id ) ?>">
                    <button type="submit" class="btn btn-accent"><?= esc_html( $btn_join ) ?></button>
                </form>
			<?php elseif ( $next_game && $joined ): ?>
                <div class="btn tg-register__button--disabled"><?= esc_html( $btn_joined ) ?></div>
			<?php else: ?>
                <a href="https://t.me/<?= TELEGRAM_BOT_TOKEN ?>" class="tg-auth-btn btn btn-accent" target="_blank">
					<?= esc_html( $btn_notify ) ?>
                </a>
			<?php endif; ?>

        </div>
    </div>
</section>
