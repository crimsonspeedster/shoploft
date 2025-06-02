<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

use Automattic\WooCommerce\Enums\ProductType;

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$product_images = [];

$product_gallery_images = $product->get_gallery_image_ids();
$post_thumbnail_id = $product->get_image_id();

if ($post_thumbnail_id) {
    $product_images[] = $post_thumbnail_id;
}

if (!empty($product_gallery_images)) {
    $product_images = array_merge($product_images, $product_gallery_images);
}
?>
<div class="pics-part">
    <?php
        if (!empty($product_images)) {
            foreach ($product_images as $image_id) {
                ?>
                <div class="pics-item">
                    <div class="wrap-item-image">
                        <?= wp_get_attachment_image($image_id, 'full', false, array('class' => 'item-image')); ?>
                    </div>
                </div>
                <?php
            }
        }
        else {
            ?>
            <div class="pics-item">
                <div class="wrap-item-image">
                    <img class="item-image" src="<?= wc_placeholder_img_src(); ?>" alt="<?= $product->get_title(); ?>">
                </div>
            </div>
            <?php
        }
    ?>
</div>