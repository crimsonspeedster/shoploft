<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="tab" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
        <?php
            if ($endpoint === 'customer-logout') {
                ?>
                <a class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
                    <div class="wrap-svg">
                        <span class="tab-name"><?php echo esc_html( $label ); ?></span>
                    </div>
                </a>
                <?php
            }
            else {
                ?>
                <button class="tablinks <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>" data-item="<?= esc_attr($endpoint); ?>">
                    <div class="wrap-svg">
                        <span class="tab-name"><?php echo esc_html( $label ); ?></span>
                    </div>

                    <div class="arrow-place">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="u:angle-down">
                                <path id="Vector" d="M17.0036 9.64992C16.8162 9.46367 16.5628 9.35913 16.2986 9.35913C16.0344 9.35913 15.781 9.46367 15.5936 9.64992L12.0036 13.1899L8.46361 9.64992C8.27625 9.46367 8.0228 9.35913 7.75861 9.35913C7.49442 9.35913 7.24097 9.46367 7.05361 9.64992C6.95988 9.74289 6.88549 9.85349 6.83472 9.97535C6.78395 10.0972 6.75781 10.2279 6.75781 10.3599C6.75781 10.4919 6.78395 10.6226 6.83472 10.7445C6.88549 10.8664 6.95988 10.977 7.05361 11.0699L11.2936 15.3099C11.3866 15.4037 11.4972 15.478 11.619 15.5288C11.7409 15.5796 11.8716 15.6057 12.0036 15.6057C12.1356 15.6057 12.2663 15.5796 12.3882 15.5288C12.51 15.478 12.6206 15.4037 12.7136 15.3099L17.0036 11.0699C17.0973 10.977 17.1717 10.8664 17.2225 10.7445C17.2733 10.6226 17.2994 10.4919 17.2994 10.3599C17.2994 10.2279 17.2733 10.0972 17.2225 9.97535C17.1717 9.85349 17.0973 9.74289 17.0036 9.64992Z" fill="#545353"/>
                            </g>
                        </svg>
                    </div>
                </button>
                <?php
            }
        ?>
    <?php endforeach; ?>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
