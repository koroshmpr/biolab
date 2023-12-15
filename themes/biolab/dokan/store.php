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
    <div id="dokan-primary"
         class="col-12 col-lg-8 dokan-single-store-dis col border border-info border-opacity-50 rounded-4 p-4">
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
                get_template_part('template-parts/loop/header_underline', null, $args);

                echo apply_filters('the_content', $biography);
                ?>
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

            <?php do_action('dokan_store_profile_frame_after', $store_user->data, $store_info); ?>
            <?php if (have_posts()) { ?>
                <?php
                $title = 'محصولات';
                $args = array(
                    'title' => $title
                );
                get_template_part('template-parts/loop/header_underline', null, $args);
                ?>
                <div class="seller-items">
                    <div class="row row-cols-lg-4 flex-nowrap flex-lg-wrap overflow-x-scroll">
                        <?php
                        while (have_posts()) :
                            the_post(); ?>
                            <div class="p-2 h-auto">
                                <?php get_template_part('template-parts/products/product-card'); ?>
                            </div>
                        <?php endwhile; // end of the loop. ?>

                </div>

                <?php dokan_content_nav('nav-below'); ?>

            <?php } ?>
        </div>
        <div>
            <?php if (have_posts()): ?>
            <div class="mb-2 mt-4">
                <?php
                $title = 'کاتالوگ';
                $args = array(
                    'title' => $title
                );
                get_template_part('template-parts/loop/header_underline', null, $args);
                ?>
                <div class="seller-items">
                    <div class="row row-cols-lg-4 flex-nowrap flex-lg-wrap">
                        <?php
                        // Assuming you are within the loop on the vendor page
                        while (have_posts()) : the_post();

                            // Get the repeater field values
                            $gallery = get_field('catalogues_list');

                            // Check if the repeater field has rows
                            if ($gallery) {
                                // Loop through the rows of the repeater field
                                foreach ($gallery as $row) {
                                    // Get values from the repeater field
                                    $title = $row['title'];
                                    $cover = $row['cover'];
                                    $catalog = $row['cataloge'];
                                    $pages = $row['pages'];

                                    // Output the card HTML with the repeater field values
                                    ?>
                                    <a href="<?= $catalog['url']; ?>" download class="p-2 h-auto card border-0">
                                        <img height="230" class="object-fit-cover rounded-3"
                                             src="<?php echo $cover['url']; ?>" alt="<?php echo $cover['alt']; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $title; ?></h5>
                                            <p class="mb-0 text-primary"><?= $pages; ?> صقحه </p>
                                        </div>
                                    </a>
                                    <?php
                                }
                            }
                        endwhile; // end of the loop.
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
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
