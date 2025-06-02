<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

$post_thumbnail_id = $product->get_image_id();
?>

<a href="<?= esc_url($product->get_permalink()); ?>" class="link-to-item">
    <div class="wrap-image">
        <?php
            if ($post_thumbnail_id) {
                echo wp_get_attachment_image($post_thumbnail_id, 'full');
            }
            else {
                ?>
                <img src="<?= wc_placeholder_img_src(); ?>" alt="<?= $product->get_title(); ?>">
                <?php
            }
        ?>
    </div>

    <div class="inner-slider-info">
        <p class="inner-slider-name"><?= $product->get_name(); ?></p>

        <div class="warap-prices"><?= $product->get_price_html(); ?></div>
    </div>
</a>