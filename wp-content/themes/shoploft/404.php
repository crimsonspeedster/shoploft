<?php
get_header();

$error__image = get_field('error__image', 'option');
$error__description = get_field('error__description', 'option');
?>
<main>
    <div class="block-404">
        <div class="wrap-forty">
            <div class="forty">4</div>

            <?= wp_get_attachment_image($error__image, 'full', null, ['class' => 'crown-image']); ?>

            <div class="forty">4</div>
        </div>

        <div class="dont-exist"><?= __('Нажаль, такої сторінки не існує.', 'shoploft'); ?></div>

        <?php
            if ($error__description) {
                ?>
                <div class="alternatives"><?= $error__description; ?></div>
                <?php
            }
        ?>
    </div>
</main>
<?php
get_footer();
