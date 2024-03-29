<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    array(
        'd-flex',
        'justify-content-end',
        'position-relative',
        'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'px-0',
        'overflow-hiddem',
        'col-lg-5',
        'col-11'
    )
);
?>

<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
     data-columns="<?php echo esc_attr($columns); ?>">
    <div data-aos="fade-left" data-aos-duration="500" class="col-5 rounded-4 position-absolute bg-white shadow-sm top-0 bottom-0 mb-3 start-0 p-3 px-lg-3 px-2 d-flex flex-column align-items-start">
        <?php

        if ($product->is_on_sale()) {
            wc_get_template_part('single-product/sale-flash');
        }
        ?>
        <?= do_shortcode('[yith_wcwl_add_to_wishlist]');?>
        <?php
        $videoFile = get_field('video_file');
        $videoImage = get_field('video-image');
        if ($videoFile) { ?>
        <button class="btn py-0 px-1 mx-1 text-primary border-0" data-bs-toggle="modal" data-bs-target="#videoModal" >
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z"/>
            </svg>
        </button>
        <?php
        }
        ?>
    </div>
    <figure data-aos="fade-left" data-aos-delay="100" data-aos-duration="500" class="woocommerce-product-gallery__wrapper h-100 col-11 ps-2">
        <?php
        $gallery_image_ids = $product->get_gallery_image_ids();
        // If there are multiple images, initialize Swiper
        ?>
        <div class="swiper product_image_swiper ps-4 ps-lg-3 pe-0 pe-lg-3 p-3">
            <div class="swiper-wrapper my-0">
                <?php
                // Add your image URL here
                $image_url = get_the_post_thumbnail_url();

                // Output the first slide with the image
                ?>
                <div class="swiper-slide bg-white rounded-4 p-2 shadow">
                    <img class="img-fluid object-fit-contain mx-auto rounded-4 w-100 product-image__single" height="450" src="<?= $image_url; ?>"
                         alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                    <button class="product__image btn position-absolute bottom-0 end-0 me-lg-3 me-2 mb-2"
                            type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                            data-link="<?php echo esc_url($image_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-zoom-in text-primary" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                            <path fill-rule="evenodd"
                                  d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </button>
                </div>

                <?php
                foreach ($gallery_image_ids as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    ?>
                    <div class="swiper-slide bg-white rounded-4 p-2 shadow" data-image-id="<?php echo esc_attr($image_id); ?>">
                        <img class="img-fluid object-fit-contain mx-auto rounded-4 w-100 product-image__single" height="450" src="<?php echo esc_url($image_url); ?>"
                             alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                        <button class="product__image btn position-absolute bottom-0 end-0 me-lg-3 me-2 mb-2"
                                type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-link="<?php echo esc_url($image_url); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-zoom-in text-primary" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                <path fill-rule="evenodd"
                                      d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                    </div>
                <?php } ?>

            </div>
            <div class="swiper-pagination position-static mt-4"></div>
        </div>
    </figure>
    <script>
        jQuery(document).ready(function () {
            jQuery('#videoModal').on('hidden.bs.modal', function () {
                // Pause the video
                var video = jQuery(this).find('video')[0];
                if (video) {
                    video.pause();
                }
            });
            jQuery('.product__image').each(function () {
                jQuery(this).on('click', function (e) {
                    e.preventDefault();
                    var imageId = jQuery(this).attr('data-link');
                    // Open the Bootstrap modal with the full-size image
                    jQuery('#myModal').modal('show');

                    // Set the modal image source
                    jQuery('#myModal .modal-body img').attr('src', imageId);
                });
            });
        })
    </script>
</div>
