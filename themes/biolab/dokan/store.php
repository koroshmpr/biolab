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
$vendor_id = $store_user->get_id();
$store_info = $store_user->get_shop_info();
$map_location = $store_user->get_location();
$layout = get_theme_mod('store_layout', 'left');

get_header('shop');

//if (function_exists('yoast_breadcrumb')) {
//    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
//}
//?>
<?php do_action('woocommerce_before_main_content'); ?>

<div class="dokan-store-wrap flex-wrap flex-column flex-lg-row layout-<?php echo esc_attr($layout); ?>">
    <div class="cover col-12 w-100 h-auto">
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
    <div id="dokan-primary"
         class="col-12 col-lg-8 dokan-single-store-dis col border border-info border-opacity-50 rounded-4 py-4 px-2 px-lg-4">
        <?php
        $vendor_id = get_query_var('author');
        $vendor = dokan()->vendor->get($vendor_id);
        $store_info = $vendor->get_shop_info();
        $biography = $store_info['vendor_biography'] ?? '';

        if (!empty($biography)) {
            ?>
            <article class="biography text-justify">
                <?php
                $title = 'بایوگرافی';
                $args = array(
                    'title' => $title
                );
                get_template_part('template-parts/loop/header_underline', null, $args); ?>
                <div class="w-100 overflow-hidden">
                    <?php echo apply_filters('the_content', $biography); ?>
                </div>
            </article>
            <?php
        }
        ?>
        <?php
        $fields = do_shortcode('[dokan_store_custom_fields]');

        if ($fields != false) {
            $title = 'اطلاعات شرکت';
            $args = array(
                'title' => $title
            );
            get_template_part('template-parts/loop/header_underline', null, $args);
            echo $fields;
        }
        ?>

        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

            <?php
            do_action('dokan_store_profile_frame_after', $store_user->data, $store_info);

            $vendor_id = get_query_var('author');
            $excluded_category_id = 16;

            $args = array(
                'author' => $vendor_id,
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $excluded_category_id,
                        'operator' => 'NOT IN',
                    ),
                ),
            );

            $query = new WP_Query($args);
            ?>


            <?php
            if ($query->have_posts()) :
            $title = 'محصولات';
            $args = array(
                'title' => $title,
            );
            get_template_part('template-parts/loop/header_underline', null, $args); ?>
            <div class="seller-items">
                <div class="row row-cols-lg-4 row-cols-costume  flex-nowrap flex-lg-wrap overflow-x-scroll">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="p-2 h-auto">
                            <?php get_template_part('template-parts/products/product-card'); ?>
                        </div>
                    <?php
                    endwhile;
                    //                    wp_reset_postdata(); // Reset the post data to the main query
                    ?>
                    <?php dokan_content_nav('nav-below'); ?>
                </div>
                <?php endif; ?>


                <?php if ($query->have_posts()):
                    ?>
                    <div class="mb-2 mt-4">
                        <?php
                        $title = 'کاتالوگ';
                        $args = array(
                            'title' => $title
                        );
                        get_template_part('template-parts/loop/header_underline', null, $args);
                        ?>
                        <div class="seller-items">
                            <div class="row row-cols-lg-4 row-cols-costume flex-nowrap flex-lg-wrap">
                                <?php
                                while ($query->have_posts()) :
                                    $query->the_post();
                                    $galleryFile = get_field('catalogue-file');
                                    $galleryPages = get_field('catalogue-pages');
                                    $galleryImage = get_field('catalogue-image');
                                    if ($galleryFile) {
                                        // Output the card HTML with the repeater field values
                                        ?>
                                        <a href="<?= $galleryFile['url']; ?>" download class="p-2 h-auto card border-0">
                                            <img height="230" class="object-fit-cover rounded-3"
                                                 src="<?php echo $galleryImage['url']; ?>"
                                                 alt="<?php echo $galleryImage['alt']; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $title; ?></h5>
                                                <p class="mb-0 text-primary"><?= $galleryPages; ?> صقحه </p>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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
