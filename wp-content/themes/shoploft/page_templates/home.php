<?php
/*
Template Name: Home page
*/

get_header();

$hero__slider = get_field('hero__slider');

$popular__condition = get_field('popular__condition');
$popular__slider = get_field('popular__slider');
$popular__title = get_field('popular__title');
$popular__link = get_field('popular__link');

$portfolio__condition = get_field('portfolio__condition');
$portfolio__slider = get_field('portfolio__slider');

$sale__condition = get_field('sale__condition');
$sale__title = get_field('sale__title');
$sale__link = get_field('sale__link');
$sale__products = get_field('sale__products');

$media__condition = get_field('media__condition');
$media__image_id = get_field('media__image_id');
$media__title = get_field('media__title');
$media__description = get_field('media__description');
$media__repeater = get_field('media__repeater');

$collections__condition = get_field('collections__condition');
$collections__title = get_field('collections__title');
$collections__link = get_field('collections__link');
$collections__repeater = get_field('collections__repeater');

$to_order__condition = get_field('to_order__condition');
$to_order__title = get_field('to_order__title');
$to_order__slider = get_field('to_order__slider');

$seo__condition = get_field('seo__condition');
$seo__title = get_field('seo__title');
$seo__description_short = get_field('seo__description_short');
$seo__description_big = get_field('seo__description_big');
?>
<main>
    <?php
        if (!empty($hero__slider)) {
            ?>
            <section class="main-banner">
                <div class="outer-slider">
                    <?php
                        foreach ($hero__slider as $hero_slide_item) {
                            ?>
                            <div class="outer-slide" style="background-image: url('<?= esc_attr(wp_get_attachment_image_url($hero_slide_item['image_id'], 'full')); ?>')">
                                <h2 class="slide-title"><?= $hero_slide_item['title']; ?></h2>

                                <?php
                                    if ($hero_slide_item['description']) {
                                        ?>
                                        <p class="slide-subtitle"><?= $hero_slide_item['description']; ?></p>
                                        <?php
                                    }

                                    if (!empty($hero_slide_item['products_array'])) {
                                        ?>
                                        <div class="inner-slider-wrapper">
                                            <button class="inner-arrow up" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 19V5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5 12L12 5L19 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>

                                            <div class="inner-slider">
                                                <?php
                                                    foreach ($hero_slide_item['products_array'] as $post) {
                                                        ?>
                                                        <div class="inner-slide">
                                                            <?php
                                                                setup_postdata($post);
                                                                do_action( 'woocommerce_shop_loop' );
                                                                get_template_part('partials/preview-product-mini');
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }

                                                    wp_reset_postdata();
                                                ?>
                                            </div>

                                            <button class="inner-arrow down" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 5L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M19 12L12 19L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </section>
            <?php
        }
    ?>

    <div class="container-main-page">
        <?php
            if ($popular__condition) {
                ?>
                <section class="popular-banner">
                    <?php
                        get_template_part('partials/global/name-block-line', '', [
                            'title' => $popular__title,
                            'link' => $popular__link,
                        ]);
                    ?>

                    <div class="hover-zone left-zone"></div>
                    <div class="hover-zone right-zone"></div>

                    <?php
                        if (!empty($popular__slider)) {
                            ?>
                            <div class="pop-slider">
                                <?php
                                    foreach ($popular__slider as $item) {
                                        ?>
                                        <div class="pop-item">
                                            <a href="<?= $item['link']['url']; ?>" class="rectangle-card" <?php getLinkAttrs($item['link']); ?>>
                                                <?= wp_get_attachment_image($item['image_id'], 'full', false, array('class' => 'rectangle-image')); ?>

                                                <p class="rectangle-name"><?= $item['link']['title']; ?></p>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }

            if ($portfolio__condition) {
                ?>
                <section class="portfolio-section">
                    <div class="hover-zone-port left-zone-port"></div>
                    <div class="hover-zone-port right-zone-port"></div>

                    <?php
                        if (!empty($popular__slider)) {
                            ?>
                            <div class="portfolio-slider">
                                <?php
                                    foreach ($portfolio__slider as $item) {
                                        ?>
                                        <div class="port-item">
                                            <div class="potrfolio-slide">
                                                <div class="wrap-portfolio-image">
                                                    <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                                </div>

                                                <div class="portfolio-info">
                                                    <p class="portfoplio-name"><?= $item['title']; ?></p>

                                                    <?php
                                                        if ($item['description']) {
                                                            ?>
                                                            <p class="portfolio-text"><?= $item['description']; ?></p>
                                                            <?php
                                                        }
                                                    ?>

                                                    <a href="<?= $item['link']['url']; ?>" class="portfoplio-button" <?php getLinkAttrs($item['link']); ?>><?= $item['link']['title']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }

            if ($sale__condition) {
                ?>
                <section class="sale-block">
                    <?php
                        get_template_part('partials/global/name-block-line', '', [
                            'title' => $sale__title,
                            'link' => $sale__link,
                        ]);
                    ?>

                    <?php
                        if (!empty($sale__products)) {
                            ?>
                            <div class="hover-zone left-zone-s"></div>
                            <div class="hover-zone right-zone-s"></div>

                            <div class="sal-slider">
                                <?php
                                    foreach ($sale__products as $post) {
                                        ?>
                                        <div class="sal-item">
                                            <?php
                                                setup_postdata($post);
                                                do_action( 'woocommerce_shop_loop' );
                                                wc_get_template_part( 'content', 'product' );
                                            ?>
                                        </div>
                                        <?php
                                    }

                                    wp_reset_postdata();
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }

            if ($media__condition) {
                ?>
                <section class="info-media">
                    <div class="media__row">
                        <div class="media-item media-item--big">
                            <?= wp_get_attachment_image($media__image_id, 'full', false, ['class' => 'sm-img']); ?>

                            <div class="sm-1-text">
                                <p class="sm-title"><?= $media__title; ?></p>

                                <?php
                                    if ($media__description) {
                                        ?>
                                        <p class="sm-big-number"><?= $media__description; ?></p>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <?php
                            if (!empty($media__repeater)) {
                                foreach ($media__repeater as $index => $item) {
                                    ?>
                                    <div class="media-item">
                                        <?= wp_get_attachment_image($item['bg_id'], 'full', false, ['class' => 'sm-img']); ?>

                                        <a href="<?= $item['link']['url']; ?>" class="sm-overlay" <?php getLinkAttrs($item['link']); ?>>
                                            <span class="sm-icon">
                                                <?= wp_get_attachment_image($item['icon_id'], 'full'); ?>
                                            </span>

                                            <p class="sm-number"><?= $item['title']; ?></p>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </section>
                <?php
            }

            if ($collections__condition) {
                ?>
                <section class="collections">
                    <?php
                        get_template_part('partials/global/name-block-line', '', [
                            'title' => $collections__title,
                            'link' => $collections__link,
                        ]);

                        if (!empty($collections__repeater)) {
                            ?>
                            <div class="hover-zone-col left-zone-col"></div>
                            <div class="hover-zone-col right-zone-col"></div>

                            <div class="col-slider">
                                <?php
                                    foreach ($collections__repeater as $collection_item) {
                                        if (is_a($collection_item, 'WP_Term')) {
                                            $image_id = get_field('image_id', $collection_item->taxonomy . '_' . $collection_item->term_id);
                                            ?>
                                            <div class="col-item">
                                                <div  class="col-card">
                                                    <?php
                                                        if ($image_id) {
                                                            echo wp_get_attachment_image($image_id, 'full');
                                                        }
                                                        else {
                                                            ?>
                                                            <img src="<?= wc_placeholder_img_src(); ?>" alt="<?= $collection_item->name; ?>">
                                                            <?php
                                                        }
                                                    ?>

                                                    <div class="col-texts">
                                                        <p class="col-name"><?= $collection_item->name; ?></p>

                                                        <p class="col-subname">
                                                            <?=
                                                                str_replace('%s1', $collection_item->count, __('%s1 пердметів', 'shoploft'));
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <a href="<?= get_term_link($collection_item, $collection_item->taxonomy); ?>" class="col-btn"><?= __('Дивитись', 'shoploft'); ?></a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }

            if ($to_order__condition) {
                ?>
                <section class="zamovlennya">
                    <?php
                        get_template_part('partials/global/name-block-line', '', [
                            'title' => $to_order__title,
                        ]);

                        if (!empty($to_order__slider)) {
                            ?>
                            <div class="wrap-cards-zamovlennya">
                                <?php
                                    foreach ($to_order__slider as $item) {
                                        ?>
                                        <div class="pop-item">
                                            <a href="<?= $item['link']['url']; ?>" class="rectangle-card" <?php getLinkAttrs($item['link']); ?>>
                                                <?= wp_get_attachment_image($item['image_id'], 'full', false, ['class' => 'rectangle-image']); ?>

                                                <p class="rectangle-name"><?= $item['link']['title']; ?></p>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </section>
                <?php
            }

            if ($seo__condition) {
                ?>
                <div class="seo-loft">
                    <div class="seo-loft-wrap">
                        <h2 class="seo-loft-mane"><?= $seo__title; ?></h2>

                        <div class="seo-loft-big-text">
                            <div class="spoiler-container">
                                <div class="spoiler-text short"><?= apply_filters('the_content', $seo__description_short); ?></div>

                                <div class="spoiler-more spoiler-simple"><?= apply_filters('the_content', $seo__description_big); ?></div>

                                <button type="button" data-text-more="<?= __('Розгорнути', 'shoploft'); ?>" data-text-less="<?= __('Згорнути', 'shoploft'); ?>" class="spoiler-btn"><?= __('Розгорнути', 'shoploft'); ?></button>
                            </div>
                        </div>

                    </div>

                </div>
                <?php
            }
        ?>
    </div>
</main>
<?php
get_footer();
