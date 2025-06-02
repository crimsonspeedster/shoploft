<?php
$languages = apply_filters( 'wpml_active_languages', NULL, ['skip_missing' => 0] );

if (!empty($languages)) {
    ?>
    <div class="lang-switch">
        <?php
            foreach ($languages as $lang_slug => $lang_item) {
                ?>
                <a href="<?= esc_url($lang_item['url']); ?>" class="lang-item <?= $lang_item['active'] ? 'active' : ''; ?>"><?= $lang_item['translated_name']; ?></a>
                <?php
            }
        ?>
    </div>
    <?php
}