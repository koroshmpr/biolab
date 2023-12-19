<?php
/** Template Name: default pages */

get_header(); ?>
<main id="primary" class="site-main hero min-vh-lg-80 top-gap-shop">
    <section class="container py-4 bg-white p-lg-4 p-2 rounded-3">
        <?= get_the_content(); ?>
    </section>
</main>
<?php get_footer(); ?>
