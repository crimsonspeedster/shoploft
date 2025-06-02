<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

$product__votes = get_field('product__votes') ?: 0;
$product__rating = get_field('product__rating') ?: 0;

$is_user_selected = isset($_COOKIE['rating_product_' . $product->get_id()])
    ? $_COOKIE['rating_product_' . $product->get_id()]
    : null;
?>

<div class="heade-info">
    <div class="articul">
        <?= __('Артикул:', 'shoploft') ?><span><?= $product->get_sku() ?: $product->get_id(); ?></span>
    </div>

    <div class="raiting">
        <div class="rating <?= $is_user_selected ? 'rating--active' : ''; ?>">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <label>
                    <input class="rating__input" type="radio" <?php checked($product__rating, $i, true); ?> name="rating1" value="<?= $i; ?>">

                    <svg class="rating__star <?= $i <= $product__rating ? 'rating__star-check' : ''; ?>">
                        <use xlink:href="#star"></use>
                    </svg>
                </label>
            <?php endfor; ?>
        </div>

        <span class="voices"><?= $product__votes; ?></span>

        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <defs>
                <symbol id="star" viewBox="0 0 26 28">
                    <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"></path>
                </symbol>
            </defs>
        </svg>
    </div>

    <?php
        if ($product->managing_stock()) {
            ?>
            <div class="it-is">
                <?= __('В наявності:', 'shoploft'); ?> <span><?= $product->get_stock_quantity(); ?></span>
            </div>
            <?php
        }
    ?>
</div>