<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <?php
    $scripts = get_field('header_script', 'option');
    if ($scripts) {
        foreach ($scripts as $script) {
            echo $script['script'];
        }
    }
    ?>
</head>
<body <?php body_class(); ?>>
<?php
if (!is_page('dashboard')) { // Check if it's not the Dokan dashboard page
    ?>
    <header class="position-absolute top-0 w-100 z-2">
        <?php get_template_part('template-parts/layout/header/index'); ?>
    </header>
    <?php
}
?>
<main class="min-vh-100">
