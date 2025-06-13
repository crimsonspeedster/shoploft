<?php
$common__logo = get_field('common__logo', 'option');
?>

<div class="overlays modalOverlay">
    <?php
        if (!is_user_logged_in() && get_option('users_can_register')) {
            ?>
            <div class="modal" id="modalPersonalCabinet" data-modal="login">
                <div class="modal-close closeModal">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                        <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
                    </svg>
                </div>

                <p class="added">Вхід у особистий кабінет</p>

                <p>Якщо у вас є обліковий запис, увійдіть до системи, вказавши свою адресу електронної пошти.</p>
                <form class="LoginForm formStyle" action="">
                    <div class="input-group">
                        <label class="label">Логін або e-mail</label>
                        <input type="text" placeholder="Логін або e-mail" class="information-input">
                    </div>

                    <div class="input-group">
                        <label class="label">Ваш пароль</label>
                        <input type="password" placeholder="" class="information-input">
                    </div>
                    <label class="wrap-checks argee-check">Я погоджуюсь з умовами публічної оферти, повернення та безпеки.
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="modal-buttons">
                        <button class="btn-togo" >Увійти</button>
                    </div>
                </form>

                <?php echo do_shortcode('[woocommerce_my_account]'); ?>

                <div class="links-line">
                    <a href="#" class="link-type" data-trigger-modal="pwforgot">Забули пароль?</a>
                    <a href="#" class="link-type reGistrationTrigger" data-trigger-modal="register">Пройти реєстрацію</a>
                </div>

            </div>

            <div class="modal" id="modalRegistration" data-modal="register">
                <div class="modal-close closeModal">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                        <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
                    </svg>
                </div>
                <p class="added">Реєстрація</p>
                <p>Створіть обліковий запис, щоб швидше перевіряти та відстежувати замовлення.</p>
                <form class="LoginForm formStyle" action="">
                    <div class="input-group">
                        <label class="label">Логін або e-mail</label>
                        <input type="text" placeholder="Логін або e-mail" class="information-input">
                    </div>

                    <div class="input-group">
                        <label class="label">Ваш пароль</label>
                        <input type="password" placeholder="" class="information-input">
                    </div>
                    <div class="input-group">
                        <label class="label">Новий пароль</label>
                        <div class="input-password">
                            <input type="password" placeholder="Новий пароль" class="information-input">
                            <button type="button" class="toggle-password">
                                <svg  class="eye-icon hide" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.1369 10.3007C20.109 10.2367 19.4265 8.7232 17.9024 7.19906C16.4882 5.78648 14.0584 4.10156 10.4999 4.10156C6.94136 4.10156 4.5116 5.78648 3.09738 7.19906C1.57324 8.7232 0.89074 10.2342 0.862849 10.3007C0.834804 10.3637 0.820312 10.4319 0.820312 10.5008C0.820312 10.5698 0.834804 10.638 0.862849 10.701C0.89074 10.7641 1.57324 12.2776 3.09738 13.8018C4.5116 15.2143 6.94136 16.8984 10.4999 16.8984C14.0584 16.8984 16.4882 15.2143 17.9024 13.8018C19.4265 12.2776 20.109 10.7666 20.1369 10.701C20.165 10.638 20.1794 10.5698 20.1794 10.5008C20.1794 10.4319 20.165 10.3637 20.1369 10.3007ZM10.4999 15.9141C7.92574 15.9141 5.67808 14.9773 3.81843 13.1307C3.0389 12.356 2.37923 11.4693 1.86117 10.5C2.37909 9.53085 3.03878 8.64444 3.81843 7.87008C5.67808 6.02273 7.92574 5.08594 10.4999 5.08594C13.074 5.08594 15.3217 6.02273 17.1813 7.87008C17.961 8.64444 18.6207 9.53085 19.1386 10.5C18.6161 11.5016 15.996 15.9141 10.4999 15.9141ZM10.4999 6.72656C9.75356 6.72656 9.02401 6.94787 8.40347 7.3625C7.78293 7.77713 7.29928 8.36646 7.01368 9.05597C6.72808 9.74547 6.65335 10.5042 6.79895 11.2362C6.94455 11.9681 7.30393 12.6405 7.83166 13.1682C8.35938 13.6959 9.03174 14.0553 9.76372 14.2009C10.4957 14.3465 11.2544 14.2718 11.9439 13.9862C12.6334 13.7006 13.2227 13.2169 13.6374 12.5964C14.052 11.9759 14.2733 11.2463 14.2733 10.5C14.272 9.49962 13.874 8.54059 13.1667 7.83322C12.4593 7.12584 11.5003 6.72786 10.4999 6.72656ZM10.4999 13.2891C9.94826 13.2891 9.40902 13.1255 8.95036 12.819C8.4917 12.5126 8.13422 12.077 7.92312 11.5673C7.71203 11.0577 7.65679 10.4969 7.76441 9.95588C7.87203 9.41486 8.13766 8.91789 8.52772 8.52783C8.91777 8.13778 9.41474 7.87214 9.95576 7.76453C10.4968 7.65691 11.0576 7.71214 11.5672 7.92324C12.0768 8.13434 12.5124 8.49182 12.8189 8.95048C13.1254 9.40914 13.2889 9.94838 13.2889 10.5C13.2889 11.2397 12.9951 11.9491 12.472 12.4722C11.949 12.9952 11.2396 13.2891 10.4999 13.2891Z" fill="black"/>
                                </svg>
                                <svg  class="eye-icon show" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.54062 2.71L3.25063 2L20.0006 18.75L19.2906 19.46L15.9506 16.11C14.5806 16.68 13.0806 17 11.5006 17C6.94062 17 3.00063 14.35 1.14062 10.5C2.11063 8.5 3.63063 6.83 5.50063 5.68L2.54062 2.71ZM11.5006 16C12.7906 16 14.0306 15.77 15.1706 15.34L14.0506 14.21C13.3206 14.71 12.4506 15 11.5006 15C9.00062 15 7.00063 13 7.00063 10.5C7.00063 9.55 7.29063 8.68 7.79063 7.95L6.24062 6.41C4.56627 7.38547 3.1901 8.79968 2.26063 10.5C4.04062 13.78 7.50062 16 11.5006 16ZM20.7406 10.5C18.9606 7.22 15.5006 5 11.5006 5C10.3506 5 9.23062 5.19 8.19062 5.53L7.41062 4.75C8.68062 4.26 10.0606 4 11.5006 4C16.0606 4 20.0006 6.65 21.8606 10.5C20.9519 12.3858 19.5444 13.987 17.7906 15.13L17.0706 14.4C18.6006 13.44 19.8706 12.1 20.7406 10.5ZM11.5006 6C14.0006 6 16.0006 8 16.0006 10.5C16.0006 11.32 15.7806 12.08 15.4006 12.74L14.6606 12C14.8806 11.54 15.0006 11.04 15.0006 10.5C15.0006 9.57174 14.6319 8.6815 13.9755 8.02513C13.3191 7.36875 12.4289 7 11.5006 7C10.9606 7 10.4606 7.12 10.0006 7.34L9.26062 6.6C9.92062 6.22 10.6806 6 11.5006 6ZM8.00063 10.5C8.00063 11.4283 8.36937 12.3185 9.02575 12.9749C9.68213 13.6313 10.5724 14 11.5006 14C12.1706 14 12.7906 13.81 13.3206 13.5L8.50063 8.68C8.19063 9.21 8.00063 9.83 8.00063 10.5Z" fill="black"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">повторіть пароль</label>
                        <div class="input-password">
                            <input type="password" placeholder="Новий пароль" class="information-input">
                            <button type="button" class="toggle-password">
                                <svg  class="eye-icon hide" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.1369 10.3007C20.109 10.2367 19.4265 8.7232 17.9024 7.19906C16.4882 5.78648 14.0584 4.10156 10.4999 4.10156C6.94136 4.10156 4.5116 5.78648 3.09738 7.19906C1.57324 8.7232 0.89074 10.2342 0.862849 10.3007C0.834804 10.3637 0.820312 10.4319 0.820312 10.5008C0.820312 10.5698 0.834804 10.638 0.862849 10.701C0.89074 10.7641 1.57324 12.2776 3.09738 13.8018C4.5116 15.2143 6.94136 16.8984 10.4999 16.8984C14.0584 16.8984 16.4882 15.2143 17.9024 13.8018C19.4265 12.2776 20.109 10.7666 20.1369 10.701C20.165 10.638 20.1794 10.5698 20.1794 10.5008C20.1794 10.4319 20.165 10.3637 20.1369 10.3007ZM10.4999 15.9141C7.92574 15.9141 5.67808 14.9773 3.81843 13.1307C3.0389 12.356 2.37923 11.4693 1.86117 10.5C2.37909 9.53085 3.03878 8.64444 3.81843 7.87008C5.67808 6.02273 7.92574 5.08594 10.4999 5.08594C13.074 5.08594 15.3217 6.02273 17.1813 7.87008C17.961 8.64444 18.6207 9.53085 19.1386 10.5C18.6161 11.5016 15.996 15.9141 10.4999 15.9141ZM10.4999 6.72656C9.75356 6.72656 9.02401 6.94787 8.40347 7.3625C7.78293 7.77713 7.29928 8.36646 7.01368 9.05597C6.72808 9.74547 6.65335 10.5042 6.79895 11.2362C6.94455 11.9681 7.30393 12.6405 7.83166 13.1682C8.35938 13.6959 9.03174 14.0553 9.76372 14.2009C10.4957 14.3465 11.2544 14.2718 11.9439 13.9862C12.6334 13.7006 13.2227 13.2169 13.6374 12.5964C14.052 11.9759 14.2733 11.2463 14.2733 10.5C14.272 9.49962 13.874 8.54059 13.1667 7.83322C12.4593 7.12584 11.5003 6.72786 10.4999 6.72656ZM10.4999 13.2891C9.94826 13.2891 9.40902 13.1255 8.95036 12.819C8.4917 12.5126 8.13422 12.077 7.92312 11.5673C7.71203 11.0577 7.65679 10.4969 7.76441 9.95588C7.87203 9.41486 8.13766 8.91789 8.52772 8.52783C8.91777 8.13778 9.41474 7.87214 9.95576 7.76453C10.4968 7.65691 11.0576 7.71214 11.5672 7.92324C12.0768 8.13434 12.5124 8.49182 12.8189 8.95048C13.1254 9.40914 13.2889 9.94838 13.2889 10.5C13.2889 11.2397 12.9951 11.9491 12.472 12.4722C11.949 12.9952 11.2396 13.2891 10.4999 13.2891Z" fill="black"/>
                                </svg>
                                <svg  class="eye-icon show" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.54062 2.71L3.25063 2L20.0006 18.75L19.2906 19.46L15.9506 16.11C14.5806 16.68 13.0806 17 11.5006 17C6.94062 17 3.00063 14.35 1.14062 10.5C2.11063 8.5 3.63063 6.83 5.50063 5.68L2.54062 2.71ZM11.5006 16C12.7906 16 14.0306 15.77 15.1706 15.34L14.0506 14.21C13.3206 14.71 12.4506 15 11.5006 15C9.00062 15 7.00063 13 7.00063 10.5C7.00063 9.55 7.29063 8.68 7.79063 7.95L6.24062 6.41C4.56627 7.38547 3.1901 8.79968 2.26063 10.5C4.04062 13.78 7.50062 16 11.5006 16ZM20.7406 10.5C18.9606 7.22 15.5006 5 11.5006 5C10.3506 5 9.23062 5.19 8.19062 5.53L7.41062 4.75C8.68062 4.26 10.0606 4 11.5006 4C16.0606 4 20.0006 6.65 21.8606 10.5C20.9519 12.3858 19.5444 13.987 17.7906 15.13L17.0706 14.4C18.6006 13.44 19.8706 12.1 20.7406 10.5ZM11.5006 6C14.0006 6 16.0006 8 16.0006 10.5C16.0006 11.32 15.7806 12.08 15.4006 12.74L14.6606 12C14.8806 11.54 15.0006 11.04 15.0006 10.5C15.0006 9.57174 14.6319 8.6815 13.9755 8.02513C13.3191 7.36875 12.4289 7 11.5006 7C10.9606 7 10.4606 7.12 10.0006 7.34L9.26062 6.6C9.92062 6.22 10.6806 6 11.5006 6ZM8.00063 10.5C8.00063 11.4283 8.36937 12.3185 9.02575 12.9749C9.68213 13.6313 10.5724 14 11.5006 14C12.1706 14 12.7906 13.81 13.3206 13.5L8.50063 8.68C8.19063 9.21 8.00063 9.83 8.00063 10.5Z" fill="black"/>
                                </svg>

                            </button>
                        </div>
                    </div>
                    <div class="modal-buttons">
                        <button class="btn-togo">Зареєструватись</button>
                    </div>
                </form>
                <div class="links-line">
                    <a href="#" class="link-type" data-trigger-modal="pwforgot">Забули пароль?</a>
                    <a href="#" class="link-type reGistrationTrigger" data-trigger-modal="login">Увійти</a>
                </div>

            </div>

            <div class="modal password" id="modalRegenerate" data-modal="pwforgot">
                <div class="modal-close closeModal">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                        <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
                    </svg>
                </div>
                <p class="added">Відновлення пароля</p>
                <p>Будь ласка, введіть адресу електронної пошти, яка була призначена для вашого облікового запису, і отримайте новий пароль для електронної пошти</p>
                <form class="LoginForm formStyle" action="">
                    <div class="input-group">
                        <label class="label">Логін e-mail</label>
                        <input type="text" placeholder="e-mail" class="information-input">
                    </div>

                </form>
                <div class="links-line">
                    <div class="modal-buttons">
                        <button class="confirm-btn" >Відновити</button>
                    </div>
                    <a href="#" class="link-type reGistrationTrigger" data-trigger-modal="login">Увійти до кабінету</a>
                </div>

            </div>
            <?php
        }
    ?>


    <div class="modal" id="modal" data-modal="addProduct">
        <div class="modal-close closeModal">
            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
            </svg>
        </div>

        <p class="added"><?= __('Товар доданий до кошика', 'shoploft'); ?></p>

        <p class="modal-text__product_amount">
            <?=
                str_replace('%s1', WC()->cart->get_cart_contents_count(), __('У вас у кошику <span class="goods-count">%s1</span> товар', 'shoploft'));
            ?>
        </p>

        <div class="modal-buttons">
            <button type="button" class="confirm-btn closeModal"><?= __('Продовжити покупки', 'shoploft'); ?></button>

            <a href="<?= esc_url(wc_get_checkout_url()); ?>" class="exit-btn"><?= __('Оформити замовлення', 'shoploft'); ?></a>
        </div>
    </div>


    <div class="modal" id="modalThank" data-modal="Thanks">
        <div class="modal-close closeModal">
            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
            </svg>
        </div>

        <p class="added"><?= __('Дякуємо за реєстрацію!', 'shoploft'); ?></p>

        <p><?= __('Вам було надіслано листа з реєстраційною інформацією.', 'shoploft'); ?></p>

        <div class="modal-buttons">
            <a href="<?= get_home_url(); ?>" class="logo-wrap">
                <?= wp_get_attachment_image($common__logo, 'full', null, ['class' => 'logo']); ?>
            </a>
        </div>
    </div> 


            <div class="modal" id="modalBuyNow" data-modal="BuyNow">
                <div class="modal-close closeModal">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="18" y="1.10693" width="1" height="24" transform="rotate(45 18 1.10693)" fill="#010507"/>
                        <rect x="19" y="18.1069" width="1" height="24" transform="rotate(135 19 18.1069)" fill="#010507"/>
                    </svg>
                </div>

                <p class="added">Швидке замовлення</p>

                <p>Ваши покупки:</p>
                <div class="BuyNowProduct">
                    <p class="productName"> Product name </p>
                    <p class="PdoructQuunt"> 2 x</p>
                    <p class="ProductPrice">1234 uah</p>
                </div>
                <div class="buySum">
                    <p class="sunToBuy"> Сума покупки : <span>24657 uash</span></p>
                </div>
                

                <form class="LoginForm formStyle" action="">
                    <div class="input-group">
                        <label class="label">Ваше ПІБ</label>
                        <input type="text" placeholder="Михайлов Михайіл Миххайлович " class="information-input">
                    </div>

                    <div class="input-group">
                        <label class="label">Ваш e-mail</label>
                        <input type="email" placeholder="Ваш e-mail" class="information-input">
                    </div>
                    <div class="input-group">
                        <label class="label">Ваш номер телефону</label>
                        <input type="phone" placeholder="097 468 38 21" class="information-input">
                    </div>
                    <label class="wrap-checks argee-check">Я погоджуюсь з умовами публічної оферти, повернення та безпеки.
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="modal-buttons">
                        <button class="btn-togo" >Купити</button>
                    </div>
                </form>

            </div>




</div>