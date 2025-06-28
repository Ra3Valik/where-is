<?php

$query = new WP_Query( [
	'post_type' => 'testimonial',
	'posts_per_page' => 8,
	'orderby' => 'date',
	'order' => 'DESC'
] );

$use_global = carbon_get_the_post_meta( 'use_testimonials_global_settings' );
$func = $use_global ? 'carbon_get_theme_option' : 'carbon_get_the_post_meta';
$section_title = $func( 'testimonials_section_title' );

if ( $query->have_posts() ) :
	?>

    <section class='section-testimonials'>
        <div class='section-testimonials__container'>
            <h2 class='section-testimonials__title'><?= esc_html( $section_title )?></h2>

            <div class="swiper testimonials-swiper section-testimonials__slider">
                <div class="swiper-wrapper">
					<?php while ( $query->have_posts() ) : $query->the_post();
						$avatar = carbon_get_post_meta( get_the_ID(), 'avatar' );
						$name = carbon_get_post_meta( get_the_ID(), 'author_name' ) ?: get_the_title();
						$text = get_the_content();
						?>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
								<?php if ( $avatar ) : ?>
                                    <div class="testimonial-avatar">
                                        <img src="<?php echo esc_url( $avatar ); ?>"
                                             alt="<?php echo esc_attr( $name ); ?>">
                                    </div>
								<?php endif; ?>
                                <div class="testimonial-name"><?php echo esc_html( $name ); ?></div>
                                <p class="testimonial-text"><?php echo apply_filters( 'the_content', "'$text'" ); ?></p>
                            </div>
                        </div>
					<?php endwhile;
					wp_reset_postdata(); ?>
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
<?php endif; ?>

