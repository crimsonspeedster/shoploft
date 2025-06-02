<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="sale-block seemore-slide-decor">
		<?php
        $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

        if ( $heading ) :
            ?>
            <div class="name-block-line">
                <h2 class="block-name"><?php echo esc_html( $heading ); ?></h2>

                <a href="<?= esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="see-all"><?= __('Дивитись всі', 'shoploft'); ?></a>
            </div>
        <?php endif; ?>

        <div class="hover-zone left-zone-s"></div>
        <div class="hover-zone right-zone-s"></div>

        <div class="sal-slider">
            <?php foreach ( $related_products as $related_product ) : ?>
                <div class="sal-item">
                    <?php
                        $post_object = get_post( $related_product->get_id() );

                        setup_postdata( $GLOBALS['post'] = $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

                        wc_get_template_part( 'content', 'product' );
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
	</section>
	<?php
endif;

wp_reset_postdata();
