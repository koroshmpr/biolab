<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;
?>
<form class="px-0 cart pt-3 variation-cart-form"
      action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
      method="post" enctype='multipart/form-data'>
    <div class="d-flex gap-3 align-items-center flex-md-column flex-xxl-row">
        <div class="col">
            <?php do_action('woocommerce_before_add_to_cart_quantity'); ?>
            <div id="quantity-input-box" data-min="<?php echo $product->get_min_purchase_quantity(); ?>"
                 data-min="<?php echo $product->get_min_purchase_quantity(); ?>"
                 data-max="<?php echo $product->get_max_purchase_quantity(); ?>">
                <div class="hstack gap-4 justify-content-center justify-content-lg-start">
                    <div class="gap-2 d-flex justify-content-evenly align-items-center">
                        <button id="decrease-product-btn" type="button" class="btn p-0 text-dark fw-bold fs-4 decrease-product-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33"
                                 fill="none">
                                <rect y="0.5" width="32" height="32" rx="10" fill="white"/>
                                <path d="M22 17.25H10C9.59 17.25 9.25 16.91 9.25 16.5C9.25 16.09 9.59 15.75 10 15.75H22C22.41 15.75 22.75 16.09 22.75 16.5C22.75 16.91 22.41 17.25 22 17.25Z"
                                      fill="#212529"/>
                            </svg>
                        </button>
                        <span id="product-count" class="fs-5 text-center ps-2 product-count">
                            <?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>
                        </span>
                        <input type="hidden" name="quantity"
                               value="<?= isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity() ?>">
                        <button id="increase-product-btn" type="button" class="btn p-0 text-dark fw-bold fs-4 increase-product-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33"
                                 fill="none">
                                <rect y="0.5" width="32" height="32" rx="10" fill="white"/>
                                <path d="M22 17.25H10C9.59 17.25 9.25 16.91 9.25 16.5C9.25 16.09 9.59 15.75 10 15.75H22C22.41 15.75 22.75 16.09 22.75 16.5C22.75 16.91 22.41 17.25 22 17.25Z"
                                      fill="#212529"/>
                                <path
                                        d="M16 23.25C15.59 23.25 15.25 22.91 15.25 22.5V10.5C15.25 10.09 15.59 9.75 16 9.75C16.41 9.75 16.75 10.09 16.75 10.5V22.5C16.75 22.91 16.41 23.25 16 23.25Z"
                                        fill="#212529"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php do_action('woocommerce_after_add_to_cart_quantity'); ?>
        </div>
        <div class="col">
            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
            <button type="submit" class="btn btn-success p-2 rounded-3 single_add_to_cart_button">
                <?php echo esc_html($product->single_add_to_cart_text()); ?>
            </button>
            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
            <input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>"/>
            <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>"/>
            <input type="hidden" name="variation_id" class="variation_id" value="0"/>
        </div>
    </div>
</form>

<script>
    // Get the necessary elements
    const quantityInputBox = document.getElementById('quantity-input-box');
    let decreaseBtn = document.getElementById('decrease-product-btn');
    let increaseBtn = document.getElementById('increase-product-btn');
    let productCount = document.getElementById('product-count');
    const productPrice = <?= $product->get_price() ?>;

    // Set the initial product count and price display
    var count = productCount.textContent;
    var price = productPrice * count;


    // Decrease the product count and update the price when the decrease button is clicked
    decreaseBtn.addEventListener('click', function () {
        if (count > 1) {
            count -= 1;
            productCount.textContent = count;
            price = productPrice * count;
        }
    });

    // Increase the product count and update the price when the increase button is clicked
    increaseBtn.addEventListener('click', function () {
        count++;
        productCount.textContent = count;
        price = productPrice * count;
    });
</script>
