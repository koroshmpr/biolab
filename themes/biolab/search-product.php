<?php
/*
 * Template Name: Product Search
 */

get_header();

$args = array(
    'post_type' => 'product',
    's'         => get_search_query(),
);

$products_query = new WP_Query($args);

if ($products_query->have_posts()) :
    while ($products_query->have_posts()) : $products_query->the_post();
        // Your product loop content goes here
        the_title();
    endwhile;
else :
    echo '<p>No products found</p>';
endif;

get_footer();
