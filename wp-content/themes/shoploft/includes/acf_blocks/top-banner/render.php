<?php
$is_preview = get_field('is_preview');
$title = get_field('title');
$background_color = get_field('background_color');

if ($is_preview) {
    ?>
    <img style="width: 100%; height: auto;" src="<?= get_field('preview_image'); ?>" alt="preview" />
    <?php
}
else {
    ?>
    <div
        class="mini-le"
        style="background-color: <?= esc_attr($background_color); ?>;"
    >
        <p><?= $title; ?></p>
    </div>
    <?php
}
