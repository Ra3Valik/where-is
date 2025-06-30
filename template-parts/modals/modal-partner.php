<?php
$data = get_query_var( 'modal_data' );
?>

<div class="modal-backdrop js-modal-close"></div>
<div class="modal-window">
    <button class="modal-close js-modal-close">&times;</button>

    <div class="modal-content">
        <img src="<?= esc_url( $data['logo'] ) ?>"
             alt="<?= esc_attr( $data['name'] ) ?>"
             class="modal-logo">

        <h3 class="modal-title"><?= esc_html( $data['name'] ) ?></h3>

		<?php if ( !empty( $data['desc'] ) ): ?>
            <div class="modal-desc"><?= esc_html( $data['desc'] ) ?></div>
		<?php endif; ?>

		<?php if ( !empty( $data['url'] ) ): ?>
            <a href="<?= esc_url( $data['url'] ) ?>"
               target="_blank"
               class="modal-link">
                <?= __( 'Перейти на сайт', THEME_TD ) ?>
            </a>
		<?php endif; ?>
    </div>
</div>
