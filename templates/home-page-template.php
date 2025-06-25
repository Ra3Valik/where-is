<?php
/**
 * Template Name: Главная страница
 */

get_header(); ?>

<main class="site-main">
    <?php get_template_part( 'template-parts/sections/hero' ); ?>

    <?php get_template_part( 'template-parts/sections/how-it-works' ); ?>
</main>

<?php get_footer(); ?>
