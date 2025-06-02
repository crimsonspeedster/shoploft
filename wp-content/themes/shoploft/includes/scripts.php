<?php

add_action( 'wp_enqueue_scripts', function () {
    $ver = 1;

    wp_register_script('front-main', get_template_directory_uri() . '/dist/front/js/main.js', [], $ver, true);
    wp_register_script('front-tabs', get_template_directory_uri() . '/dist/front/js/tabs.js', [], $ver, true);
    wp_register_script('front-dropdown', get_template_directory_uri() . '/dist/front/js/dropdown.js', [], $ver, true);
    wp_register_script('front-cart', get_template_directory_uri() . '/dist/front/js/cart.js', [], $ver, true);
    wp_register_script('front-popup', get_template_directory_uri() . '/dist/front/js/popup.js', [], $ver, true);
    wp_register_script('front-onlyCatalog', get_template_directory_uri() . '/dist/front/js/onlyCatalog.js', [], $ver, true);
    wp_register_script('front-sticky', get_template_directory_uri() . '/dist/front/js/sticky.js', [], $ver, true);
    wp_register_script('front-accordeon', get_template_directory_uri() . '/dist/front/js/accordeon.js', [], $ver, true);
    wp_register_script('front-slider-main', get_template_directory_uri() . '/dist/front/js/slider-main.js', [], $ver, true);
    wp_register_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', [], $ver, true);

    wp_register_script('back', get_template_directory_uri() . '/dist/back/js/index.js', [], $ver,  true);

    wp_enqueue_style( 'font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', [], $ver );
    wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], $ver );
    wp_enqueue_style( 'front', get_template_directory_uri() . '/dist/front/css/style.css', [], $ver );

    wp_enqueue_script('slick');
    wp_enqueue_style( 'back', get_template_directory_uri() . '/dist/back/css/style.css', [], $ver );

    wp_enqueue_script('front-main');
    wp_enqueue_script('front-popup');

    if (is_cart()) {
        wp_enqueue_script('slick');
        wp_enqueue_script('front-cart');
    }
    elseif (is_singular('product')) {
        wp_enqueue_script('front-sticky');
        wp_enqueue_script('front-accordeon');
    }
    elseif (is_page_template('page_templates/home.php')) {
        wp_enqueue_script('front-slider-main');
    }
    elseif (is_product_category() || is_archive()) {
        wp_enqueue_script('front-onlyCatalog');
    }
    elseif (is_account_page()) {
        wp_enqueue_script('front-tabs');
        wp_enqueue_script('front-dropdown');
    }


    wp_enqueue_script('back');
    wp_localize_script('back', 'api_settings', array(
        'nonce'         => wp_create_nonce('api_settings_nonce'),
        'ajax_url'      => site_url() . '/wp-admin/admin-ajax.php',
    ));
}, 10010 );

add_action('wp_footer', function () {
    if (is_account_page()) {
        ?>
        <script>
            let acc = document.getElementsByClassName("table-accordion");
            let i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("is-active");
                    let panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
        <?php
    }
});
