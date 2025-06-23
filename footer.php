<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-logo">
                <img src="<?= THEME_LOGO_URL ?>" alt="Where Is?"/>
            </div>

            <nav class="footer-nav">
                <a href="/sitemap_index.xml" class="footer-link">Карта сайта</a>
                <a href="/privacy" class="footer-link">Политика конфиденциальности</a>
                <a href="/contact" class="footer-link">Контакты</a>
            </nav>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>© Where Is?, <?= date( 'Y' ) ?> — Все права защищены</p>
            <p class="dev-credit">Разработка: <a href="<?= RA3VALIK_URL ?>" target="_blank" rel="noopener">Ra3Valik</a></p>
        </div>
    </div>
</footer>


<?php wp_footer() ?>
</body>
</html>