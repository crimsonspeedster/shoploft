<?php
if (empty($args))
    return;

$product_item_id = $args['product_item_id'];
$product_quantity = $args['product_quantity'] ?: 1;

$product_item = wc_get_product($product_item_id);

$current_user = wp_get_current_user();
$user_name = is_user_logged_in() ? $current_user->first_name . ' ' . $current_user->last_name : '';
$user_email = is_user_logged_in() ? $current_user->user_email : '';
$user_phone = is_user_logged_in() ? get_user_meta($current_user->ID, 'billing_phone', true) : '';

if (!is_a($product_item, 'WC_Product') || $product_item->get_type() !== 'simple')
    return;
?>

<div class="modal" id="modalBuyNow" data-modal="BuyNow">
    <div class="modal-close closeModal">
        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
            <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
        </svg>
    </div>

    <p class="added"><?= __('Швидке замовлення', 'shoploft'); ?></p>

    <p><?= __('Ваши покупки:', 'shoploft'); ?></p>

    <div class="BuyNowProduct">
        <p class="productName"><?= $product_item->get_name(); ?></p>

        <p class="PdoructQuunt"><?= $product_quantity ?>x</p>

        <p class="ProductPrice"><?= $product_item->get_price_html(); ?></p>
    </div>

    <div class="buySum">
        <p class="sunToBuy">
            <?= __('Сума покупки:', 'shoploft'); ?>

            <span><?= $product_item->get_price_html(); ?></span>
        </p>
    </div>

    <form class="LoginForm formStyle" id="buy_in_one_click_form">
        <input type="hidden" name="product_id" value="<?= $product_item->get_id(); ?>" readonly>
        <input type="hidden" name="product_qty" value="<?= $product_quantity; ?>" readonly>
        <input type="hidden" name="user_id" value="<?= is_user_logged_in() ? $current_user->ID : 0; ?>">

        <div class="input-group">
            <label class="label"><?= __('Ваше ПІБ', 'shoploft'); ?></label>

            <input name="user_name" value="<?= $user_name; ?>" type="text" placeholder="<?= __('Михайлов Михайіл Миххайлович', 'shoploft'); ?>" class="information-input">
        </div>

        <div class="input-group">
            <label class="label"><?= __('Ваш e-mail', 'shoploft'); ?></label>

            <input name="user_email" value="<?= $user_email; ?>" type="email" placeholder="<?= __('Ваш e-mail', 'shoploft'); ?>" class="information-input">
        </div>

        <div class="input-group">
            <label class="label"><?= __('Ваш номер телефону', 'shoploft'); ?></label>

            <input name="user_phone" value="<?= $user_phone; ?>" type="tel" required placeholder="097 468 38 21" class="information-input">
        </div>

        <label class="wrap-checks argee-check">
            <?= __('Я погоджуюсь з умовами публічної оферти, повернення та безпеки.', 'shoploft'); ?>

            <input checked type="checkbox">

            <span class="checkmark"></span>
        </label>

        <div class="modal-buttons">
            <button type="submit" class="btn-togo"><?= __('Купити', 'shoploft'); ?></button>
        </div>
    </form>
</div>