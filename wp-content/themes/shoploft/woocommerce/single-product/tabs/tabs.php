<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

    <div class="accordeon-section">
        <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
            <button class="accordion">
                <span class="panel-name"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></span>

                <svg class="arr-accordeon" xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11" fill="none">
                    <path d="M0.290792 0.295706C0.104541 0.483068 -4.28589e-07 0.73652 -4.17042e-07 1.00071C-4.05494e-07 1.26489 0.104541 1.51834 0.290792 1.70571L3.83079 5.29571L0.290792 8.83571C0.104541 9.02307 -5.52942e-08 9.27652 -4.37463e-08 9.54071C-3.21984e-08 9.80489 0.104542 10.0583 0.290792 10.2457C0.383755 10.3394 0.494356 10.4138 0.616216 10.4646C0.738075 10.5154 0.868781 10.5415 1.00079 10.5415C1.1328 10.5415 1.26351 10.5154 1.38537 10.4646C1.50723 10.4138 1.61783 10.3394 1.71079 10.2457L5.95079 6.00571C6.04452 5.91274 6.11891 5.80214 6.16968 5.68028C6.22045 5.55842 6.24659 5.42772 6.24659 5.29571C6.24659 5.16369 6.22045 5.03299 6.16968 4.91113C6.11891 4.78927 6.04452 4.67867 5.95079 4.58571L1.71079 0.295706C1.61783 0.201977 1.50723 0.127583 1.38537 0.0768146C1.26351 0.0260459 1.1328 -9.35096e-05 1.00079 -9.35038e-05C0.86878 -9.34981e-05 0.738074 0.0260459 0.616215 0.0768146C0.494356 0.127583 0.383755 0.201977 0.290792 0.295706Z" fill="black"></path>
                </svg>
            </button>

            <div class="panel">
                <?php
                    if ( isset( $product_tab['callback'] ) ) {
                        call_user_func( $product_tab['callback'], $key, $product_tab );
                    }
                ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
