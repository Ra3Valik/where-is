<?php
$hero_bg = carbon_get_the_post_meta( 'hero_background_image' );
$hero_title = carbon_get_the_post_meta( 'hero_title' );
$hero_desc = carbon_get_the_post_meta( 'hero_desc' );
$hero_btn_enabled = carbon_get_the_post_meta( 'hero_btn_enabled' );
?>

<section class="hero" style="background-image: url('<?= esc_url( $hero_bg ); ?>');">
    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?= esc_html( $hero_title ) ?></h1>

            <?php if ( !empty( $hero_desc ) ) : ?>
                <p class="hero-subtitle"><?= esc_html( $hero_desc ) ?></p>
			<?php endif ?>

            <?php if ( !empty( $hero_btn_enabled ) ) :
				$hero_btn_text = carbon_get_the_post_meta( 'hero_cta_btn_text' );
				$hero_btn_link = carbon_get_the_post_meta( 'hero_cta_btn_link' );
				$hero_btn_new_tab = carbon_get_the_post_meta( 'hero_cta_btn_new_tab' );
            ?>
                <a
                    href="<?= esc_url( $hero_btn_link ) ?>"
                    class="btn btn-accent"
                    <?= $hero_btn_new_tab ? 'target="_blank"' : '' ?>
                >
                    <?= esc_html( $hero_btn_text ) ?>
                </a>
			<?php endif ?>
        </div>
    </div>
</section>
