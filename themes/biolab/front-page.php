<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */

get_header();


if (have_posts())
    the_post();
// hero
get_template_part('template-parts/homePage/hero');
get_template_part('template-parts/homePage/workflows');
get_template_part('template-parts/products/slider-product_title-side');
//get_template_part('template-parts/homePage/brands');
get_template_part('template-parts/homePage/sellers');
get_template_part('template-parts/homePage/property');
get_template_part('template-parts/homePage/grid-twice');
get_template_part('template-parts/blog/recently-posts');
get_template_part('template-parts/homePage/cta');
///// portfolio last posts
//get_template_part('template-parts/portfolio/recently-portfolios');
///// most visited post
//get_template_part('template-parts/homePage/blog-slider');
///// services list
//get_template_part('template-parts/services/services-home');
get_footer();