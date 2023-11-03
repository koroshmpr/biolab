<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$store_user = dokan()->vendor->get(get_query_var('author'));
$store_info = $store_user->get_shop_info();
$map_location = $store_user->get_location();
$layout = get_theme_mod('store_layout', 'left');

get_header('shop');

if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
<?php do_action('woocommerce_before_main_content'); ?>

<div class="dokan-store-wrap flex-wrap flex-column flex-lg-row layout-<?php echo esc_attr($layout); ?>">
    <div class="cover col-12 w-100">
        <?php dokan_get_template_part('store-header'); ?>
    </div>
    <?php if ('left' === $layout) { ?>
        <?php
        dokan_get_template_part(
            'store', 'sidebar', [
                'store_user' => $store_user,
                'store_info' => $store_info,
                'map_location' => $map_location,
            ]
        );
        ?>
    <?php } ?>
    <div id="dokan-primary" class="dokan-single-store-dis col border border-info border-opacity-50 rounded-4 p-4">
        <article class="biography text-justify">
            <div class="border-bottom border-info border-opacity-50 d-flex mb-3">
                <h5 class="border-bottom border-success fs-3 mb-0 pb-3 border-2 fw-bold">بایوگرافی</h5>
            </div>
            <?php echo do_shortcode('[dokan_vendor_bio]') ?>
        </article>
        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">
            <div class="border-bottom border-info border-opacity-50 d-flex mb-2 mt-4">
                <h5 class="border-bottom border-success fs-3 mb-0 pb-3 border-2 fw-bold">محصولات</h5>
            </div>

            <?php do_action('dokan_store_profile_frame_after', $store_user->data, $store_info); ?>

            <?php if (have_posts()) { ?>

                <div class="seller-items">

                    <?php woocommerce_product_loop_start(); ?>
                        <div class="row row-cols-lg-4">
                    <?php
                    while (have_posts()) :
                        the_post();?>
                    <div class="p-2 h-auto">
                        <?php get_template_part('template-parts/products/product-card'); ?>
                    </div>
                    <?php endwhile; // end of the loop. ?>
                        </div>
                    <?php woocommerce_product_loop_end(); ?>

                </div>

                <?php dokan_content_nav('nav-below'); ?>

            <?php } else { ?>

                <p class="dokan-info"><?php esc_html_e('No products were found of this vendor!', 'dokan-lite'); ?></p>

            <?php } ?>
        </div>

    </div><!-- .dokan-single-store -->

    <?php if ('right' === $layout) { ?>
        <?php
        dokan_get_template_part(
            'store', 'sidebar', [
                'store_user' => $store_user,
                'store_info' => $store_info,
                'map_location' => $map_location,
            ]
        );
        ?>
    <?php } ?>

</div><!-- .dokan-store-wrap -->

<?php do_action('woocommerce_after_main_content'); ?>

<?php get_footer('shop'); ?>
