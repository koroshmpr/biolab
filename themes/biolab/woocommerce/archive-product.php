<?php
if ( !is_search() ) {
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<?php //get_template_part('woocommerce/archive-header');?>
<?php get_template_part('woocommerce/archive-hero'); ?>

<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
//    do_action('woocommerce_before_shop_loop');
        get_template_part('template-parts/products/orderby-list');
//    woocommerce_product_loop_start();
    ?>
    <div class="row row-cols-xl-5 row-cols-md-3 row-cols-lg-4 row-cols-2 align-items-stretch">
        <?php


        if (wc_get_loop_prop('total')) {
            while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop'); ?>
                <article class="p-2">
                    <?php get_template_part('template-parts/products/product-card'); ?>
                </article>
            <?php }
        }?>
    </div>
    <?php
//    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
//    do_action('woocommerce_no_products_found');
    ?>
    <h2 class="text-center fw-bold fs-4 border rounded-3 border-info p-5 bg-white bg-opacity-10">محصولی یافت نشد</h2>
<?php }

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
//put your search results markup here (you can copy some code from archive-product.php file and also from content-product.php to create a standard markup
} if ( is_search() ) {
get_template_part('search');

}
?>
