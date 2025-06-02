<?php
$common__logo = get_field('common__logo', 'option');

if (is_active_sidebar('sidebar-top') || is_active_sidebar('sidebar-bottom')) {
    ?>
    <div class="aside" role="complementary">
        <div class="aside-inner">
            <?php
                if (is_active_sidebar('sidebar-top')) {
                    ?>
                    <div class="aside-top">
                        <?php dynamic_sidebar('sidebar-top'); ?>
                    </div>
                    <?php
                }

                if (is_active_sidebar('sidebar-bottom')) {
                    ?>
                    <div class="aside-bottom">
                        <?php dynamic_sidebar('sidebar-bottom'); ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

    <div class="overlay"></div>
    <?php
}
