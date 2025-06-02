<?php
$is_preview = get_field('is_preview');
$logo_id = get_field('logo_id');
$catalog_menu = get_field('catalog_menu');
$default_menu = get_field('default_menu');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div class="logo-menu">
        <a href="<?= get_home_url(); ?>" class="logo-wrap">
            <?= wp_get_attachment_image($logo_id, 'full', null, ['class' => 'logo']); ?>
        </a>

        <div class="menu-icon" id="menuToggle" role="button" aria-expanded="false" tabindex="0">
            <div class="toggle toggle2">
                <div id="bar4" class="bars"></div>
                <div id="bar5" class="bars"></div>
                <div id="bar6" class="bars"></div>
            </div>
        </div>
    </div>

    <div class="navigation-block">
        <?php
            if (!empty($catalog_menu)) {
                ?>
                <ul class="catalog-menu active">
                    <?php
                        foreach ($catalog_menu as $item) {
                            if (is_a($item['main_term'], 'WP_Term')) {
                                ?>
                                <li class="catalog-menu-list">
                                    <a class="calalog-menu-link" href="<?= get_term_link($item['main_term'], $item['main_term']->taxonomy); ?>" aria-haspopup="true" aria-expanded="false">
                                        <span><?= $item['main_term']->name; ?></span>

                                        <span class="item-number">(<?= $item['main_term']->count; ?>)</span>

                                        <span class="arrow-icon" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M17.0036 9.16994C16.8162 8.98369 16.5628 8.87915 16.2986 8.87915C16.0344 8.87915 15.781 8.98369 15.5936 9.16994L12.0036 12.7099L8.46361 9.16994C8.27625 8.98369 8.0228 8.87915 7.75861 8.87915C7.49442 8.87915 7.24097 8.98369 7.05361 9.16994C6.95988 9.26291 6.88549 9.37351 6.83472 9.49537C6.78395 9.61723 6.75781 9.74793 6.75781 9.87994C6.75781 10.012 6.78395 10.1427 6.83472 10.2645C6.88549 10.3864 6.95988 10.497 7.05361 10.5899L11.2936 14.8299C11.3866 14.9237 11.4972 14.9981 11.619 15.0488C11.7409 15.0996 11.8716 15.1257 12.0036 15.1257C12.1356 15.1257 12.2663 15.0996 12.3882 15.0488C12.51 14.9981 12.6206 14.9237 12.7136 14.8299L17.0036 10.5899C17.0973 10.497 17.1717 10.3864 17.2225 10.2645C17.2733 10.1427 17.2994 10.012 17.2994 9.87994C17.2994 9.74793 17.2733 9.61723 17.2225 9.49537C17.1717 9.37351 17.0973 9.26291 17.0036 9.16994Z" fill="#545353"></path>
                                            </svg>
                                        </span>
                                    </a>

                                    <?php
                                        if (!empty($item['children_terms'])) {
                                            ?>
                                            <ul class="submenu" aria-hidden="true">
                                                <span class="submenu-header">
                                                    <h2><?= $item['main_term']->name; ?></h2>
                                                </span>

                                                <?php
                                                    foreach ($item['children_terms'] as $child_term) {
                                                        if (is_a($child_term, 'WP_Term')) {
                                                            $subchildrens = get_terms([
                                                                'taxonomy'   => 'product_cat',
                                                                'parent'     => $child_term->term_id,
                                                                'hide_empty' => true,
                                                            ]);
                                                            ?>
                                                            <li class="submenu-list <?= !empty($subchildrens) && ! is_wp_error($subchildrens) ? 'has-sub' : ''; ?>">
                                                                <?php
                                                                    if (!empty($subchildrens) && ! is_wp_error($subchildrens)) {
                                                                        ?>
                                                                        <div class="submenu-link-wrapper">
                                                                            <a href="<?= get_term_link($child_term, $child_term->taxonomy); ?>" class="submenu-link">
                                                                                <?= $child_term->name; ?>

                                                                                <span class="category-number">(<?= $child_term->count; ?>)</span>
                                                                            </a>

                                                                            <button class="toggle-submenu-btn" aria-expanded="false">
                                                                                <img src="<?= get_template_directory_uri(); ?>/dist/front/images/icons/close.svg" alt="Close Icon">
                                                                            </button>
                                                                        </div>

                                                                        <ul class="submenu-inner" aria-hidden="true" style="max-height: 0;">
                                                                            <?php
                                                                                foreach ($subchildrens as $subchild_term) {
                                                                                    if (is_a($subchild_term, 'WP_Term')) {
                                                                                        ?>
                                                                                        <li>
                                                                                            <a href="<?= get_term_link($subchild_term, $subchild_term->taxonomy); ?>"><?= $subchild_term->name; ?></a>
                                                                                        </li>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <?php
                                                                    }
                                                                    else {
                                                                        ?>
                                                                        <li class="submenu-list">
                                                                            <a href="<?= get_term_link($child_term, $child_term->taxonomy); ?>" class="submenu-link">
                                                                                 <?= $child_term->name; ?>

                                                                                <span class="category-number">(<?= $child_term->count; ?>)</span>
                                                                            </a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                            <?php
                                        }
                                    ?>
                                </li>
                                <?php
                            }
                        }
                    ?>
                </ul>
                <?php
            }

            if ($default_menu) {
                wp_nav_menu([
                    'menu' => $default_menu,
                    'menu_class' => 'site-menu',
                    'container' => 'nav',
                    'container_class' => 'site-nav',
                    'depth' => 1,
                    'add_li_class' => 'site-menu-li',
                    'add_a_class' => 'site-manu-link',
                ]);
            }
        ?>
    </div>
    <?php
}
