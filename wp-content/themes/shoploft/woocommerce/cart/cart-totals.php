<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals cart-summary <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2 class="cart-summary__title"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

    <div class="cart-summary__section">
        <div class="cart-summary__row">
            <span><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>

            <?php wc_cart_totals_subtotal_html(); ?>
        </div>
    </div>

    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

        <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

        <div class="cart-summary__section">
            <div class="sammary-delivery">
                <div class="cart-summary__label"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>

                <ul id="shipping_method" class="woocommerce-shipping-methods cart-summary__delivery">
                    <?php wc_cart_totals_shipping_html(); ?>
                </ul>
            </div>

            <p class="cart-summary__note"><?= __('Варіанти доставки будуть оновлені під час оформлення замовлення.', 'shoploft'); ?></p>
        </div>

        <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

    <?php endif; ?>

    <div class="cart-summary__section">
        <div class="cart-summary__row cart-summary__row--total">
            <span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>

            <?php wc_cart_totals_order_total_html(); ?>
        </div>
    </div>

    <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	<div class="cart-summary__actions wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
