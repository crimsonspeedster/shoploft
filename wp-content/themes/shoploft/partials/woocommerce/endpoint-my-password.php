<?php
defined( 'ABSPATH' ) || exit;

$current_user_id = get_current_user_id();
$user = get_user_by( 'id', $current_user_id);
?>
<div class="wrap-padding">
    <form method="post" class="woocommerce-EditAccountForm wrap-pass-change">
        <div class="input-group">
            <label for="password_current" class="label"><?= __('Старий пароль', 'shoploft'); ?></label>

            <div class="input-password">
                <input type="password" placeholder="<?= esc_attr(__('Старий пароль', 'shoploft')); ?>" class="woocommerce-Input woocommerce-Input--password input-text information-input" name="password_current" id="password_current" autocomplete="off">
            </div>
        </div>

        <div class="input-group">
            <label for="password_1" class="label"><?= __('Новий пароль', 'shoploft'); ?></label>

            <div class="input-password">
                <input type="password" placeholder="<?= esc_attr(__('Новий пароль', 'shoploft')); ?>" class="woocommerce-Input woocommerce-Input--password input-text information-input" name="password_1" id="password_1" autocomplete="off">
            </div>
        </div>

        <div class="input-group">
            <label for="password_2" class="label"><?= __('Повторіть пароль', 'shoploft'); ?></label>

            <div class="input-password">
                <input type="password" placeholder="<?= esc_attr(__('Повторіть пароль', 'shoploft')); ?>" class="woocommerce-Input woocommerce-Input--password input-text information-input" name="password_2" id="password_2" autocomplete="off">
            </div>
        </div>


        <?php wp_nonce_field( 'save_password', 'my-account_nonce' ); ?>

        <button type="submit" class="button-simple woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_my-password" value="<?= __('Зберегти', 'shoploft'); ?>"><?= __('Зберегти', 'shoploft'); ?></button>
    </form>
</div>
