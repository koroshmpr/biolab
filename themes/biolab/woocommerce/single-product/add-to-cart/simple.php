<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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

global $product;

if (!$product->is_purchasable()) {
    return;
}

echo wc_get_stock_html($product); // WPCS: XSS ok.

if ($product->is_in_stock()) : ?>

    <?php do_action('woocommerce_before_add_to_cart_form'); ?>

    <form class="cart"
          action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
          method="post" enctype='multipart/form-data'>
        <div class="d-flex gap-3 align-items-center">
            <div class="col">
                <div id="quantity-input-box" data-min="<?= $product->get_min_purchase_quantity() ?>"
                     data-max="<?= $product->get_max_purchase_quantity() ?>">
                    <div class="hstack gap-4 justify-content-center justify-content-lg-start">
                        <div class="gap-2 d-flex justify-content-evenly align-items-center">
                            <button type="button"
                                    class="btn p-0 text-dark fw-bold fs-3"
                                    id="decrease-product-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                    <rect y="0.5" width="32" height="32" rx="10" fill="white"/>
                                    <path d="M22 17.25H10C9.59 17.25 9.25 16.91 9.25 16.5C9.25 16.09 9.59 15.75 10 15.75H22C22.41 15.75 22.75 16.09 22.75 16.5C22.75 16.91 22.41 17.25 22 17.25Z" fill="#212529"/>
                                </svg>
                            </button>
                            <span id="product-count" class="fs-5 text-center ps-2">
                                     <?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>
                            </span>
                            <button type="button"
                                    class="btn p-0 text-dark fw-bold fs-3"
                                    id="increase-product-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                    <rect y="0.5" width="32" height="32" rx="10" fill="white"/>
                                    <path d="M22 17.25H10C9.59 17.25 9.25 16.91 9.25 16.5C9.25 16.09 9.59 15.75 10 15.75H22C22.41 15.75 22.75 16.09 22.75 16.5C22.75 16.91 22.41 17.25 22 17.25Z" fill="#212529"/>
                                    <path d="M16 23.25C15.59 23.25 15.25 22.91 15.25 22.5V10.5C15.25 10.09 15.59 9.75 16 9.75C16.41 9.75 16.75 10.09 16.75 10.5V22.5C16.75 22.91 16.41 23.25 16 23.25Z" fill="#212529"/>
                                </svg>
                            </button>
                        </div>
                        <input id="product-quantity" type="hidden" name="quantity"
                               value="<?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>">
                    </div>
                </div>
            </div>
            <div class="col">
                <?php do_action('woocommerce_before_add_to_cart_button'); ?>

                <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
                        class="btn btn-success rounded-3 single_add_to_cart_button">
                    <?php echo esc_html($product->single_add_to_cart_text()); ?>
                </button>

                <?php do_action('woocommerce_after_add_to_cart_button'); ?>
            </div>
        </div>
    </form>

    <?php do_action('woocommerce_after_add_to_cart_form'); ?>
    <!--        <div class="hstack gap-4 mt-4 flex-wrap">-->
    <!--            --><?php //echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
    <!--             <a href="#">-->
    <!--                 <i class="bi bi-arrow-down-up fw-bold me-1"></i>-->
    <!--                 افزودن به لیست مقایسه-->
    <!--                </a>-->
    <!---->
    <!--            <a href="#">-->
    <!--                <i class="bi bi-info-circle fw-bold me-1"></i>-->
    <!--                راهنمای اندازه-->
    <!--            </a>-->
    <!--        </div>-->
<?php endif; ?>
<script>
    jQuery(document).ready(function($) {
        $('#decrease-product-btn').click(function(e) {
            e.preventDefault();
            var $countElement = $('#product-count');
            var count = parseInt($countElement.text(), 10);
            var minQuantity = parseInt($('#quantity-input-box').data('min'), 10);

            if (count > minQuantity) {
                count = count - 1;
                $countElement.text(count);
                $('#product-quantity').val(count); // Update the hidden input field
            }
        });

        $('#increase-product-btn').click(function(e) {
            e.preventDefault();
            var $countElement = $('#product-count');
            var count = parseInt($countElement.text(), 10);
            var maxQuantity = parseInt($('#quantity-input-box').data('max'), 10);

            if (count < maxQuantity) {
                count = count + 1;
                $countElement.text(count);
                $('#product-quantity').val(count); // Update the hidden input field
            }
        });
    });
</script>
