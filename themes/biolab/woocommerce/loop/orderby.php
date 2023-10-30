<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files, and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs, the version of the template file will be bumped, and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<form class="w-100 woocommerce-ordering border-bottom border-info border-opacity-50 d-flex gap-3 align-content-center" method="get">
    <h5 class="border-bottom border-2 border-success pb-3 mb-0 fw-bold fs-5 col-3 col-lg-auto">مرتب سازی:</h5>
    <div class="d-flex gap-3 pb-2 align-items-center text-dark overflow-x-scroll  orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
        <?php $i = 1; ?>
        <?php foreach ($catalog_orderby_options as $id => $name) : ?>
            <div class="orderby-item col-auto">
                <input class="d-none" name="orderby" id="order-<?= $i; ?>" type="radio" value="<?php echo esc_attr($id); ?>" <?php checked($orderby, $id); ?> />
                <label class="w-100" for="order-<?= $i; ?>"><?php echo esc_html($name); ?></label>
            </div>
            <?php
            $i++;
        endforeach;
        ?>
    </div>
    <input type="hidden" name="paged" value="1"/>
    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
</form>
<script>
    // Add JavaScript to submit the form when a radio button is clicked and check on page load
    jQuery(document).ready(function ($) {
        // Check the radio buttons' states on page load
        $('.orderby-item input[type="radio"]').each(function () {
            if ($(this).is(':checked')) {
                $(this).closest('.orderby-item').addClass('active');
            }
        });

        // Listen for changes in radio buttons within .orderby-item divs
        $('.orderby-item input[type="radio"]').change(function () {
            // Remove 'active' class from all .orderby-item divs
            $('.orderby-item').removeClass('active');

            // Add the 'active' class to the parent .orderby-item of the checked radio button
            if ($(this).is(':checked')) {
                $(this).closest('.orderby-item').addClass('active');
            }
        });

        $('.orderby input[type="radio"]').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>


