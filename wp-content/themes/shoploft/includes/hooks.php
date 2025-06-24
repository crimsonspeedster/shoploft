<?php
// functions
function tab_shipping_payment_content() {
    $product__delivery_tab = get_field('product__delivery_tab', 'option');

    if ($product__delivery_tab) {
        ?>
        <div><?= apply_filters('the_content', $product__delivery_tab); ?></div>
        <?php
    }
}

// Actions
add_action('init', function () {
    if (!function_exists('pll__')) {
        function pll__($text, $domain = 'default') {
            return $text;
        }
    }

    if (!function_exists('pll_e')) {
        function pll_e($text, $domain = 'default') {
            echo $text;
        }
    }

    add_rewrite_endpoint( 'contacts', EP_ROOT | EP_PAGES );
    add_rewrite_endpoint( 'my-password', EP_ROOT | EP_PAGES );

    $post_types = [];
    $post_taxonomies = [
        'product_collection' => [
            'post_types' => ['product'],
            'args' => [
                'label'                 => '',
                'labels'                => array(
                    'name'              => __('Колекція', 'shoploft'),
                    'singular_name'     => __('Колекції', 'shoploft'),
                    'menu_name'         => __('Колекції', 'shoploft'),
                ),
                'description'           => '',
                'public'                => true,
                'publicly_queryable'    => true,
                'show_in_nav_menus'     => true,
                'show_ui'               => true,
                'show_tagcloud'         => true,
                'show_in_rest'          => true,
                'rest_base'             => null,
                'hierarchical'          => true,
                'update_count_callback' => '',
                'rewrite'               => true,
                'capabilities'          => array(),
                'meta_box_cb'           => null,
                'show_admin_column'     => false,
                '_builtin'              => false,
                'show_in_quick_edit'    => null,
            ]
        ],
    ];

    if (!empty($post_types)) {
        foreach ($post_types as $post_type => $post_type_data) {
            register_post_type($post_type, $post_type_data);
        }
    }

    if (!empty($post_taxonomies)) {
        foreach ($post_taxonomies as $post_taxonomy => $post_taxonomy_data) {
            register_taxonomy($post_taxonomy, $post_taxonomy_data['post_types'], $post_taxonomy_data['args']);
        }
    }
});
add_action('woocommerce_account_contacts_endpoint', function () {
    get_template_part('partials/woocommerce/endpoint-contacts');
});
add_action('woocommerce_account_my-password_endpoint', function () {
    get_template_part('partials/woocommerce/endpoint-my-password');
});
add_action('after_setup_theme', function () {
    add_image_size('large', 1100, '', true);
    add_image_size('medium', 700, '', true);
    add_image_size('small', 300, '', true);

    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menus(array(
        'footer-menu' => __('Footer Menu', 'shoploft'),
    ));

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Theme settings',
            'menu_title'    => 'Theme settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
});
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => 'Sidebar Top',
        'id'            => 'sidebar-top',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Sidebar Bottom',
        'id'            => 'sidebar-bottom',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    register_sidebar([
        'name'          => 'Top Banner',
        'id'            => 'top-banner',
        'description'   => '',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ]);
});
add_action('woocommerce_single_product_summary', function () {
    get_template_part('partials/woocommerce/product-head-info');
}, 1);
add_action('woocommerce_single_product_summary', function () {
    ?>
    <div class="product-texts">
    <?php
}, 2);
add_action('woocommerce_single_product_summary', function () {
    ?>
    </div>
    <?php
}, 61);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 12);
add_action('woocommerce_single_product_summary', function () {
    global $product;
    ?>
    <div class="product-info">
    <?php
        echo apply_filters('the_content', $product->get_description());
}, 15);
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 20);
add_action('woocommerce_single_product_summary', function () {
    ?>
    </div>
    <?php
}, 65);
add_action('woocommerce_after_add_to_cart_button', function () {
    global $product;

    if ($product->get_type() === 'simple') {
        ?>
        <button type="button" class="button-link green buy-in-one-click" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" data-quantity="<?= apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                <path d="M11.375 23.625C11.375 23.9711 11.2724 24.3095 11.0801 24.5972C10.8878 24.885 10.6145 25.1093 10.2947 25.2418C9.97493 25.3742 9.62306 25.4089 9.28359 25.3414C8.94413 25.2738 8.63231 25.1072 8.38756 24.8624C8.14282 24.6177 7.97615 24.3059 7.90863 23.9664C7.8411 23.6269 7.87576 23.2751 8.00821 22.9553C8.14066 22.6355 8.36497 22.3622 8.65275 22.1699C8.94054 21.9776 9.27888 21.875 9.625 21.875C10.0891 21.875 10.5342 22.0594 10.8624 22.3876C11.1906 22.7158 11.375 23.1609 11.375 23.625ZM21 21.875C20.6539 21.875 20.3155 21.9776 20.0278 22.1699C19.74 22.3622 19.5157 22.6355 19.3832 22.9553C19.2508 23.2751 19.2161 23.6269 19.2836 23.9664C19.3512 24.3059 19.5178 24.6177 19.7626 24.8624C20.0073 25.1072 20.3191 25.2738 20.6586 25.3414C20.9981 25.4089 21.3499 25.3742 21.6697 25.2418C21.9895 25.1093 22.2628 24.885 22.4551 24.5972C22.6474 24.3095 22.75 23.9711 22.75 23.625C22.75 23.1609 22.5656 22.7158 22.2374 22.3876C21.9093 22.0594 21.4641 21.875 21 21.875ZM26.2183 8.10906L23.4139 18.2022C23.2597 18.7535 22.9299 19.2396 22.4746 19.5866C22.0192 19.9336 21.4631 20.1226 20.8906 20.125H10.08C9.50582 20.1247 8.94747 19.9367 8.49012 19.5895C8.03277 19.2424 7.70152 18.7552 7.54688 18.2022L3.71 4.375H1.75C1.51794 4.375 1.29538 4.28281 1.13128 4.11872C0.967187 3.95462 0.875 3.73206 0.875 3.5C0.875 3.26794 0.967187 3.04538 1.13128 2.88128C1.29538 2.71719 1.51794 2.625 1.75 2.625H4.375C4.5663 2.62496 4.75234 2.68762 4.90464 2.80338C5.05694 2.91913 5.16711 3.08161 5.21828 3.26594L6.25516 7H25.375C25.5099 6.99997 25.643 7.03114 25.7638 7.09105C25.8847 7.15097 25.99 7.23802 26.0717 7.3454C26.1533 7.45277 26.2091 7.57758 26.2345 7.71005C26.2599 7.84253 26.2544 7.97908 26.2183 8.10906ZM24.2233 8.75H6.74188L9.23672 17.7341C9.28789 17.9184 9.39806 18.0809 9.55036 18.1966C9.70266 18.3124 9.8887 18.375 10.08 18.375H20.8906C21.0819 18.375 21.268 18.3124 21.4203 18.1966C21.5726 18.0809 21.6827 17.9184 21.7339 17.7341L24.2233 8.75Z" fill="#387D17"/>
            </svg>

            <?= __('Купити в один клік', 'shoploft'); ?>
        </button>
        <?php
    }
}, 5);
add_action('woocommerce_after_add_to_cart_button', function () {
    $product__telegram = get_field('product__telegram', 'option');

    if (!empty($product__telegram)) {
        ?>
        <a href="<?= $product__telegram['url']; ?>" class="button-link blue" <?php getLinkAttrs($product__telegram); ?>>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                <path d="M21.4141 1.96387L8.30762 11.1309L8.27441 11.1533L8.30566 11.1797L17.1426 18.7451C17.1586 18.7591 17.1763 18.771 17.1953 18.7803L17.2559 18.8008C17.298 18.809 17.3422 18.8059 17.3828 18.792L17.3818 18.791C17.4014 18.7853 17.4202 18.778 17.4375 18.7676L17.4854 18.7295C17.5137 18.6998 17.5339 18.6629 17.543 18.623L21.4619 1.99707L21.4814 1.91699L21.4141 1.96387ZM7.91406 17.7539C7.91455 17.8007 7.92905 17.8463 7.95605 17.8848C7.96952 17.904 7.98556 17.9212 8.00391 17.9355L8.06543 17.9697C8.08742 17.9783 8.11047 17.9844 8.13379 17.9863L8.20508 17.9814C8.22813 17.9766 8.25006 17.9681 8.27051 17.957L8.32715 17.915L11.0713 15.1338L11.0947 15.1094L11.0693 15.0879L7.96582 12.4355L7.91406 12.3916V17.7539ZM17.9609 2.87402L1.26562 9.25195C1.25671 9.25483 1.24772 9.25901 1.24023 9.26465L1.2334 9.27051L1.22949 9.2793C1.22295 9.29685 1.22283 9.31646 1.22949 9.33398L1.23535 9.34863L1.25098 9.35254L1.2666 9.35742H1.26855L7.16699 10.4834L7.17969 10.4863L7.19043 10.4785L17.9902 2.92871L17.9609 2.87402ZM6.72168 11.5859L6.69629 11.5811L1.03809 10.4971C0.80611 10.4526 0.592619 10.3449 0.421875 10.1875L0.351562 10.1172C0.193588 9.94603 0.088649 9.73528 0.0488281 9.50977L0.0361328 9.41211C0.0150408 9.18285 0.061059 8.95283 0.167969 8.74902L0.217773 8.66309C0.341985 8.46727 0.520367 8.31045 0.731445 8.20996L0.824219 8.16992L22.0117 0.078125C22.1008 0.0440441 22.196 0.0281727 22.291 0.03125L22.3857 0.0410156C22.48 0.0567565 22.5698 0.0911906 22.6494 0.141602L22.7256 0.197266C22.7979 0.258154 22.857 0.332867 22.8984 0.416016L22.9336 0.501953C22.9633 0.590588 22.9744 0.684141 22.9658 0.776367L22.9512 0.867188L18.7041 18.8848C18.6633 19.0616 18.5876 19.2285 18.4814 19.376L18.3652 19.5166C18.2395 19.6502 18.0883 19.7577 17.9209 19.834L17.749 19.8994C17.6048 19.9448 17.4534 19.9675 17.3018 19.9678C16.9983 19.9674 16.7046 19.8731 16.4619 19.6992L16.3604 19.6201L12.0137 15.9014L11.9912 15.8818L11.9707 15.9033L9.18555 18.7217C8.98747 18.9222 8.73249 19.061 8.45312 19.1191C8.20877 19.17 7.9556 19.1577 7.71875 19.084L7.61816 19.0488C7.35328 18.9446 7.12649 18.765 6.9668 18.5342C6.80718 18.3034 6.72179 18.0312 6.72168 17.7529V11.5859Z" fill="#249ED7" stroke="#2CA3DB" stroke-width="0.0625"/>
            </svg>

            <?= $product__telegram['title']; ?>
        </a>
        <?php
    }
}, 10);
add_action('woocommerce_shop_loop_header', function () {
    get_template_part('partials/woocommerce/collections-slider');
}, 5);
add_action('woocommerce_shop_loop_header', function () {
    get_template_part('partials/woocommerce/product-archive-header');
}, 10);
add_action('woocommerce_after_shop_loop', function () {
    $per_page_options = getPerPageArray();
    $current_per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : $per_page_options[0];
    $current_url = remove_query_arg( 'paged' );

    ?>
    <div class="flex-line">
        <div class="limit">
            <span><?= __('Товарів на сторінці:', 'shoploft'); ?></span>

            <?php
                foreach ($per_page_options as $option) {
                    ?>
                    <a class="<?= $option === $current_per_page ? 'active' : ''; ?>" href="<?= esc_url( add_query_arg( 'per_page', $option, $current_url ) ); ?>"><?= $option; ?></a>
                    <?php
                }
            ?>
        </div>
    <?php
}, 5);
add_action('woocommerce_after_shop_loop', function () {
    ?>
    </div>
    <?php
}, 15);
add_action( 'template_redirect', function() {
    if (
        is_user_logged_in() &&
        !empty( $_POST['save_contacts'] ) &&
        isset( $_POST['contacts_nonce'] ) &&
        wp_verify_nonce( $_POST['contacts_nonce'], 'save_contacts' )
    ) {
        $user_id = get_current_user_id();

        if ( isset( $_POST['account_first_name'] ) ) {
            wp_update_user( [ 'ID' => $user_id, 'first_name' => sanitize_text_field( $_POST['account_first_name'] ) ] );
        }

        if ( isset( $_POST['account_last_name'] ) ) {
            wp_update_user( [ 'ID' => $user_id, 'last_name' => sanitize_text_field( $_POST['account_last_name'] ) ] );
        }

        if ( isset( $_POST['account_email'] ) && is_email( $_POST['account_email'] ) ) {
            wp_update_user( [ 'ID' => $user_id, 'user_email' => sanitize_email( $_POST['account_email'] ) ] );
        }

        if ( isset( $_POST['billing_phone'] ) ) {
            update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
        }

        if ( isset( $_POST['shipping_city'] ) ) {
            update_user_meta( $user_id, 'shipping_city', sanitize_text_field( $_POST['shipping_city'] ) );
        }

        if ( isset( $_POST['shipping_address_1'] ) ) {
            update_user_meta( $user_id, 'shipping_address_1', sanitize_text_field( $_POST['shipping_address_1'] ) );
        }

        if ( isset( $_POST['shipping_postcode'] ) ) {
            update_user_meta( $user_id, 'shipping_postcode', sanitize_text_field( $_POST['shipping_postcode'] ) );
        }

        wp_safe_redirect( wc_get_account_endpoint_url( 'contacts' ) . '?updated=1' );
        exit;
    }
});
add_action( 'template_redirect', function() {
    if (
        is_user_logged_in() &&
        !empty( $_POST['save_my-password'] ) &&
        isset( $_POST['my-account_nonce'] ) &&
        wp_verify_nonce( $_POST['my-account_nonce'], 'save_password' )
    ) {
        $current_password = $_POST['password_current'] ?? '';
        $password_1     = $_POST['password_1'] ?? '';
        $password_2     = $_POST['password_2'] ?? '';

        if ($password_1 === $password_2) {
            if ( !empty($current_password) && ! empty($password_1) ) {
                $user = wp_get_current_user();

                if ( wp_check_password($current_password, $user->user_pass, $user->ID) ) {
                    wp_set_password($password_1, $user->ID);
                    wc_add_notice(__('Пароль успішно змінено', 'shoploft'), 'success');
                    wp_safe_redirect(get_home_url());
                    exit;
                } else {
                    wc_add_notice(__('Старий пароль неправильний', 'shoploft'), 'error');
                }
            } else {
                wc_add_notice(__('Будь ласка, заповніть усі поля', 'shoploft'), 'error');
            }
        }
        else {
            wc_add_notice(__("Паролі не збігаються", 'shoploft'), 'error');
        }
    }
});
add_action('woocommerce_before_account_navigation', function () {
    ?>
    <div class="wrap-cabinet">
    <?php
});
add_action('woocommerce_after_my_account_content', function () {
    ?>
    </div>
    <?php
});
add_action('woocommerce_proceed_to_checkout', function () {
    ?>
    <a href="<?= esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn--secondary"><?= __('Продовжити покупки', 'shoploft'); ?></a>
    <?php
}, 10);
add_action('woocommerce_checkout_before_customer_details', function () {
    get_template_part('partials/woocommerce/checkout-top');
}, 10);
add_action('wp_body_open', function () {
    if (is_singular('product')) {
        global $product;
        ?>
        <input type="hidden" value="<?= $product->get_id(); ?>" name="current_product_id" readonly>
        <?php
    }
});



