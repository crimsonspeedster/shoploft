<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}

$post_thumbnail_id = $product->get_image_id();
$hover_image_id = null;
?>
<div <?php wc_product_class( 'card', $product ); ?>>
    <a href="<?= $product->get_permalink(); ?>" class="card-image-wrap">
        <?php
            if ($post_thumbnail_id) {
                echo wp_get_attachment_image($post_thumbnail_id, 'full', false, array('class' => 'image-change image-first'));
            }
            else {
                ?>
                <img class="image-change image-first" src="<?= wc_placeholder_img_src(); ?>" alt="<?= $product->get_title(); ?>">
                <?php
            }

            if ($hover_image_id) {
                echo wp_get_attachment_image($hover_image_id, 'full', false, array('class' => 'image-change image-second'));
            }
            else {
                if ($post_thumbnail_id) {
                    echo wp_get_attachment_image($post_thumbnail_id, 'full', false, array('class' => 'image-change image-second'));
                }
                else {
                    ?>
                    <img class="image-change image-second" src="<?= wc_placeholder_img_src(); ?>" alt="<?= $product->get_title(); ?>">
                    <?php
                }
            }
        ?>
    </a>

    <div class="card-info">
        <div class="card-top">
            <?php
                if ($product->managing_stock()) {
                    ?>
                    <p class="card-top__info">
                        <?= __('В наявності:', 'shoploft'); ?>

                        <span class="card-top__info-count"><?= $product->get_stock_quantity(); ?></span>
                    </p>
                    <?php
                }
            ?>


            <p class="card-top__info">
                <?= __('Артикул:', 'shoploft') ?>

                <span class="card-top__info-count"><?= $product->get_sku() ?: $product->get_id(); ?></span>
            </p>
        </div>

        <a href="<?= $product->get_permalink(); ?>" class="card-name"><?= $product->get_name(); ?></a>

        <div class="card-bottom">
            <div class="price-place">
                <?php echo $product->get_price_html(); ?>
            </div>

            <?php
                if ($product->get_type() === 'simple') {
                    ?>
                    <a data-quantity="<?= apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ); ?>" href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button tekeit-button" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" aria-label="Add “<?php the_title_attribute(); ?>” to your cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="23" viewBox="0 0 26 23" fill="none">
                            <path d="M11.1248 21C11.1248 21.3461 11.0222 21.6845 10.8299 21.9722C10.6376 22.26 10.3643 22.4843 10.0445 22.6168C9.72474 22.7492 9.37288 22.7839 9.03341 22.7164C8.69394 22.6488 8.38212 22.4822 8.13738 22.2374C7.89264 21.9927 7.72597 21.6809 7.65844 21.3414C7.59092 21.0019 7.62557 20.6501 7.75803 20.3303C7.89048 20.0105 8.11478 19.7372 8.40257 19.5449C8.69036 19.3526 9.0287 19.25 9.37482 19.25C9.83895 19.25 10.2841 19.4344 10.6123 19.7626C10.9404 20.0908 11.1248 20.5359 11.1248 21ZM20.7498 19.25C20.4037 19.25 20.0654 19.3526 19.7776 19.5449C19.4898 19.7372 19.2655 20.0105 19.133 20.3303C19.0006 20.6501 18.9659 21.0019 19.0334 21.3414C19.101 21.6809 19.2676 21.9927 19.5124 22.2374C19.7571 22.4822 20.0689 22.6488 20.4084 22.7164C20.7479 22.7839 21.0997 22.7492 21.4195 22.6168C21.7393 22.4843 22.0126 22.26 22.2049 21.9722C22.3972 21.6845 22.4998 21.3461 22.4998 21C22.4998 20.5359 22.3154 20.0908 21.9873 19.7626C21.6591 19.4344 21.2139 19.25 20.7498 19.25ZM25.9681 5.48406L23.1637 15.5772C23.0095 16.1285 22.6798 16.6146 22.2244 16.9616C21.769 17.3086 21.2129 17.4976 20.6404 17.5H9.82982C9.25563 17.4997 8.69729 17.3117 8.23994 16.9645C7.78259 16.6174 7.45134 16.1302 7.29669 15.5772L3.45982 1.75H1.49982C1.26775 1.75 1.04519 1.65781 0.881098 1.49372C0.717004 1.32962 0.624817 1.10706 0.624817 0.875C0.624817 0.642936 0.717004 0.420376 0.881098 0.256282C1.04519 0.0921872 1.26775 1.61617e-08 1.49982 1.61617e-08H4.12482C4.31612 -3.67389e-05 4.50216 0.0626189 4.65446 0.178375C4.80676 0.294132 4.91693 0.45661 4.9681 0.640938L6.00497 4.375H25.1248C25.2597 4.37497 25.3928 4.40614 25.5136 4.46605C25.6345 4.52597 25.7399 4.61302 25.8215 4.7204C25.9032 4.82777 25.9589 4.95258 25.9843 5.08505C26.0097 5.21753 26.0042 5.35408 25.9681 5.48406ZM23.9731 6.125H6.49169L8.98654 15.1091C9.03771 15.2934 9.14788 15.4559 9.30018 15.5716C9.45248 15.6874 9.63852 15.75 9.82982 15.75H20.6404C20.8317 15.75 21.0178 15.6874 21.1701 15.5716C21.3224 15.4559 21.4326 15.2934 21.4837 15.1091L23.9731 6.125Z" fill="#2C2C2C"></path>
                        </svg>
                    </a>
                    <?php
                }
                else {
                    ?>
                    <a href="<?= $product->get_permalink(); ?>" class="tekeit-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="23" viewBox="0 0 26 23" fill="none">
                            <path d="M11.1248 21C11.1248 21.3461 11.0222 21.6845 10.8299 21.9722C10.6376 22.26 10.3643 22.4843 10.0445 22.6168C9.72474 22.7492 9.37288 22.7839 9.03341 22.7164C8.69394 22.6488 8.38212 22.4822 8.13738 22.2374C7.89264 21.9927 7.72597 21.6809 7.65844 21.3414C7.59092 21.0019 7.62557 20.6501 7.75803 20.3303C7.89048 20.0105 8.11478 19.7372 8.40257 19.5449C8.69036 19.3526 9.0287 19.25 9.37482 19.25C9.83895 19.25 10.2841 19.4344 10.6123 19.7626C10.9404 20.0908 11.1248 20.5359 11.1248 21ZM20.7498 19.25C20.4037 19.25 20.0654 19.3526 19.7776 19.5449C19.4898 19.7372 19.2655 20.0105 19.133 20.3303C19.0006 20.6501 18.9659 21.0019 19.0334 21.3414C19.101 21.6809 19.2676 21.9927 19.5124 22.2374C19.7571 22.4822 20.0689 22.6488 20.4084 22.7164C20.7479 22.7839 21.0997 22.7492 21.4195 22.6168C21.7393 22.4843 22.0126 22.26 22.2049 21.9722C22.3972 21.6845 22.4998 21.3461 22.4998 21C22.4998 20.5359 22.3154 20.0908 21.9873 19.7626C21.6591 19.4344 21.2139 19.25 20.7498 19.25ZM25.9681 5.48406L23.1637 15.5772C23.0095 16.1285 22.6798 16.6146 22.2244 16.9616C21.769 17.3086 21.2129 17.4976 20.6404 17.5H9.82982C9.25563 17.4997 8.69729 17.3117 8.23994 16.9645C7.78259 16.6174 7.45134 16.1302 7.29669 15.5772L3.45982 1.75H1.49982C1.26775 1.75 1.04519 1.65781 0.881098 1.49372C0.717004 1.32962 0.624817 1.10706 0.624817 0.875C0.624817 0.642936 0.717004 0.420376 0.881098 0.256282C1.04519 0.0921872 1.26775 1.61617e-08 1.49982 1.61617e-08H4.12482C4.31612 -3.67389e-05 4.50216 0.0626189 4.65446 0.178375C4.80676 0.294132 4.91693 0.45661 4.9681 0.640938L6.00497 4.375H25.1248C25.2597 4.37497 25.3928 4.40614 25.5136 4.46605C25.6345 4.52597 25.7399 4.61302 25.8215 4.7204C25.9032 4.82777 25.9589 4.95258 25.9843 5.08505C26.0097 5.21753 26.0042 5.35408 25.9681 5.48406ZM23.9731 6.125H6.49169L8.98654 15.1091C9.03771 15.2934 9.14788 15.4559 9.30018 15.5716C9.45248 15.6874 9.63852 15.75 9.82982 15.75H20.6404C20.8317 15.75 21.0178 15.6874 21.1701 15.5716C21.3224 15.4559 21.4326 15.2934 21.4837 15.1091L23.9731 6.125Z" fill="#2C2C2C"></path>
                        </svg>
                    </a>
                    <?php
                }
            ?>
        </div>

    </div>
</div>
