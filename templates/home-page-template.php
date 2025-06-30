<?php
/**
 * Template Name: Главная страница
 */

get_header(); ?>

<main class="site-main">
    <?php get_template_part( 'template-parts/sections/hero' ); ?>

    <?php get_template_part( 'template-parts/sections/how-it-works' ); ?>

	<?php get_template_part( 'template-parts/sections/active-game' ); ?>

	<?php get_template_part( 'template-parts/sections/testimonial-form' ); ?>

	<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

	<?php get_template_part( 'template-parts/sections/faq' ); ?>

	<?php get_template_part( 'template-parts/sections/partners-list' ); ?>
</main>

<?php get_footer(); ?>
