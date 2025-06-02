<?php
$is_preview = get_field('is_preview');
$image_id = get_field('image_id');
$link = get_field('link');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <a href="<?= esc_url($link['url']); ?>" class="kare-link" <?php getLinkAttrs($link); ?>>
        <?= wp_get_attachment_image($image_id, 'full'); ?>
    </a>
    <?php
}
