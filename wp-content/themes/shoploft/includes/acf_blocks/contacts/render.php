<?php
$is_preview = get_field('is_preview');
$title = get_field('block_contacts__title');
$repeater = get_field('block_contacts__repeater');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div class="internet">
        <?php
            if ($title) {
                ?>
                <p class="small_bold"><?= $title; ?></p>
                <?php
            }

            if (!empty($repeater)) {
                ?>
                <div class="where-block">
                    <?php
                        foreach ($repeater as $item) {
                            $title = $item['is_link'] ? $item['link']['title'] : $item['title'];

                            if ($item['is_link']) {
                                ?>
                                <a href="<?= $item['link']['url']; ?>" class="line-where" <?php getLinkAttrs($item['link']); ?>>
                                    <div class="icon-wrap fill-color">
                                        <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                    </div>

                                    <p class="text-aside"><?= $title; ?></p>
                                </a>
                                <?php
                            }
                            else {
                                ?>
                                <div class="line-where">
                                    <div class="icon-wrap fill-color">
                                        <?= wp_get_attachment_image($item['image_id'], 'full'); ?>
                                    </div>

                                    <p class="text-aside"><?= $title; ?></p>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <?php
            }
        ?>
    </div>
    <?php
}
