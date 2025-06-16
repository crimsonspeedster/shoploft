<?php

function setSingleProductRating()
{
    $nonce = isset($_GET['nonce']) ? trim($_GET['nonce']) : '';
    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
    $rating = isset($_GET['rating']) ? intval($_GET['rating']) : 0;

    if (!$nonce || !wp_verify_nonce($nonce, 'api_settings_nonce')) {
        wp_send_json_error([
            'msg' => 'Bad nonce'
        ]);
    }

    if (!$product_id || !$rating) {
        wp_send_json_error([
            'msg' => 'Bad params'
        ]);
    }

    $product = wc_get_product($product_id);

    if (!$product || !$product->get_id()) {
        wp_send_json_error([
            'msg' => 'Product not found'
        ]);
    }

    $product__votes = get_field('product__votes', $product_id) ? intval(get_field('product__votes', $product_id)) : 0;
    $product__rating = get_field('product__rating', $product_id) ? intval(get_field('product__rating', $product_id)) : 0;


    $total_rating = $product__rating * $product__votes;
    $product__votes += 1;
    $new_average = ($total_rating + $rating) / $product__votes;
    $product__rating = ceil($new_average);
    $product__rating = min(5, $product__rating);

    update_field('product__rating', $product__rating, $product_id);
    update_field('product__votes', $product__votes, $product_id);

    wp_send_json_success([
        'new_rating' => $product__rating,
        'votes' => $product__votes,
    ]);
}

add_action('wp_ajax_set_single_product_rating', 'setSingleProductRating');
add_action('wp_ajax_nopriv_set_single_product_rating', 'setSingleProductRating');

function getBuyInOneClickPopup()
{
    $nonce = isset($_GET['nonce']) ? trim($_GET['nonce']) : '';
    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
    $product_qty = isset($_GET['product_qty']) ? intval($_GET['product_qty']) : 1;

    if (!$nonce || !wp_verify_nonce($nonce, 'api_settings_nonce')) {
        wp_send_json_error([
            'msg' => 'Bad nonce'
        ]);
    }

    if (!$product_id || !$product_qty) {
        wp_send_json_error([
            'msg' => 'Bad params'
        ]);
    }

    $popup_html = '';
    ob_start();
    get_template_part('partials/global/popup-buy-now', '', [
        'product_item_id' => $product_id,
        'product_quantity' => $product_qty,
    ]);
    $popup_html = ob_get_clean();

    wp_send_json_success([
        'popup_html' => $popup_html,
    ]);
}

add_action('wp_ajax_get_buy_in_one_click', 'getBuyInOneClickPopup');
add_action('wp_ajax_nopriv_get_buy_in_one_click', 'getBuyInOneClickPopup');

function buyInOneClick()
{
    $nonce = isset($_POST['nonce']) ? trim($_POST['nonce']) : '';

    if (!$nonce || !wp_verify_nonce($nonce, 'api_settings_nonce')) {
        wp_send_json_error([
            'msg' => 'Bad nonce'
        ]);
    }

    $product_id   = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $product_qty  = isset($_POST['product_qty']) ? intval($_POST['product_qty']) : 1;
    $user_name    = isset($_POST['user_name']) ? sanitize_text_field($_POST['user_name']) : '';
    $user_email   = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
    $user_phone   = isset($_POST['user_phone']) ? sanitize_text_field($_POST['user_phone']) : '';
    $user_id      = isset($_POST['user_id']) ? intval(sanitize_text_field($_POST['user_id'])) : 0;

    if (!$product_id || !$user_name || !$user_phone)
        wp_send_json_error([
            'msg' => 'Bad params'
        ]);

    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error(['msg' => 'Товар не знайдено.']);
    }

    $order = wc_create_order();
    $order->add_product($product, $product_qty);

    $billing_data = [
        'first_name' => $user_name,
        'last_name'  => '',
        'email'      => $user_email,
        'phone'      => $user_phone,
        'address_1'  => '',
        'city'       => '',
        'state'      => '',
        'postcode'   => '',
        'country'    => 'UA',
    ];

    foreach ($billing_data as $key => $value) {
        $method = 'set_billing_' . $key;

        if (method_exists($order, $method)) {
            $order->{$method}($value);
        }
    }

    if ($user_id) {
        $order->set_customer_id($user_id);
    }

    $order->set_billing_first_name($user_name);
    $order->set_billing_email($user_email);
    $order->set_billing_phone($user_phone);
    $order->set_customer_note(__('Замовлення через Купити в 1 клік', 'shoploft'));
    $order->calculate_totals();
    $order->update_status('processing', __('Купити в 1 клік', 'shoploft'));

    do_action('woocommerce_new_order', $order->get_id(), $order);

    wp_send_json_success([
        'order_id' => $order->get_id(),
    ]);
}

add_action('wp_ajax_buy_in_one_click', 'buyInOneClick');
add_action('wp_ajax_nopriv_buy_in_one_click', 'buyInOneClick');