// Filters
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);

add_filter('the_generator', function () {
    return '';
});
add_filter('script_loader_src', 'remove_wp_version_strings');
add_filter('style_loader_src', 'remove_wp_version_strings');
add_filter('wpseo_metabox_prio', function () {
    return 'low';
});
add_filter('woocommerce_product_price_class', function () {
    return 'product-prices';
});
add_filter( 'woocommerce_product_tabs', function ($tabs) {
    unset( $tabs['description'] );

    $product__delivery_tab = get_field('product__delivery_tab', 'option');

    if ($product__delivery_tab) {
        $tabs['shipping_payment'] = array(
            'title'    => __( 'Доставка і оплата', 'shoploft' ),
            'priority' => 50,
            'callback' => 'tab_shipping_payment_content'
        );
    }

    return $tabs;
}, 98 );
add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');
add_filter('woocommerce_product_related_products_heading', function () {
    return __('Радимо подивитись', 'shoploft');
});
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}, 1, 3);
add_filter('nav_menu_link_attributes', function ($classes, $item, $args) {
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }

    return $classes;
}, 1, 3);
add_filter('body_class', function ($classes) {
    return array_diff($classes, array('page', 'search-results'));
});
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>
    <a class="instrument-item header-item--cart" href="<?= wc_get_cart_url(); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
            <path d="M12.5 24C12.5 24.3461 12.3974 24.6845 12.2051 24.9722C12.0128 25.26 11.7395 25.4843 11.4197 25.6168C11.0999 25.7492 10.7481 25.7839 10.4086 25.7164C10.0691 25.6489 9.75731 25.4822 9.51256 25.2374C9.26782 24.9927 9.10115 24.6809 9.03363 24.3414C8.9661 24.0019 9.00076 23.6501 9.13321 23.3303C9.26566 23.0105 9.48997 22.7372 9.77775 22.5449C10.0655 22.3526 10.4039 22.25 10.75 22.25C11.2141 22.25 11.6592 22.4344 11.9874 22.7626C12.3156 23.0908 12.5 23.5359 12.5 24ZM22.125 22.25C21.7789 22.25 21.4405 22.3526 21.1528 22.5449C20.865 22.7372 20.6407 23.0105 20.5082 23.3303C20.3758 23.6501 20.3411 24.0019 20.4086 24.3414C20.4762 24.6809 20.6428 24.9927 20.8876 25.2374C21.1323 25.4822 21.4441 25.6489 21.7836 25.7164C22.1231 25.7839 22.4749 25.7492 22.7947 25.6168C23.1145 25.4843 23.3878 25.26 23.5801 24.9722C23.7724 24.6845 23.875 24.3461 23.875 24C23.875 23.5359 23.6906 23.0908 23.3624 22.7626C23.0342 22.4344 22.5891 22.25 22.125 22.25ZM27.3433 8.48406L24.5389 18.5772C24.3847 19.1285 24.0549 19.6146 23.5996 19.9616C23.1442 20.3086 22.5881 20.4976 22.0156 20.5H11.205C10.6308 20.4997 10.0725 20.3117 9.61512 19.9645C9.15777 19.6174 8.82652 19.1302 8.67188 18.5772L4.835 4.75H2.875C2.64294 4.75 2.42038 4.65781 2.25628 4.49372C2.09219 4.32962 2 4.10706 2 3.875C2 3.64294 2.09219 3.42038 2.25628 3.25628C2.42038 3.09219 2.64294 3 2.875 3H5.5C5.6913 2.99996 5.87734 3.06262 6.02964 3.17838C6.18194 3.29413 6.29211 3.45661 6.34328 3.64094L7.38016 7.375H26.5C26.6349 7.37497 26.768 7.40614 26.8888 7.46605C27.0097 7.52597 27.115 7.61302 27.1967 7.7204C27.2783 7.82777 27.3341 7.95258 27.3595 8.08505C27.3849 8.21753 27.3794 8.35409 27.3433 8.48406ZM25.3483 9.125H7.86688L10.3617 18.1091C10.4129 18.2934 10.5231 18.4559 10.6754 18.5716C10.8277 18.6874 11.0137 18.75 11.205 18.75H22.0156C22.2069 18.75 22.393 18.6874 22.5453 18.5716C22.6976 18.4559 22.8077 18.2934 22.8589 18.1091L25.3483 9.125Z" fill="#4C4C4C" />
        </svg>

        <span class="purchase-count"><?= WC()->cart->get_cart_contents_count(); ?></span>
    </a>
    <?php
    $fragments['.header-item--cart'] = ob_get_clean();

    return $fragments;
});
add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>
    <p class="modal-text__product_amount">
        <?=
            str_replace('%s1', WC()->cart->get_cart_contents_count(), __('У вас у кошику <span class="goods-count">%s1</span> товар', 'shoploft'));
        ?>
    </p>
    <?php
    $fragments['.modal-text__product_amount'] = ob_get_clean();

    return $fragments;
});
add_filter('acf/load_field', function ($field) {
    if ($field['key'] === 'block-navigation_menu') {
        $menus = wp_get_nav_menus();
        $choices = [];

        foreach ($menus as $menu) {
            $choices[$menu->slug] = $menu->name;
        }

        $field['choices'] = $choices;
    }

    return $field;
});
add_filter('woocommerce_account_menu_items', function($items) {
    if (isset($items['orders'])) {
        $items['orders'] = __('Історія замовлень', 'shoploft');
    }

    return [
        'contacts' => __('Контакти і доставка', 'shoploft'),
        'orders' => $items['orders'],
        'my-password' => __('Пароль', 'shoploft'),
        'customer-logout' => $items['customer-logout'],
    ];
}, 10, 1);
add_filter('wpseo_breadcrumb_links', function ($links) {
    if (isset($links[0])) {
        $front_page_id = get_option('page_on_front');

        $links[0]['url']  = get_permalink($front_page_id);
        $links[0]['text'] = get_the_title($front_page_id);
    }

    return $links;
});
add_filter( 'loop_shop_per_page', function ($cols) {
    $per_page_array = getPerPageArray();

    if ( isset( $_GET['per_page'] ) && in_array( (int) $_GET['per_page'], $per_page_array ) ) {
        return (int) $_GET['per_page'];
    }

    return $per_page_array[0];
}, 20 );







// TODO REMOVE AFTER LAYOUT FIX
add_filter( 'woocommerce_my_account_my_orders_query', function ($args) {
    $args['posts_per_page'] = 1;
    return $args;
}, 10, 1 );