<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('partials/global/sidebar'); ?>

<div class="page">
    <div class="container">

    <?php
        get_template_part('partials/global/top-part');

        if (is_active_sidebar('top-banner')) {
            dynamic_sidebar('top-banner');
        }

        if (!is_front_page()) {
            get_template_part('partials/global/breadcrumbs');
        }
    ?>

