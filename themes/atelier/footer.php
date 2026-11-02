<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <a class="footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
                ATELIER
            </a>

            <div class="footer__column">
                <h2 class="footer__heading">Navigation</h2>

                <?php
                wp_nav_menu([
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer__menu',
                        'fallback_cb'    => false,
                ]);
                ?>
            </div>

            <div class="footer__column">
                <h2 class="footer__heading">Connect</h2>

                <a href="mailto:hello@atelier.studio">hello@atelier.studio</a>
                <a href="#">Instagram</a>
                <a href="#">LinkedIn</a>
            </div>
        </div>

        <div class="footer__bottom">
            <span>© <?php echo esc_html(wp_date('Y')); ?> ATELIER. All rights reserved.</span>

            <a href="#top" class="footer__back-to-top js-back-to-top">
                Back to top ↑
            </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>