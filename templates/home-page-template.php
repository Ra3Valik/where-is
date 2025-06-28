<?php
/**
 * Template Name: Главная страница
 */

get_header(); ?>

<main class="site-main">
    <?php get_template_part( 'template-parts/sections/hero' ); ?>

    <?php get_template_part( 'template-parts/sections/how-it-works' ); ?>

<!--	--><?php //get_template_part( 'template-parts/sections/tg-register' ); ?>

<!--	--><?php //get_template_part( 'template-parts/sections/prize' ); ?>

	<?php get_template_part( 'template-parts/sections/active-game' ); ?>
</main>

<?php get_footer(); ?>
