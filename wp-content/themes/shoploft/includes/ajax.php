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