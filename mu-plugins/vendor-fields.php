<?php
function count_product_vendors_shortcode() {
    global $post;

    // Get the product's author (seller)
    $seller = get_post_field('post_author', $post->ID);

    return sprintf('%d' , $seller);
}
add_shortcode('product_vendors_count', 'count_product_vendors_shortcode');


function store_name_below_price_shortcode() {
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

// Add extra fields in seller settings
add_filter('dokan_settings_form_bottom', 'extra_fields', 10, 2);

function extra_fields($current_user, $profile_info) {
    $manager_name = isset($profile_info['manager_name']) ? $profile_info['manager_name'] : '';
    $technical_manager = isset($profile_info['technical_manager']) ? $profile_info['technical_manager'] : '';
    $registration_number = isset($profile_info['registration_number']) ? $profile_info['registration_number'] : '';
    ?>
    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="manager_name">
            <?php _e('مدیر عامل', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="manager_name" id="manager_name" value="<?php echo $manager_name; ?>" />
        </div>
    </div>

    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="technical_manager">
            <?php _e('مسئول فنی', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="technical_manager" id="technical_manager" value="<?php echo $technical_manager; ?>" />
        </div>
    </div>

    <div class="gregcustom dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="registration_number">
            <?php _e('شماره ثبت شرکت', 'dokan'); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="registration_number" id="registration_number" value="<?php echo $registration_number; ?>" />
        </div>
    </div>
    <?php
}

// Save the field values
add_action('dokan_store_profile_saved', 'save_extra_fields', 15);

function save_extra_fields($store_id) {
    $dokan_settings = dokan_get_store_info($store_id);

    if (isset($_POST['manager_name'])) {
        $dokan_settings['manager_name'] = sanitize_text_field($_POST['manager_name']);
    }

    if (isset($_POST['technical_manager'])) {
        $dokan_settings['technical_manager'] = sanitize_text_field($_POST['technical_manager']);
    }

    if (isset($_POST['registration_number'])) {
        $dokan_settings['registration_number'] = sanitize_text_field($_POST['registration_number']);
    }

    update_user_meta($store_id, 'dokan_profile_settings', $dokan_settings);
}

// Show on the store page
add_action('dokan_store_header_info_fields', 'save_seller_info', 10);

function save_seller_info($store_user) {
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
}

/**
 * Plugin Name: Dokan Vendor Biography Shortcode
 */
add_shortcode( 'dokan_vendor_bio', 'dokan_vendor_bio_shortcode' );
function dokan_vendor_bio_shortcode() {
    $vendor = dokan()->vendor->get( get_query_var( 'author' ) );
    $store_info = $vendor->get_shop_info();
    if ( empty( $store_info['vendor_biography'] ) ) {
        return;
    }
    printf( '%s', apply_filters( 'the_content', $store_info['vendor_biography'] ) );
}


// user vendor bio shortcode on single product page

add_shortcode( 'dokan_vendor_bio_single', 'dokan_vendor_bio_shortcode_single' );
function dokan_vendor_bio_shortcode_single() {
    global $product;
    $seller = get_post_field( 'post_author', $product->get_id());
    $author = get_user_by( 'id', $seller );
    $vendor = dokan()->vendor->get( $seller );

    $store_info = dokan_get_store_info( $author->ID );

    if ( !empty( $store_info['vendor_biography'] ) ) { ?>
        <span class="details">
             <?php printf( $vendor->get_vendor_biography() ); ?>
         </span>
        <?php
    }
}