<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-logo">
                <img src="<?= THEME_LOGO_URL ?>" alt="Where Is?"/>
            </div>

            <nav class="footer-nav">
                <a href="/sitemap_index.xml" class="footer-link"><?= __( 'Карта сайта', THEME_TD ) ?></a>
                <a href="/privacy" class="footer-link"><?= __( 'Политика конфиденциальности', THEME_TD ) ?></a>
                <a href="/contact" class="footer-link"><?= __( 'Контакты', THEME_TD ) ?></a>
            </nav>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>© Where Is?, <?= date( 'Y' ) ?> — <?= __( 'Все права защищены', THEME_TD ) ?></p>
            <p class="dev-credit"><?= __( 'Разработка', THEME_TD ) ?>: <a href="<?= RA3VALIK_URL ?>" target="_blank" rel="noopener">Ra3Valik</a></p>
        </div>
    </div>
</footer>


<?php wp_footer() ?>
</body>
</html>