<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<div class="button-container">
            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

            <?php
            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input(
                array(
                    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                    'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                )
            );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
            ?>

            <a data-quantity="<?= apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ); ?>" href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button button-link red" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" aria-label="Add “<?php the_title_attribute(); ?>” to your cart">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M11.375 23.625C11.375 23.9711 11.2724 24.3095 11.0801 24.5972C10.8878 24.885 10.6145 25.1093 10.2947 25.2418C9.97493 25.3742 9.62306 25.4089 9.28359 25.3414C8.94413 25.2738 8.63231 25.1072 8.38756 24.8624C8.14282 24.6177 7.97615 24.3059 7.90863 23.9664C7.8411 23.6269 7.87576 23.2751 8.00821 22.9553C8.14066 22.6355 8.36497 22.3622 8.65275 22.1699C8.94054 21.9776 9.27888 21.875 9.625 21.875C10.0891 21.875 10.5342 22.0594 10.8624 22.3876C11.1906 22.7158 11.375 23.1609 11.375 23.625ZM21 21.875C20.6539 21.875 20.3155 21.9776 20.0278 22.1699C19.74 22.3622 19.5157 22.6355 19.3832 22.9553C19.2508 23.2751 19.2161 23.6269 19.2836 23.9664C19.3512 24.3059 19.5178 24.6177 19.7626 24.8624C20.0073 25.1072 20.3191 25.2738 20.6586 25.3414C20.9981 25.4089 21.3499 25.3742 21.6697 25.2418C21.9895 25.1093 22.2628 24.885 22.4551 24.5972C22.6474 24.3095 22.75 23.9711 22.75 23.625C22.75 23.1609 22.5656 22.7158 22.2374 22.3876C21.9093 22.0594 21.4641 21.875 21 21.875ZM26.2183 8.10906L23.4139 18.2022C23.2597 18.7535 22.9299 19.2396 22.4746 19.5866C22.0192 19.9336 21.4631 20.1226 20.8906 20.125H10.08C9.50582 20.1247 8.94747 19.9367 8.49012 19.5895C8.03277 19.2424 7.70152 18.7552 7.54688 18.2022L3.71 4.375H1.75C1.51794 4.375 1.29538 4.28281 1.13128 4.11872C0.967187 3.95462 0.875 3.73206 0.875 3.5C0.875 3.26794 0.967187 3.04538 1.13128 2.88128C1.29538 2.71719 1.51794 2.625 1.75 2.625H4.375C4.5663 2.62496 4.75234 2.68762 4.90464 2.80338C5.05694 2.91913 5.16711 3.08161 5.21828 3.26594L6.25516 7H25.375C25.5099 6.99997 25.643 7.03114 25.7638 7.09105C25.8847 7.15097 25.99 7.23802 26.0717 7.3454C26.1533 7.45277 26.2091 7.57758 26.2345 7.71005C26.2599 7.84253 26.2544 7.97908 26.2183 8.10906ZM24.2233 8.75H6.74188L9.23672 17.7341C9.28789 17.9184 9.39806 18.0809 9.55036 18.1966C9.70266 18.3124 9.8887 18.375 10.08 18.375H20.8906C21.0819 18.375 21.268 18.3124 21.4203 18.1966C21.5726 18.0809 21.6827 17.9184 21.7339 17.7341L24.2233 8.75Z" fill="#E31727"/>
                </svg>

                <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
            </a>

            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        </div>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
