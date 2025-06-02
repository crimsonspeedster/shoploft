<?php
if (empty($args))
    return;

$title = $args['title'];
$link = $args['link'];
?>

<div class="name-block-line">
    <p class="block-name"><?= $title; ?></p>

    <?php
        if (!empty($link)) {
            ?>
            <a href="<?= $link['url']; ?>" class="see-all" <?php getLinkAttrs($link); ?>><?= $link['title']; ?></a>
            <?php
        }
    ?>
</div>
