<?php
$use_global = carbon_get_the_post_meta( 'use_partners_global_settings' );
$get_field = $use_global ? 'carbon_get_theme_option' : 'carbon_get_the_post_meta';
$partners = $get_field( 'partners_list' );
$partners_title = $get_field( 'partners_title' );

if ( $partners ):
	?>
    <section class='partners-slider'>
        <div class='container'>
            <h2 class='partners-slider__title'><?= esc_html( $partners_title ) ?></h2>
            <div class='swiper js-partners-slider'>
                <div class='swiper-wrapper'>
					<?php foreach ( $partners as $i => $partner ): ?>
                        <div class="swiper-slide">
                            <button class="partners-slider__logo-btn"
                                    data-modal="partner-modal-<?= $i ?>">
                                <img src="<?= esc_url( $partner['logo'] ) ?>" alt="<?= esc_attr( $partner['name'] ) ?>"
                                     class="partners-slider__logo">
                            </button>
                        </div>
					<?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>

	<?php
	foreach ( $partners as $i => $partner ) {
		ModalRenderer::addModal(
			'partner-modal-' . $i,
			'/template-parts/modals/modal-partner',
			$partner
		);
	}
	?>
<?php endif; ?>

