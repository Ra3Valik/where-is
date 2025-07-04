<?php
$use_global = carbon_get_the_post_meta( 'use_how_it_works_global_settings' );
$get_field = $use_global ? 'carbon_get_theme_option' : 'carbon_get_the_post_meta';

$title = $get_field( 'how_it_works_title' );
$subtitle = $get_field( 'how_it_works_subtitle' );
$steps = $get_field( 'how_it_works_steps' );
if ( !empty( $steps ) && !empty( $title ) ) :
	?>
    <section class='how-it-works'>
        <div class='container'>
            <h2><?= esc_html( $title ) ?></h2>
			<?php if ( !empty( $subtitle ) ) : ?>
                <div class='subtitle'><?= esc_html( $subtitle ) ?></div>
			<?php endif ?>

            <div class='steps'>
				<?php foreach ( $steps as $step ):
					?>
                    <div class="step">
						<?php if ( !empty( $step['icon'] ) ): ?>
                            <div class="icon">
								<?php svg_inline( $step['icon'] ); ?>
                            </div>
						<?php endif; ?>
                        <div class="text"><?php echo esc_html( $step['title'] ); ?></div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>