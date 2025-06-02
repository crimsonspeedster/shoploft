<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id_suffix = wp_unique_id();

?>
<form class="woocommerce-ordering" method="get">
	<?php if ( $use_label ) : ?>
		<label for="woocommerce-orderby-<?php echo esc_attr( $id_suffix ); ?>"><?php echo esc_html__( 'Sort by', 'woocommerce' ); ?></label>
	<?php endif; ?>
	<select
		name="orderby"
		class="orderby"
		<?php if ( $use_label ) : ?>
			id="woocommerce-orderby-<?php echo esc_attr( $id_suffix ); ?>"
		<?php else : ?>
			aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>"
		<?php endif; ?>
	>
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>

<div class="sort-block">
    <div class="sort-dropdown">
        <button class="sort-toggle" id="sortToggle">
            <span class="sort-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="21" viewBox="0 0 26 21" fill="none">
                  <path d="M13 13.5938L19 20.0001L25 13.5938M13 7.35454L7 1.11523M7 1.11523L1 7.34986M7 1.11523V19.8332M19 1.11523V19.8332" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>

            <span id="selectedOption"><?= $catalog_orderby_options[$orderby] ?? ''; ?></span>
        </button>

        <ul class="sort-options" id="sortOptions">
            <?php
                foreach ($catalog_orderby_options as $key => $value) {
                    ?>
                    <li data-value="<?= $key; ?>"><?= $value; ?></li>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>