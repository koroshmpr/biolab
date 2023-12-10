<?php
// Add extra fields in seller settings
add_filter('dokan_settings_form_bottom', 'extra_fields', 10, 2);

// Add the additional fields to the vendor profile
function extra_fields($current_user, $profile_info)
{
    $manager_name = $profile_info['manager_name'] ?? '';
    $technical_manager = $profile_info['technical_manager'] ?? '';
    $registration_number = $profile_info['registration_number'] ?? '';
    $company_type = $profile_info['company_type'] ?? '';
    $gallery = $profile_info['gallery'] ?? array();
    $videos = $profile_info['videos'] ?? array();

    ?>
    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="manager_name">
            <?php _e('مدیر عامل', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="manager_name" id="manager_name"
                   value="<?php echo $manager_name; ?>"/>
        </div>
    </div>

    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="technical_manager">
            <?php _e('مسئول فنی', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="technical_manager" id="technical_manager"
                   value="<?php echo $technical_manager; ?>"/>
        </div>
    </div>

    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="registration_number">
            <?php _e('شماره ثبت شرکت', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="registration_number"
                   id="registration_number" value="<?php echo $registration_number; ?>"/>
        </div>
    </div>
    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="company_type">
            <?php _e('نوع شرکت', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="company_type" id="company_type"
                   value="<?php echo $company_type; ?>"/>
        </div>
    </div>
    <!-- Add a gallery field for multiple images -->
    <div class="gregcustom d-none dokan-form-group d-flex align-items-center">
        <label class="dokan-w3 dokan-control-label">
            <?php _e('کاتالوگ', 'dokan'); ?>
        </label>
        <div class="dokan-w5 d-flex align-items-center gap-3 rounded-2 border border-info my-2">
            <?php
            $field_key = 'gallery'; // Replace with your ACF field key
            $user_gallery = get_field($field_key, 'user_' . get_current_user_id());
            ?>
<!--            <div class="row row-cols-4 gap-3 justify-content-center gallery-container p-1 col overflow-y-scroll align-items-start" id="sortable-gallery" style="min-height: 150px">-->
<!--                --><?php //if ($user_gallery): ?>
<!--                    --><?php //foreach ($user_gallery as $image): ?>
<!--                        <div class="position-relative gallery-item border border-info border-opacity-50 p-2 rounded-3" data-attachment-id="--><?//= $image['ID']; ?><!--">-->
<!--                            <img class="object-fit" width="100" height="100" src="--><?//= $image['url']; ?><!--" />-->
<!--                            <button class="delete-item bg-danger lh-1 position-absolute top-0 start-0 p-1 rounded-circle btn">X</button>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                --><?php //endif; ?>
<!--            </div>-->

            <input value="اضافه کنید" type="file" class="dokan-form-control-dis col-2 p-1 valid py-5" name="gallery[]" id="gallery" multiple />

            <script>
                jQuery(function($) {
                    // Handle delete button click
                    $(document).on('click', '.delete-item', function() {
                        var item = $(this).closest('.gallery-item');
                        var attachmentId = item.data('attachment-id');

                        // Remove the item from the DOM
                        item.remove();

                        // Update the order after deletion
                        updateGalleryOrder();

                        // AJAX call to delete the attachment ID from the ACF gallery field
                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            data: {
                                action: 'delete_acf_gallery_item',
                                attachment_id: attachmentId,
                                field_key: '<?= $field_key; ?>',
                                user_id: <?= get_current_user_id(); ?>
                            },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    });

                    // Handle file input change
                    $('#gallery').on('change', function() {
                        var files = this.files;

                        // Loop through selected files and perform actions
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            uploadFile(file);
                        }
                    });

                    function uploadFile(file) {
                        var formData = new FormData();
                        formData.append('action', 'upload_acf_gallery_item');
                        formData.append('file', file);
                        formData.append('field_key', '<?= $field_key; ?>');
                        formData.append('user_id', <?= get_current_user_id(); ?>);

                        // AJAX call to upload the file and update the ACF gallery field
                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            data: formData,
                            success: function(response) {
                                console.log(response);

                                // TODO: Handle the response and update the UI with the new image
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }

                    function updateGalleryOrder() {
                        // Handle any additional actions needed when the order changes
                    }
                });
            </script>
        </div>


    </div>
    <!-- Add a videos field for multiple videos -->
    <div class="gregcustom d-none dokan-form-group d-flex align-items-center">
        <label class="dokan-w3 dokan-control-label">
            <?php _e('ویدئو', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="file" class="dokan-form-control input-md valid py-5" name="videos[]" id="videos" multiple/>
        </div>
    </div>
    <?php
}

// Display the gallery and videos on the vendor's single page
function display_gallery_and_videos($vendor_id)
{
    $gallery = get_user_meta($vendor_id, 'gallery', true);
    $videos = get_user_meta($vendor_id, 'videos', true);

    // Loop through and display gallery images
    if (!empty($gallery)) {
        echo '<h2>Gallery</h2>';
        foreach ($gallery as $image_url) {
            echo '<img src="' . esc_url($image_url) . '" alt="Gallery Image" />';
        }
    }

    // Loop through and display videos
    if (!empty($videos)) {
        echo '<h2>Videos and Demos</h2>';
        foreach ($videos as $video_url) {
            echo '<video controls width="320" height="240">
                <source src="' . esc_url($video_url) . '" type="video/mp4">
                Your browser does not support the video tag.
            </video>';
        }
    }
}

// Hook to display gallery and videos on the vendor's single page
add_action('dokan_store_profile_frame_after', 'display_gallery_and_videos', 10);

// Save the field values, including the new gallery and videos fields
add_action('dokan_store_profile_saved', 'save_extra_fields', 15);

function save_extra_fields($store_id)
{
    $dokan_settings = dokan_get_store_info($store_id);

    if (isset($_POST['manager_name'])) {
        $dokan_settings['manager_name'] = sanitize_text_field($_POST['manager_name']);
    }

    if (isset($_POST['technical_manager'])) {
        $dokan_settings['technical_manager'] = sanitize_text_field($_POST['technical_manager']);
    }
    if (isset($_POST['company_type'])) {
        $dokan_settings['company_type'] = sanitize_text_field($_POST['company_type']);
    }
    if (isset($_POST['registration_number'])) {
        $dokan_settings['registration_number'] = sanitize_text_field($_POST['registration_number']);
    }
    if (isset($_FILES['gallery'])) {
        $gallery_files = $_FILES['gallery'];

        // Check if any files were uploaded
        if (!empty($gallery_files['name'][0])) {
            $uploaded_gallery = dokan_media_handle_upload('gallery', 0);

            if (!is_wp_error($uploaded_gallery)) {
                // Gallery uploaded successfully, update the user meta
                $user_gallery = get_user_meta($store_id, 'gallery', true);
                if (!is_array($user_gallery)) {
                    $user_gallery = array();
                }

                $user_gallery[] = $uploaded_gallery;
                update_user_meta($store_id, 'gallery', $user_gallery);
            } else {
                // Display the upload error
                echo 'Gallery Upload Error: ' . $uploaded_gallery->get_error_message();
            }
        }
    }


    update_user_meta($store_id, 'dokan_profile_settings', $dokan_settings);
}

// Show on the store page
add_action('dokan_store_header_info_fields', 'save_seller_info', 10);

function save_seller_info($store_user)
{
    $store_info = dokan_get_store_info($store_user);

    if (isset($store_info['manager_name']) && !empty($store_info['manager_name'])) {
        echo '<i class="fa fa-user"></i>';
        echo esc_html($store_info['manager_name']);
        echo '<br>';
    }

    if (isset($store_info['technical_manager']) && !empty($store_info['technical_manager'])) {
        echo '<i class="fa fa-wrench"></i>';
        echo esc_html($store_info['technical_manager']);
        echo '<br>';
    }

    if (isset($store_info['registration_number']) && !empty($store_info['registration_number'])) {
        echo '<i class="fa fa-file"></i>';
        echo esc_html($store_info['registration_number']);
        echo '<br>';
    }
    if (isset($store_info['company_type']) && !empty($store_info['company_type'])) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.3-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg>';
        echo esc_html($store_info['company_type']);
        echo '<br>';
    }
    if (isset($store_info['gallery']) && !empty($store_info['gallery'])) {
        echo '<i class="fa fa-file"></i>';
        foreach ($store_info['gallery'] as $image_url) {
            echo '<img src="' . esc_url($image_url) . '" alt="Gallery Image" />';
        }
        echo '<br>';
    }
}

/**
 * Plugin Name: Dokan Vendor Biography Shortcode
 */
add_shortcode('dokan_vendor_bio', 'dokan_vendor_bio_shortcode');
function dokan_vendor_bio_shortcode()
{
    $vendor = dokan()->vendor->get(get_query_var('author'));
    $store_info = $vendor->get_shop_info();
    if (empty($store_info['vendor_biography'])) {
        return;
    }
    printf('%s', apply_filters('the_content', $store_info['vendor_biography']));
}

// user vendor bio shortcode on single product page
add_shortcode('dokan_vendor_bio_single', 'dokan_vendor_bio_shortcode_single');
function dokan_vendor_bio_shortcode_single()
{
    global $product;
    $seller = get_post_field('post_author', $product->get_id());
    $author = get_user_by('id', $seller);
    $vendor = dokan()->vendor->get($seller);

    $store_info = dokan_get_store_info($author->ID);

    if (!empty($store_info['vendor_biography'])) { ?>
        <span class="details">
             <?php printf($vendor->get_vendor_biography()); ?>
         </span>
        <?php
    }
}

add_action('wp_ajax_delete_gallery_item', 'delete_gallery_item');
add_action('wp_ajax_update_gallery_order', 'update_gallery_order');

function count_product_vendors_shortcode()
{
    global $product;

    // Check if Dokan_SPMV_Products class is available
    if (class_exists('Dokan_SPMV_Products')) {
        $dokan_spmv_products = new Dokan_SPMV_Products();
        $lists = $dokan_spmv_products->get_other_reseller_vendors($product->get_id());

        $vendor_count = count($lists);

        if ($vendor_count === 1) {
            return "تنها فروشنده";
        } else {
            return sprintf('%d فروشنده دیگر', $vendor_count);
        }
    }

    return ''; // Handle the case when Dokan_SPMV_Products class is not available
}

add_shortcode('product_vendors_count', 'count_product_vendors_shortcode');



function store_name_below_price_shortcode()
{
    global $product;
    $seller = get_post_field('post_author', $product->get_id());
    $author = get_user_by('id', $seller);

    $store_info = dokan_get_store_info($author->ID);

    if (!empty($store_info['store_name'])) {
        ob_start();
        echo '<span class="details px-0">';
        printf('<a href="%s">%s</a>', dokan_get_store_url($author->ID), $author->display_name);
        echo '</span>';
        return ob_get_clean();
    }
}

add_shortcode('vendors_name', 'store_name_below_price_shortcode');

function custom_dokan_store_header_fields_shortcode($atts) {
    $atts = shortcode_atts(array(
        'store_id' => null,
    ), $atts);

    if (!$atts['store_id']) {
        $store_user = dokan()->vendor->get(get_query_var('author'));
        $store_id = $store_user->get_id();
    } else {
        $store_id = absint($atts['store_id']);
    }

    $dokan_settings = get_user_meta($store_id, 'dokan_profile_settings', true);

    // Get and display the custom fields
    $manager_name = !empty($dokan_settings['manager_name']) ? esc_html($dokan_settings['manager_name']) : '-';
    $technical_manager = !empty($dokan_settings['technical_manager']) ? esc_html($dokan_settings['technical_manager']) : '-';
    $registration_number = !empty($dokan_settings['registration_number']) ? esc_html($dokan_settings['registration_number']) : '-';
    $company_type = !empty($dokan_settings['company_type']) ? esc_html($dokan_settings['company_type']) : '-';

    ob_start(); ?>

    <table class="dokan-store-info mb-4 table table-striped table-hover">
        <tbody>
        <tr class="dokan-store-address">
            <th class="col-lg-2 col-5">مدیر عامل :</th>
            <td><?php echo $manager_name; ?></td>
        </tr>
        <tr class="dokan-store-address">
            <th>مسئول فنی :</th>
            <td><?php echo $technical_manager; ?></td>
        </tr>
        <tr class="dokan-store-address">
            <th>شماره ثبت شرکت :</th>
            <td><?php echo $registration_number; ?></td>
        </tr>
        <tr class="dokan-store-address">
            <th>نوع شرکت :</th>
            <td><?php echo $company_type; ?></td>
        </tr>
        </tbody>
    </table>

    <?php
    return ob_get_clean();
}


add_shortcode('dokan_store_custom_fields', 'custom_dokan_store_header_fields_shortcode');