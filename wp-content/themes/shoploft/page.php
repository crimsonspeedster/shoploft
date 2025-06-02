<?php
get_header();
?>
<main>
    <?php
        if ((is_user_logged_in() && is_account_page()) || is_cart() || is_checkout()) {
            ?>
            <div class="page-name page-name-two place-name">
                <h1 class="h1"><?php the_title(); ?></h1>
            </div>
            <?php
        }

        the_content();
    ?>
</main>
<?php
get_footer();
