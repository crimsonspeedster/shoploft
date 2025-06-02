<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<?php
    /**
     * My Account content.
     *
     * @since 2.6.0
     */

    foreach ( wc_get_account_menu_items() as $endpoint => $label ) {
        if ($endpoint !== 'customer-logout') {
            ?>
            <div id="<?= esc_attr($endpoint); ?>" class="tabcontent" style="display: <?= wc_is_current_account_menu_item( $endpoint ) ? 'block' : 'none'; ?>;">
                <?php do_action( 'woocommerce_account_' . $endpoint . '_endpoint' ); ?>
            </div>
            <?php
        }
    }

    do_action( 'woocommerce_after_my_account_content' );
?>
