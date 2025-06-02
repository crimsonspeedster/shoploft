<?php
$common__logo = get_field('common__logo', 'option');
?>

        <footer class="footer">
            <div class="footer-inner">
                <div class="lang-logo">
                    <?php get_template_part('partials/global/lang-switch'); ?>

                    <a href="<?= get_home_url(); ?>" class="logo-wrap">
                        <?= wp_get_attachment_image($common__logo, 'full', null, ['class' => 'logo']); ?>
                    </a>
                </div>

                <?php
                    if (has_nav_menu('footer-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footer-menu',
                            'container' => '',
                            'add_li_class' => 'footer-menu_item',
                            'add_a_class' => 'footer-menu-link',
                            'depth' => 1,
                        ));
                    }
                ?>

                <div class="footer-information">
                    <p class="copy">
                        <?=
                            sprintf(
                                __('©2015 - %s %s Інтернет магазин освітлення та декору. Всі права захищені.', 'shoploft'),
                                date('Y'),
                                htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8')
                            );
                        ?>
                    </p>

                    <p class="developers">
                        <?=
                            sprintf(
                                __('Розробка сайту — <a href="%s" target="_blank" rel="nofollow noindex noopener">студія Март</a>', 'shoploft'),
                                'https://mart.com.ua/'
                            );
                        ?>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php get_template_part('partials/global/popups'); ?>

<?php wp_footer(); ?>
</body>
</html>