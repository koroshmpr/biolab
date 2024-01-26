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
            //            do_action('dokan_store_profile_frame_after', $store_user->data, $store_info);

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
                </div>
                <?php dokan_content_nav('nav-below'); ?>
                <?php endif; ?>
                <!--                catalogue-->
                <?php if ($query->have_posts()):
                    $hasGallery = false;
                    $hasVideo = false;

                    while ($query->have_posts()) : $query->the_post();
                        $galleryFile = get_field('catalogue-file');
                        $videoFile = get_field('video_file');

                        if ($galleryFile) {
                            $hasGallery = true;
                        }

                        if ($videoFile) {
                            $hasVideo = true;
                        }
                    endwhile;

                    if ($hasGallery || $hasVideo): ?>
                        <!-- Gallery Section -->
                        <?php if ($hasGallery): ?>
                            <div class="mb-2 mt-4">
                                <?php
                                $title = 'کاتالوگ';
                                $args = array(
                                    'title' => $title
                                );
                                get_template_part('template-parts/loop/header_underline', null, $args);
                                ?>
                                <!-- Gallery Items Loop -->
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
                                                <a href="<?= $galleryFile['url']; ?>" download
                                                   class="p-2 h-auto card border-0">
                                                    <img height="230"
                                                         class="mx-auto rounded object-fit-contain w-auto p-2 product-card__image"
                                                         src="<?php echo $galleryImage['url']; ?>"
                                                         alt="<?php echo $galleryImage['alt']; ?>">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $title; ?></h5>
                                                        <p class="mb-0 text-primary"><?= $galleryPages; ?> صفحه </p>
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

                        <!-- Video Section -->
                        <?php if ($hasVideo): ?>
                            <div class="mb-2 mt-4">
                                <?php
                                $title = 'ویدیو';
                                $args = array(
                                    'title' => $title
                                );
                                get_template_part('template-parts/loop/header_underline', null, $args);
                                ?>
                                <!-- Video Items Loop -->
                                <div class="seller-items">
                                    <div class="row row-cols-lg-3 row-cols-costume flex-nowrap flex-lg-wrap">
                                        <?php
                                        while ($query->have_posts()) :
                                            $query->the_post();
                                            $videoFile = get_field('video_file');
                                            $videoImage = get_field('video-image');
                                            if ($videoFile) {
                                                // Output the card HTML with the repeater field values
                                                ?>
                                                <div class="video_product p-2 h-auto card border-0"
                                                     type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                                     data-link="<?php echo esc_url($videoFile['url']); ?>">
                                                    <img height="230"
                                                         class="rounded-5 object-fit-cover w-auto position-relative product-card__image"
                                                         src="<?php echo $videoImage['url'] ?? get_field('video_default_cover', 'option')['url']; ?>"
                                                         alt="<?php echo $videoImage['alt']; ?>">
                                                    <div class="card-body">
                                                        <h6 class="text-dark text-opacity-75">
                                                            <?= get_the_title(); ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function () {
                                            jQuery('#myModal').on('hidden.bs.modal', function () {
                                                // Pause the video
                                                var video = jQuery(this).find('video')[0];
                                                if (video) {
                                                    video.pause();
                                                }
                                            });
                                            jQuery('.video_product').each(function () {
                                                jQuery(this).on('click', function (e) {
                                                    e.preventDefault();
                                                    var imageId = jQuery(this).attr('data-link');
                                                    // Open the Bootstrap modal with the full-size image
                                                    jQuery('#myModal').modal('show');

                                                    // Set the modal image source
                                                    jQuery('#myModal .modal-body video').attr('src', imageId);
                                                });
                                            });
                                        })
                                    </script>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif;
                endif; ?>

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
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         style="backdrop-filter: blur(8px)">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-white bg-opacity-10 p-3 border-white border-opacity-25 rounded-0">
                <div class="modal-body text-center overflow-hidden">
                    <video class="img-fluid position-relative product-image__modal" controls
                           src="<?= get_field('brand_logo_img', 'option')['url']; ?>" alt="Full-size Image">
                </div>
            </div>
        </div>
    </div>
