<?php
global $product;

// Ensure $product is valid
if (!$product || !is_a($product, 'WC_Product')) {
    return;
}

?>
<div class="<?= $args['customeClass'] ?? ''; ?> card h-auto rounded-3 border-info border-opacity-50 overflow-hidden">

    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'single-post-thumbnail'); ?>
    <img src="<?php echo $image ? $image[0] : ''; ?>" alt="<?php echo $product->get_title(); ?>"
         class="mx-auto rounded object-fit w-100" width="200" height="200">
    <div class="p-2 pb-1 h-100 d-flex flex-column justify-content-between align-items-start">
        <?php
        if ($product->is_on_sale()) : ?>
            <span class="px-2 py-1 btn-success rounded-pill small">فروش ویژه</span>
        <?php endif; ?>
        <h6 class="card-title text-dark fs-5 mt-2 pt-1">
            <a href="<?php echo esc_url($product->get_permalink()); ?>"
               class="stretched-link text-dark fs-6 fw-bold"><?php echo esc_html($product->get_title()); ?></a>
        </h6>
        <p class="card-text mb-0">
            <?php
            if (is_numeric($product->get_price())) :
                if (!$product->is_type('variable')) :
                    if ($product->is_on_sale()) : ?>
                        <span class="text-secondary fs-6 fw-bold"><?php echo wc_price($product->get_sale_price()); ?></span>
                        <span class="text-primary small text-opacity-50 text-decoration-line-through ms-1">
                            <?php echo wc_price($product->get_regular_price()); ?>
                        </span>
                    <?php else : ?>
                        <span class="text-primary ms-1"><?php echo wc_price($product->get_regular_price()); ?></span>
                    <?php endif;
                else :
                    // Handle variable product pricing
                    $min_price = wc_price($product->get_variation_regular_price('min', false));
                    $max_price = wc_price($product->get_variation_regular_price('max', false));
                    echo $min_price . ' تا ' . $max_price;
                    ?><span class="text-primary ms-1">تومان</span>
                <?php endif;
            endif; ?>
        </p>
        <?php
        echo apply_filters('woocommerce_loop_add_to_cart_link',
            sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="btn btn-addToCard d-none">%s</a>',
                esc_url($product->add_to_cart_url()),
                esc_attr($product->get_id()),
                esc_attr($product->get_sku()),
                $product->is_purchasable() ? 'اضافه کردن به سبد خرید' : '',
                esc_attr($product->get_type()),
                esc_html($product->add_to_cart_text())
            ),
            $product);
        ?>
    </div>
</div>
