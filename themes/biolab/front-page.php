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
$heroType = get_field('hero-type');
if ($heroType == 'title') {
    get_template_part('template-parts/homePage/hero');
}
if ($heroType == 'slider') {
    get_template_part('template-parts/homePage/hero-slider');
}
get_template_part('template-parts/products/slider-product_title-side');
//get_template_part('template-parts/homePage/brands');
get_template_part('template-parts/homePage/sellers');
get_template_part('template-parts/homePage/banners');
get_template_part('template-parts/homePage/property');
get_template_part('template-parts/homePage/banner-cta');
get_template_part('template-parts/homePage/category-products-loop-slide');
get_template_part('template-parts/homePage/grid-twice');
get_template_part('template-parts/homePage/workflows');
get_template_part('template-parts/blog/recently-posts');
get_template_part('template-parts/homePage/cta');
get_footer();