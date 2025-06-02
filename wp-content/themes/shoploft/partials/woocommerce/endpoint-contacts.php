<?php
defined( 'ABSPATH' ) || exit;

$current_user_id = get_current_user_id();
$user = get_user_by( 'id', $current_user_id);

$phone       = get_user_meta($current_user_id, 'billing_phone', true);
$city        = get_user_meta( $current_user_id, 'shipping_city', true );
$address_1   = get_user_meta( $current_user_id, 'shipping_address_1', true );
$postcode    = get_user_meta( $current_user_id, 'shipping_postcode', true );

$countries_obj = new WC_Countries();
$countries = $countries_obj->get_allowed_countries();
?>

<form method="post" class="woocommerce-EditAccountForm wrap-padding">
    <div class="two-parts">
        <div class="information-part">
            <div class="information-part-name"><?= __('Контактна інформація', 'shoploft'); ?></div>

            <div class="input-group">
                <label for="account_first_name" class="label"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                <input type="text" class="information-input woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" required aria-required="true" />
            </div>

            <div class="input-group">
                <label for="account_last_name" class="label"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text information-input" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" required aria-required="true" />
            </div>

            <div class="input-group">
                <label for="billing_phone" class="label"><?php esc_html_e( 'Номер телефону', 'shoploft' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                <input type="tel" class="woocommerce-Input woocommerce-Input--text input-text information-input" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $phone ); ?>" required aria-required="true" />
            </div>

            <div class="input-group">
                <label for="account_email" class="label"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
                <input type="email" class="information-input woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" required aria-required="true" />
            </div>
        </div>

        <div class="information-part">
            <div class="information-part-name"><?= __('Доставка', 'shoploft'); ?></div>

            <div class="input-group">
                <label for="shipping_city" class="label"><?= __('Місто', 'shoploft'); ?></label>
                <input type="text" class="information-input woocommerce-Input input-text" name="shipping_city" id="shipping_city" value="<?= $city; ?>" placeholder="<?= __('Оберіть місто', 'shoploft'); ?>">
            </div>

            <div class="input-group">
                <label for="shipping_address_1" class="label"><?= __('Адреса', 'shoploft'); ?></label>
                <input type="text" class="information-input woocommerce-Input input-text" name="shipping_address_1" id="shipping_address_1" value="<?php echo esc_attr($address_1); ?>" placeholder="<?= esc_attr(__('Вул Івана Мазепи 43, кв 54', 'shoploft')); ?>">
            </div>

            <div class="input-group">
                <label for="shipping_postcode" class="label"><?= __('Поштовий індекс', 'shoploft'); ?></label>
                <input type="text" class="information-input woocommerce-Input input-text" name="shipping_postcode" id="shipping_postcode" value="<?= $postcode; ?>" placeholder="<?= esc_attr(__('Поштовий індекс', 'shoploft')); ?>">
            </div>
        </div>
    </div>

    <?php wp_nonce_field( 'save_contacts', 'contacts_nonce' ); ?>

    <button type="submit" class="button-simple woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_contacts" value="<?= __('Зберегти', 'shoploft'); ?>"><?= __('Зберегти', 'shoploft'); ?></button>
</form>
