<?php
$use_global = carbon_get_the_post_meta( 'use_faq_global_settings' );
$get_field = $use_global ? 'carbon_get_theme_option' : 'carbon_get_the_post_meta';
$faq_title = $get_field( 'faq_title' );
$faq_items = $get_field( 'faq_global_list' );

if ( !empty( $faq_items ) ):
	?>
    <section class="faq-section">
        <div class="faq-section__container">
            <h2 class="faq-section__title"><?= esc_html( $faq_title ); ?></h2>

            <div class="faq-accordion">
				<?php foreach ( $faq_items as $index => $item ): ?>
                    <div class="faq-item<?= $index === 0 ? ' is-open' : '' ?>">
                        <button class="faq-question<?= $index === 0 ? ' open' : '' ?>" type="button">
							<?= esc_html( $item['question'] ) ?>
                            <span class="faq-toggle-icon">+</span>
                        </button>
                        <div class="faq-answer">
							<?= wpautop( $item['answer'] ) ?>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
