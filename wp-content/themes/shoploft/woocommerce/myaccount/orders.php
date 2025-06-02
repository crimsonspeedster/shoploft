<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>
    <div class="story-table">
        <div class="story-table__header">
            <div class="story-table__line">
                <div class="story-table-cell status"><?= __('Статус замовлення:', 'shoploft'); ?></div>

                <div class="story-table-cell number"><?= __('Номер:', 'shoploft'); ?></div>

                <div class="story-table-cell data"><?= __('Дата:', 'shoploft'); ?></div>

                <div class="story-table-cell price"><?= __('Ціна:', 'shoploft'); ?></div>

                <div class="arrow"></div>
            </div>
        </div>

        <div class="accordeon-block">
            <?php
                foreach ( $customer_orders->orders as $customer_order ) {
                    $order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                    $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                    $order_items = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
                    ?>
                    <div class="liner">
                        <div class="table-accordion">
                            <div class="story-table__line">
                                <div class="story-table-cell status"><?= wc_get_order_status_name($order->get_status()); ?></div>

                                <div class="story-table-cell number"><?= $order->get_order_number(); ?></div>

                                <div class="story-table-cell data"><?= esc_html($order->get_date_created()->date('d.m.Y')); ?></div>

                                <div class="story-table-cell price"><?= $order->get_formatted_order_total(); ?></div>

                                <?php
                                    if (!empty($order_items)) {
                                        ?>
                                        <div class="arrow">
                                            <img src="<?= get_template_directory_uri(); ?>/dist/front/images/icons/angle-down.svg" alt="arrow">
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <?php
                            if (!empty($order_items)) {
                                ?>
                                <div class="panel">
                                    <?php
                                        foreach ( $order_items as $item_id => $item ) {
                                            $product = $item->get_product();

                                            if ( !apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
                                                return;
                                            }

                                            $is_visible        = $product && $product->is_visible();
                                            $post_thumbnail_id = $product->get_image_id();
                                            $product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
                                            $qty          = $item->get_quantity();
                                            $refunded_qty = $order->get_qty_refunded_for_item( $item_id );

                                            if ( $refunded_qty ) {
                                                $qty_display = '<del>' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';
                                            } else {
                                                $qty_display = esc_html( $qty );
                                            }
                                            ?>
                                            <div class="panel-row">
                                                <div class="wrp-name-img">
                                                    <a href="<?= esc_url($product_permalink); ?>" class="panel-image">
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
                                                    </a>

                                                    <a href="<?= esc_attr($product_permalink); ?>" class="item-name"><?= $product->get_name(); ?></a>
                                                </div>

                                                <div class="wrp-more-info">
                                                    <p class="item-count">
                                                        <?= __('Кількість:', 'shoploft'); ?>

                                                        <span><?= $qty_display; ?></span>
                                                    </p>

                                                    <div class="item-price-block"><?= $order->get_formatted_line_subtotal( $item ); ?></div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<?php wc_print_notice( esc_html__( 'No order has been made yet.', 'woocommerce' ) . ' <a class="woocommerce-Button wc-forward button' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
